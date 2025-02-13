<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('frontend.contact');
    }

    public function submit(Request $request)
    {
        // Validation des champs
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|max:5000',
        ]);

        // Données du formulaire
        $data = $request->only('name', 'email', 'message');

        // Envoi de l'email
        Mail::send('emails.contact', $data, function ($message) {
            $message->to('angelhounga@gmail.com') // Remplacez par votre email
                ->subject('Nouveau message de contact');
        });

        // Redirection avec message de confirmation
        return redirect()->route('contact.show')->with('success', 'Votre message a été envoyé avec succès !');
    }
}
