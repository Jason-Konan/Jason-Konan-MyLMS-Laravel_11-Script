<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceMail;
use App\Models\Course;
use App\Models\Payment;
use App\Models\PaymentGateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Moneroo\Laravel\Payment as LaravelPayment;

class MonerooController extends Controller
{
    public function initiatePayment(Request $request, Course $course)
    {
        // Validation des données reçues
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'payment_method' => 'required|string|max:255',
        ]);

        // Récupérer le prix de base du cours
        $basePrice = $course->price;
        $taxValue = config('settings.tax_value', 0); // Par défaut 0 si non configuré
        $revenueShare = config('settings.system_revenue', 0); // Par défaut 0 si non configuré

        // Calculs initiaux pour la taxe et les revenus
        $taxAmount = $basePrice * ($taxValue / 100);
        $revenueAmount = $basePrice * ($revenueShare / 100);
        $finalPrice = $basePrice + $taxAmount + $revenueAmount;

        // Déterminer la méthode de paiement et ajuster le prix dynamiquement
        $paymentMethod = $validatedData['payment_method'];

        switch ($paymentMethod) {
            case 'mtn_ng':
                if ($finalPrice < 100) {
                    $finalPrice = 100; // Ajuster au minimum requis
                }
                break;
            case 'orange_ci':
                $finalPrice += 5; // Ajouter des frais fixes
                break;
            case 'card_usd':
                $finalPrice *= 1.05; // Appliquer des frais supplémentaires (5%)
                break;
                // Ajouter d'autres méthodes de paiement si nécessaire
        }

        // Récupération de la clé API Moneroo
        $monerooGateway = PaymentGateway::where('name', 'moneroo')->first();

        if (!$monerooGateway || !$monerooGateway->api_secret) {
            return redirect()->back()->with('failed', 'Clé API Moneroo non configurée.');
        }

        // Devise dynamique en fonction de la méthode de paiement
        $currency = $this->getCurrencyByPaymentMethod($paymentMethod);

        // Enregistrement local du paiement
        $payment = Payment::create([
            'course_id' => $course->id,
            'user_id' => Auth::id(),
            'amount' => $finalPrice,
            'tax_amount' => $taxAmount,
            'revenue_amount' => $revenueAmount,
            'status' => 'initiated',
        ]);

        // Préparation des données pour l'API Moneroo
        $paymentData = [
            'amount' => $finalPrice,
            'currency' => $currency,
            'customer' => [
                'email' => $validatedData['email'],
                'first_name' => explode(' ', trim($validatedData['name']))[0],
                'last_name' => explode(' ', trim($validatedData['name']))[1] ?? '',
            ],
            'description' => 'Paiement pour le cours : ' . $course->name,
            'return_url' => route('moneroo.thanks', ['payment_id' => $payment->id]),
            'metadata' => [
                'payment_id' => $payment->id,
            ],
            'methods' => [$paymentMethod],
        ];

        // Initialise le paiement avec Moneroo
        $monerooPayment = new LaravelPayment();
        try {
            $paiement = $monerooPayment->init($paymentData);

            // Redirigez l'utilisateur vers l'URL de paiement
            return redirect($paiement->checkout_url);
        } catch (\Exception $e) {
            return back()->with('error', 'Une erreur est survenue lors de l\'initialisation du paiement: ' . $e->getMessage());
        }
    }

    public function thanks(Request $request)
    {
        $paymentId = $request->query('payment_id');
        $payment = Payment::find($paymentId);

        if (!$payment) {
            return back()->with('failed', 'Paiement introuvable.');
        }

        $status = $request->query('paymentStatus');

        if ($status === 'success') {
            $payment->update(['status' => 'paid']);

            // Générer une facture et envoyer par email
            $this->sendInvoiceByEmail($payment);

            return redirect()->route('course.show', ['course' => $payment->course])
                ->with('ok', 'Paiement réussi. Une facture a été envoyée à votre email.');
        } else {
            $payment->update(['status' => 'failed']);
            return back()->with('failed', 'Le paiement a échoué. Veuillez réessayer.');
        }
    }

    private function sendInvoiceByEmail(Payment $payment)
    {
        $user = $payment->user;
        $course = $payment->course;

        $data = [
            'user' => $user,
            'course' => $course,
            'payment' => $payment,
        ];

        // Générer le PDF de la facture
        $pdf = Pdf::loadView('backend.invoices.invoice', $data);

        try {
            // Envoi de l'email avec la facture attachée
            Mail::send([], [], function ($message) use ($user, $pdf, $payment) {
                $message->to($user->email)
                    ->subject('Votre facture pour le paiement')
                    ->attachData($pdf->output(), "invoice_{$payment->id}.pdf");
            });
        } catch (\Exception $e) {
            Log::error("Erreur lors de l'envoi de la facture : " . $e->getMessage());
        }
    }

    private function getCurrencyByPaymentMethod($paymentMethod)
    {
        $xofMethods = [
            'orange_ci',
            'orange_sn',
            'mtn_ci',
            'wave_sn',
            'card_xof',
        ];

        $usdMethods = ['card_usd'];
        $ngnMethods = ['mtn_ng'];
        $xafMethods = ['orange_cm', 'mtn_cm'];

        if (in_array($paymentMethod, $xofMethods)) {
            return 'XOF';
        } elseif (in_array($paymentMethod, $usdMethods)) {
            return 'USD';
        } elseif (in_array($paymentMethod, $ngnMethods)) {
            return 'NGN';
        } elseif (in_array($paymentMethod, $xafMethods)) {
            return 'XAF';
        }

        return 'XOF'; // Devise par défaut
    }
}
