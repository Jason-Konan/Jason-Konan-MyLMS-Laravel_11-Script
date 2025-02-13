<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\Cart;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return ['auth'];
    }

    public function addToCart($course)
    {
        $user = Auth::user();

        // Vérifiez si le cours est déjà dans le panier
        $cartItem = Cart::where('user_id', $user->id)
            ->where('course_id', $course->id)
            ->first();

        if ($cartItem) {
            // Retournez un message d'erreur si le cours est déjà ajouté
            return redirect()->back()->with('failed', 'Ce cours est déjà dans votre panier.');
        } else {
            // Sinon, ajoutez le cours au panier
            Cart::create([
                'user_id' => $user->id,
                'course_id' => $course->id,
            ]);

            return redirect()->back()->with('ok', 'Course added to cart successfully!');
        }
    }
}
