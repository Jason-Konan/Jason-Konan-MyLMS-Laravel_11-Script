<?php

namespace App\Mail;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $course;
    public $payment;

    /**
     * Create a new message instance.
     */
    public function __construct($user, $course, $payment)
    {
        $this->user = $user;
        $this->course = $course;
        $this->payment = $payment;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        // Générer le PDF
        $pdf = Pdf::loadView('backend.invoices.invoice', [
            'user' => $this->user,
            'course' => $this->course,
            'payment' => $this->payment,
        ]);

        return $this->view('backend.emails.invoices')
            ->subject('Your Course Invoice')
            ->attachData($pdf->output(), "invoice_{$this->payment->id}.pdf", [
                'mime' => 'application/pdf',
            ]);
    }
}
