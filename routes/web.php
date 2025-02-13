<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\Blogs\BlogController;
use App\Http\Controllers\Backend\Blogs\CategoryForBlogController;
use App\Http\Controllers\Backend\Courses\CategoriesForCourseController;
use App\Http\Controllers\Backend\Courses\CourseController;
use App\Http\Controllers\Backend\Courses\LessonController;
use App\Http\Controllers\Backend\Courses\SectionController;
use App\Http\Controllers\Backend\Page\PageController;
use App\Http\Controllers\Backend\PaymentManagement\AllPaymentController;
use App\Http\Controllers\Backend\Settings\PaymentSettingController;
use App\Http\Controllers\Backend\Settings\SiteSettingsController;
use App\Http\Controllers\Backend\Settings\TemplateController;
use App\Http\Controllers\Backend\Settings\TranslationController;
use App\Http\Controllers\Backend\Users\AdminController;
use App\Http\Controllers\Backend\Users\PermissionController;
use App\Http\Controllers\Backend\Users\RoleController;
use App\Http\Controllers\Backend\Users\UserController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\LessonProgressController;
use App\Http\Controllers\Frontend\PayPalController;
use App\Http\Controllers\Frontend\StripeController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('lang', [LanguageController::class, 'change'])->name("change.lang");

require __DIR__ . '/auth.php';
require __DIR__ . '/backend.php';
require __DIR__ . '/frontend.php';
