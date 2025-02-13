<?php

namespace App\Http\Controllers\Backend\PaymentManagement;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class AllPaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('course', 'user')->latest()->paginate(3);

        return view('backend.payments.index', compact('payments'));
    }
}
