<?php

namespace App\Http\Middleware;

use App\Models\Course;
use App\Models\Payment;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckCoursePayment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Vérifier si l'utilisateur est authentifié
        if (!Auth::check()) {
            return redirect('login'); // Si l'utilisateur n'est pas connecté, rediriger vers la page de login
        }

        // 'course' is automatically injected from the route binding
        $course = $request->route('course');

        // Vérifier si l'utilisateur a payé pour ce cours
        $payment = Payment::where('course_id', $course->id)
            ->where('user_id', Auth::user()->id)
            ->where('status', 'paid')
            ->first();

        // Si l'utilisateur n'a pas payé pour le cours, rediriger ou afficher un message
        if (!$payment) {
            return redirect()->route('course.show', $course)->with('failed', 'Please complete the payment to access the course.');
        }

        return $next($request);
    }
}
