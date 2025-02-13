<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::query()->orderBy('created_at', 'desc')->paginate(4);
        return view('backend.reviews.index', compact('reviews'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'review' => 'required|string',
            'rating' => 'required|integer|between:1,5',
        ]);

        // Vérifie si l'utilisateur est connecté
        if (!Auth::check()) {
            return back()->with('failed', 'Please you need to login before sending a review');
        }

        // Ajoute l'ID de l'utilisateur connecté
        $validated['user_id'] = Auth::id();

        // Crée le review
        Review::create($validated);

        return redirect()->back()->with('ok', 'Merci pour votre avis !');
    }

    public function edit($id)
    {
        $review = Review::findOrFail($id);
        return view('admin.reviews.edit', compact('review'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'review' => 'required|string',
            'rating' => 'required|integer|between:1,5',
        ]);

        $review = Review::findOrFail($id);
        $review->update($request->all());

        return redirect()->route('reviews.index')->with('ok', 'Avis mis à jour avec succès.');
    }

    public function destroy($id)
    {
        Review::findOrFail($id)->delete();
        return redirect()->route('reviews.index')->with('ok', 'Avis supprimé avec succès.');
    }
}
