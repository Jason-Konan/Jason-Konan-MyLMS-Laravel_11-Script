<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceMail;
use App\Models\Course;
use App\Models\Payment;
use App\Models\PaymentGateway;
use App\Services\KkiapayService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class KkiapayController extends Controller
{
    protected $kkiapayService;

    public function __construct(KkiapayService $kkiapayService)
    {
        $this->kkiapayService = $kkiapayService;
    }

    /**
     * Initiate a payment using Kkiapay.
     */
    public function initiatePayment(Request $request, Course $course)
    {
        // Validate input data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        // Check Kkiapay API configuration
        $kkiapayGateway = PaymentGateway::where('name', 'kkiapay')->first();
        if (!$kkiapayGateway || !$kkiapayGateway->api_secret) {
            return redirect()->back()->with('failed', 'Kkiapay API keys are not configured.');
        }

        // Calculate final price
        $basePrice = $course->price; // Prix final déjà stocké dans la base de données
        $exchangeRate = config('settings.exchange_rate', 634); // Taux de change XOF/USD (par défaut : 634)
        $finalPriceInXOF = intval($basePrice * $exchangeRate); // Convertir en XOF

        // Metadata for Kkiapay
        $callbackUrl = route('kkiapay.callback');
        $metadata = [
            'course_id' => $course->id,
            'user_id' => Auth::id(),
            'email' => $validatedData['email'],
            'tax_amount' => 0, // Pas besoin de recalculer, car le prix final inclut déjà la taxe
            'revenue_amount' => 0, // Pas besoin de recalculer, car le prix final inclut déjà le revenu
        ];

        // Initiate payment
        $response = $this->kkiapayService->initiatePayment($finalPriceInXOF, $validatedData['phone'] ?? '', $callbackUrl, $metadata);

        if (isset($response['error']) && $response['error']) {
            Log::error('Payment initiation failed', ['error' => $response['message']]);
            return redirect()->back()->with('failed', 'Payment initiation failed: ' . $response['message']);
        }

        Log::info('Payment initiation successful', $response);

        return redirect()->away($response['payment_url']);
    }

    /**
     * Handle the payment callback.
     */
    public function handleCallback(Request $request)
    {
        $transactionId = $request->input('transaction_id');

        // Verify the transaction
        $response = $this->kkiapayService->verifyTransaction($transactionId);
        Log::info('Callback verification response', $response);

        if (isset($response['error']) && $response['error']) {
            Log::error('Payment verification failed', ['transaction_id' => $transactionId, 'error' => $response['message']]);
            return redirect()->back()->with('failed', 'Payment verification failed: ' . $response['message']);
        }

        if ($response['status'] === 'SUCCESS') {
            $metadata = $response['metadata'];

            // Create payment record
            $payment = Payment::create([
                'course_id' => $metadata['course_id'],
                'user_id' => $metadata['user_id'],
                'amount' => $response['amount'],
                'tax_amount' => $metadata['tax_amount'] ?? 0,
                'revenue_amount' => $metadata['revenue_amount'] ?? 0,
                'status' => 'paid',
                'payment_id' => $transactionId,
            ]);

            // Send invoice email
            Mail::to($metadata['email'])->send(new InvoiceMail(Auth::user(), Course::find($metadata['course_id']), $payment));

            return redirect()->route('course.show', ['course' => $metadata['course_id']])->with('success', 'Payment Successful!');
        }

        return redirect()->back()->with('failed', 'Payment failed: Transaction not successful.');
    }
}
