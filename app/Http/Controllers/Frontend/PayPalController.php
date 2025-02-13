<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Payment;
use App\Models\PaymentGateway; // Ajout du modèle PaymentGateway
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceMail;

class PayPalController extends Controller
{
    public function payment(Request $request, Course $course)
    {
        // Récupérer les clés API PayPal depuis la base de données
        $paypalGateway = PaymentGateway::where('name', 'paypal')->first();

        if (!$paypalGateway || !$paypalGateway->api_key || !$paypalGateway->api_secret) {
            return redirect()->back()->with('failed', 'PayPal API keys are not configured.');
        }

        // Configurer PayPal avec les clés dynamiques
        $provider = new PayPalClient;
        $provider->setApiCredentials([
            'mode' => 'sandbox', // ou 'live' pour la production
            'sandbox' => [
                'client_id' => $paypalGateway->api_key, // client_id
                'client_secret' => $paypalGateway->api_secret, // client_secret
            ],
            'live' => [
                'client_id' => $paypalGateway->api_key, // client_id
                'client_secret' => $paypalGateway->api_secret, // client_secret
            ],
        ]);
        $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('paypal.payment.success', $course),
                "cancel_url" => route('paypal.payment.cancel', $course),
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $course->price
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    session()->put('name', $course->name);
                    session()->put('price', $course->price);
                    return redirect()->away($links['href']);
                }
            }
            return redirect()->back()->with('failed', 'Something went wrong.');
        } else {
            return redirect()->back()->with('failed', $response['message'] ?? 'Something went wrong.');
        }
    }

    // public function paymentSuccess(Request $request, Course $course)
    // {
    //     // Récupérer les clés API PayPal depuis la base de données
    //     $paypalGateway = PaymentGateway::where('name', 'paypal')->first();

    //     if (!$paypalGateway || !$paypalGateway->api_key || !$paypalGateway->api_secret) {
    //         return redirect()->back()->with('failed', 'PayPal API keys are not configured.');
    //     }

    //     // Configurer PayPal avec les clés dynamiques
    //     $provider = new PayPalClient;
    //     $provider->setApiCredentials([
    //         'mode' => 'sandbox', // ou 'live' pour la production
    //         'sandbox' => [
    //             'client_id' => $paypalGateway->api_key, // client_id
    //             'client_secret' => $paypalGateway->api_secret, // client_secret
    //         ],
    //         'live' => [
    //             'client_id' => $paypalGateway->api_key, // client_id
    //             'client_secret' => $paypalGateway->api_secret, // client_secret
    //         ],
    //     ]);
    //     $provider->getAccessToken();

    //     $response = $provider->capturePaymentOrder($request->token);

    //     if (isset($response['status']) && $response['status'] == 'COMPLETED') {
    //         $taxValue = config('settings.tax_value');
    //         $revenueShare = config('settings.system_revenue');
    //         $taxAmount = $course->price * ($taxValue / 100);
    //         $revenueAmount = $course->price * ($revenueShare / 100);

    //         $payment = new Payment();
    //         $payment->course_id = $course->id;
    //         $payment->user_id = Auth::user()->id;
    //         $payment->amount = $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'];
    //         $payment->tax_amount = $taxAmount;
    //         $payment->revenue_amount = $revenueAmount;
    //         $payment->status = 'paid';
    //         $payment->payment_id = $response['id'];
    //         $payment->save();

    //         try {
    //             // Envoyer l'email en arrière-plan
    //             Mail::to(Auth::user()->email)->send(new InvoiceMail(Auth::user(), $course, $payment));
    //         } catch (\Exception $e) {
    //             Log::error('Erreur lors de l\'envoi de l\'email : ' . $e->getMessage());
    //         }

    //         return redirect()->route('course.show', $course)->with('ok', 'Payment Successful! Your invoice has been sent to your email.');
    //     } else {
    //         return view('frontend.paypal-payment-cancel', compact('course'))->with('failed', 'Payment Canceled.');
    //     }
    // }
    public function paymentSuccess(Request $request, Course $course)
    {
        // Récupérer les clés API PayPal depuis la base de données
        $paypalGateway = PaymentGateway::where('name', 'paypal')->first();

        if (!$paypalGateway || !$paypalGateway->api_key || !$paypalGateway->api_secret) {
            return redirect()->back()->with('failed', 'PayPal API keys are not configured.');
        }

        // Configurer PayPal avec les clés dynamiques
        $provider = new PayPalClient;
        $provider->setApiCredentials([
            'mode' => 'sandbox', // ou 'live' pour la production
            'sandbox' => [
                'client_id' => $paypalGateway->api_key, // client_id
                'client_secret' => $paypalGateway->api_secret, // client_secret
            ],
            'live' => [
                'client_id' => $paypalGateway->api_key, // client_id
                'client_secret' => $paypalGateway->api_secret, // client_secret
            ],
        ]);
        $provider->getAccessToken();

        // Capturer le paiement PayPal
        $response = $provider->capturePaymentOrder($request->token);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            // Récupérer le montant payé depuis la réponse PayPal
            $amountPaid = $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'];

            // Enregistrer le paiement dans la base de données
            $payment = new Payment();
            $payment->course_id = $course->id;
            $payment->user_id = Auth::user()->id;
            $payment->amount = $amountPaid; // Montant payé (prix final)
            $payment->tax_amount = 0; // Pas besoin de recalculer, car le prix final inclut déjà la taxe
            $payment->revenue_amount = 0; // Pas besoin de recalculer, car le prix final inclut déjà le revenu
            $payment->status = 'paid';
            $payment->payment_id = $response['id'];
            $payment->save();

            try {
                // Envoyer l'email en arrière-plan
                Mail::to(Auth::user()->email)->send(new InvoiceMail(Auth::user(), $course, $payment));
            } catch (\Exception $e) {
                Log::error('Erreur lors de l\'envoi de l\'email : ' . $e->getMessage());
            }

            return redirect()->route('course.show', $course)->with('ok', 'Payment Successful! Your invoice has been sent to your email.');
        } else {
            return view('frontend.paypal-payment-cancel', compact('course'))->with('failed', 'Payment Canceled.');
        }
    }
    public function paymentCancel(Request $request, Course $course)
    {
        return view('frontend.paypal-payment-cancel', compact('course'))->with('failed', 'Transaction not complete.');
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
