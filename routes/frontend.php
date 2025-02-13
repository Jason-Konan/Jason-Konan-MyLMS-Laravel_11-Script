<?php

use App\Http\Controllers\Backend\Blogs\BlogController;
use App\Http\Controllers\Backend\Courses\CourseController;
use App\Http\Controllers\Backend\Courses\LessonController;
use App\Http\Controllers\Backend\Page\PageController;
use App\Http\Controllers\Backend\Quizzes\AnswerController;
use App\Http\Controllers\Backend\Quizzes\QuizController;
use App\Http\Controllers\Frontend\AudioCommentController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\KkiapayController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\LessonProgressController;
use App\Http\Controllers\Frontend\MonerooController;
use App\Http\Controllers\Frontend\NewsletterController;
use App\Http\Controllers\Frontend\PayPalController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\SquareController;
use App\Http\Controllers\Frontend\StripeController;
use App\Http\Controllers\Frontend\Students\ProfileController;
use Illuminate\Support\Facades\Route;

// Routes Frontend - Pages publiques
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/courses', 'courses')->name('courses');
    Route::get('/blogs/categories/{category}', 'postsByCategory')->name('blog.byCategory');
    Route::get('/courses/categories/{category}', 'coursesByCategory')->name('course.byCategory');
    Route::get('/all-news', 'allBlogs')->name('blogs');
    Route::get('/profile', 'profile')->name('profile.infos');
});
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/{page}', [PageController::class, 'show'])->name('page.detail');

// Newsletter
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

// Courses
Route::controller(CourseController::class)->group(function () {
    Route::get('courses/{course}', 'courseShow')->name('course.show');
    Route::get('courses/{course}/payment', 'showPaymentForm')->name('courses.payment')->middleware('auth');
    Route::get('/courses/paid-courses', 'myCourses')->name('courses.paidCourses');
});

// Blogs
Route::controller(BlogController::class)->group(function () {
    Route::get('blogs/{blog}', 'blogShow')->name('blog.show');
});

// Audio Comments
Route::post('/courses/{course}/audio', [AudioCommentController::class, 'store'])->name('audio.store');

// Payment Integration
Route::prefix('payment')->group(function () {
    Route::get('/square', [SquareController::class, 'showSquarePaymentForm'])->name('payment.form');
    Route::post('/square/process', [SquareController::class, 'createPayment']);

    Route::post('/{course}/stripe', [StripeController::class, 'createCharge'])->name('stripe.create-charge');
    Route::get('/invoice/{id}', [StripeController::class, 'createInvoice'])->name('invoice.download');

    Route::post('/{course}/paypal', [PayPalController::class, 'payment'])->name('paypal');
    Route::get('/paypal/payment/{course}/success', [PayPalController::class, 'paymentSuccess'])->name('paypal.payment.success');
    Route::get('/paypal/payment/{course}/cancel', [PayPalController::class, 'paymentCancel'])->name('paypal.payment.cancel');

    Route::post('/{course}/kkiapay/initiate', [KkiapayController::class, 'initiatePayment'])->name('kkiapay.initiatePayment');
    Route::get('/kkiapay/callback', [KkiapayController::class, 'handleCallback'])->name('kkiapay.callback');
    Route::post('/kkiapay/webhook', [KkiapayController::class, 'webhook'])->name('kkiapay.webhook');

    Route::post('/{course}/moneroo/initiate', [MonerooController::class, 'initiatePayment'])->middleware('auth')->name('moneroo.initiate');
    Route::get('/moneroo/thanks', [MonerooController::class, 'thanks'])->middleware('auth')->name('moneroo.thanks');
});

// Authenticated User Routes
Route::middleware(['auth'])->group(function () {

    // Comments
    Route::post('/blogs/{blog}/comment', [BlogController::class, 'comment'])->name('blog.comment');
    Route::post('/courses/{course}/comment', [CourseController::class, 'comment'])->name('course.comment');

    // Lessons
    Route::prefix('/courses/{course}/sections/{section}/lessons')->group(function () {
        Route::get('/{lesson}', [LessonController::class, 'show'])->name('lessons.show');
        Route::post('/{lesson}/finish', [LessonController::class, 'markAsFinished'])->name('lessons.markAsFinished');
    });
    Route::post('/lessons/{lesson}/complete', [LessonProgressController::class, 'markLessonAsCompleted']);

    // Progress
    Route::get('/courses/{course}/progress', [LessonProgressController::class, 'getCourseProgress']);

    // Quizzes
    Route::middleware(['check.course.payment'])->group(function () {
        Route::prefix('/courses/{course}/sections/{section}/{quiz}')->group(function () {
            Route::get('/', [QuizController::class, 'show'])->name('quiz.show');
            Route::post('/answer', [AnswerController::class, 'store'])->name('quiz.answer');
            Route::get('/results', [AnswerController::class, 'showResults'])->name('quiz.result');
        });
    });

    // Cart
    Route::controller(CartController::class)->group(function () {
        Route::post('/{course}/add-to-cart', 'addToCart')->name('cart.add');
        Route::delete('/student/profile/remove-course/{id}', 'removeFromCart')->name('cart.remove');
    });

    // Reviews
    Route::post('/', [ReviewController::class, 'store'])->name('reviews.store');

    // Student Profile
    Route::middleware(['role:Student'])->group(function () {
        Route::controller(ProfileController::class)->group(function () {
            Route::get('/student/profile', 'edit')->name('profile.edit');
            Route::patch('/student/profile', 'update')->name('profile.update');
            Route::delete('/student/profile', 'destroy')->name('profile.destroy');
        });
    });
});
