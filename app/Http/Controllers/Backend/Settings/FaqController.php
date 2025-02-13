<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    // public function index()
    // {
    //     $faqs = Faq::all();
    //     return view('backend.faqs.index', compact('faqs'));
    // }

    // public function create()
    // {
    //     return view('backend.faqs.create');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        Faq::create($request->all());

        return redirect()->back()->with('ok', 'Question ajoutée !');
    }

    public function edit(Faq $faq)
    {
        return view('backend.faqs.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faq->update($request->all());

        return redirect()->back()->with('ok', 'Mise à jour réussie !');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->back()->with('ok', 'Supprimé avec succès.');
    }
}
