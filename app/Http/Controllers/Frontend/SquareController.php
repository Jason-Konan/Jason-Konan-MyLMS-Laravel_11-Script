<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\SquareService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Square\Exceptions\ApiException;
use Square\Models\CreatePaymentRequest;
use Square\Models\Money;
use Square\SquareClient;

class SquareController extends Controller
{

    public function showSquarePaymentForm()
    {
        return view('frontend.courses.course-payment.square');
    }
    public function createPayment(Request $request)
    {
        $squareClient = SquareService::makeClient();
        $paymentsApi = $squareClient->getPaymentsApi();

        try {
            // Créez une instance de Money
            $amountMoney = new Money();
            $amountMoney->setAmount((int)$request->input('amount')); // Assurez-vous que le montant est un entier
            $amountMoney->setCurrency('USD'); // Remplacez par votre devise si nécessaire

            // Créez une instance de CreatePaymentRequest
            $createPaymentRequest = new CreatePaymentRequest(
                $request->input('nonce'), // source_id
                uniqid(), // idempotency_key
                $amountMoney // montant
            );

            // Appelez l'API avec l'objet CreatePaymentRequest
            $response = $paymentsApi->createPayment($createPaymentRequest);

            return response()->json($response->getResult());
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
