<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureCoursePurchased
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $course = $request->route('course'); // Récupère le cours depuis la route
        $user = Auth::user();

        // Vérifie si l'utilisateur a acheté le cours
        if (!$user || !$user->hasPurchased($course)) {
            return redirect()->route('course.show', $course->id)
                ->with('error', 'Vous devez acheter ce cours pour accéder au quiz.');
        }

        return $next($request);
    }
}
