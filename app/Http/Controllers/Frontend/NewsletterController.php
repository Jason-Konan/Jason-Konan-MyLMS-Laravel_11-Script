<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\NewsletterMessage;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    public function index()
    {
        $subscribers = Newsletter::all();
        return view('backend.newsletters.index', compact('subscribers'));
    }


    public function subscribe(Request $request)
    {
        // Validation des données
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:newsletters,email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Enregistrement de l'e-mail
        Newsletter::create($request->only('email'));

        return redirect()->back()->with('ok', 'Merci pour votre inscription à la newsletter !');
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        $email = $request->input('email');
        $messageContent = $request->input('message');

        // Envoyer l'e-mail
        Mail::to($email)->send(new NewsletterMessage($messageContent));

        return redirect()->route('admin.newsletters.index')->with('ok', 'Message envoyé avec succès !');
    }
}
