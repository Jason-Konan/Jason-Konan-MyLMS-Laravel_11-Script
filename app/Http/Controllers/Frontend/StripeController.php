<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceMail;
use App\Models\Course;
use App\Models\Payment;
use App\Models\PaymentGateway; // Ajout du modèle PaymentGateway
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use Stripe;
use Stripe\Stripe as StripeStripe;

class StripeController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return ['auth'];
    }

    // public function createCharge(Request $request, Course $course)
    // {
    //     // Validate the request
    //     $validatedData = $request->validate([
    //         'name' => 'required|string',
    //         'email' => 'required|email',
    //         'stripeToken' => 'required|string',
    //     ]);

    //     // Utiliser les mêmes calculs .00pour la taxe et le revenu
    //     $basePrice = $course->price;
    //     $taxValue = config('settings.tax_value'); // % de taxes
    //     $revenueShare = config('settings.system_revenue'); // % pour le système

    //     // Calcul des montants de taxe et de revenu
    //     $taxAmount = $basePrice * ($taxValue / 100);
    //     $revenueAmount = $basePrice * ($revenueShare / 100);

    //     // Calcul du prix final
    //     $finalPrice = $basePrice + $taxAmount + $revenueAmount;

    //     // Convertir en cents pour Stripe
    //     $amountInCents = intval($finalPrice * 100);

    //     // Récupérer la clé API Stripe depuis la base de données
    //     $stripeGateway = PaymentGateway::where('name', 'stripe')->first();

    //     if (!$stripeGateway || !$stripeGateway->api_secret) {
    //         return redirect()->back()->with('failed', 'Stripe API key is not configured.');
    //     }

    //     // Set the API key dynamiquement
    //     StripeStripe::setApiKey($stripeGateway->api_secret);

    //     try {
    //         $charge = Stripe\Charge::create([
    //             'amount' => $amountInCents,
    //             'currency' => $stripeGateway->currency,
    //             'source' => $request->stripeToken,
    //             'description' => 'Payment for ' . $course->name,
    //             'metadata' => [
    //                 'email' => $validatedData['email'],
    //             ],
    //         ]);

    //         // Enregistrer le paiement dans la base de données
    //         $payment = Payment::create([
    //             'course_id' => $course->id,
    //             'user_id' => Auth::user()->id,
    //             'amount' => $amountInCents,
    //             'tax_amount' => $taxAmount,
    //             'revenue_amount' => $revenueAmount,
    //             'status' => 'paid',
    //             'payment_id' => $charge->id,
    //         ]);

    //         // Envoyer la facture par email
    //         Mail::to(Auth::user()->email)->send(new InvoiceMail(Auth::user(), $course, $payment));

    //         // Rediriger avec un message de succès
    //         return redirect()->route('course.show', compact('course'))->with('ok', 'Payment Successful!');
    //     } catch (\Exception $e) {
    //         return redirect()->back()->with('failed', 'Payment failed: ' . $e->getMessage());
    //     }
    // }
    public function createCharge(Request $request, Course $course)
    {
        // Valider la requête
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'stripeToken' => 'required|string',
        ]);

        // Récupérer le prix final directement depuis la base de données
        $finalPrice = $course->price; // Le prix final est déjà stocké dans la base de données

        // Convertir le prix final en cents pour Stripe
        $amountInCents = intval($finalPrice * 100);

        // Récupérer la clé API Stripe depuis la base de données
        $stripeGateway = PaymentGateway::where('name', 'stripe')->first();

        if (!$stripeGateway || !$stripeGateway->api_secret) {
            return redirect()->back()->with('failed', 'Stripe API key is not configured.');
        }

        // Définir la clé API Stripe dynamiquement
        \Stripe\Stripe::setApiKey($stripeGateway->api_secret);

        try {
            // Créer la charge Stripe
            $charge = \Stripe\Charge::create([
                'amount' => $amountInCents,
                'currency' => $stripeGateway->currency,
                'source' => $request->stripeToken,
                'description' => 'Payment for ' . $course->name,
                'metadata' => [
                    'email' => $validatedData['email'],
                ],
            ]);

            // Enregistrer le paiement dans la base de données
            $payment = Payment::create([
                'course_id' => $course->id,
                'user_id' => Auth::user()->id,
                'amount' => $amountInCents,
                'tax_amount' => 0, // Pas besoin de recalculer, car le prix final inclut déjà la taxe
                'revenue_amount' => 0, // Pas besoin de recalculer, car le prix final inclut déjà le revenu
                'status' => 'paid',
                'payment_id' => $charge->id,
            ]);

            // Envoyer la facture par email
            Mail::to(Auth::user()->email)->send(new InvoiceMail(Auth::user(), $course, $payment));

            // Rediriger avec un message de succès
            return redirect()->route('course.show', compact('course'))->with('ok', 'Payment Successful!');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'Payment failed: ' . $e->getMessage());
        }
    }
    public function createInvoice(Payment $payment)
    {
        $data = [
            'user' => Auth::user(),
            'course' => $payment->course,
            'payment' => $payment,
        ];

        $pdf = Pdf::loadView('backend.invoices.invoice', $data);

        // Envoie par email
        Mail::send([], [], function ($message) use ($data, $pdf) {
            $message->to($data['user']->email)
                ->subject('Your Invoice')
                ->attachData($pdf->output(), "invoice_{$data['payment']->id}.pdf");
        });

        return $pdf->stream();
    }
}
