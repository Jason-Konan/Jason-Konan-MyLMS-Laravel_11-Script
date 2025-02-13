<?php

use App\Http\Controllers\Backend\Blogs\BlogController;
use App\Http\Controllers\Backend\Blogs\CategoryForBlogController;
use App\Http\Controllers\Backend\Courses\CategoriesForCourseController;
use App\Http\Controllers\Backend\Courses\CourseController;
use App\Http\Controllers\Backend\Courses\LessonController;
use App\Http\Controllers\Backend\Courses\SectionController;
use App\Http\Controllers\Backend\Page\PageController;
use App\Http\Controllers\Backend\PaymentManagement\AllPaymentController;
use App\Http\Controllers\Backend\Quizzes\QuestionController;
use App\Http\Controllers\Backend\Quizzes\QuizController;
use App\Http\Controllers\Backend\Settings\FaqController;
use App\Http\Controllers\Backend\Settings\PaymentGatewayController;
use App\Http\Controllers\Backend\Settings\PaymentSettingController;
use App\Http\Controllers\Backend\Settings\SiteSettingsController;
use App\Http\Controllers\Backend\Settings\TemplateController;
use App\Http\Controllers\Backend\Settings\TranslationController;
use App\Http\Controllers\Backend\Users\AdminController;
use App\Http\Controllers\Backend\Users\AdminProfileController;
use App\Http\Controllers\Backend\Users\PermissionController;

use App\Http\Controllers\Backend\Users\RoleController;
use App\Http\Controllers\Backend\Users\StudentController;
use App\Http\Controllers\Backend\Users\UserController;
use App\Http\Controllers\Frontend\NewsletterController;
use App\Http\Controllers\Frontend\ReviewController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['auth', 'verified', 'role:Admin']], function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        // Gestion frontend (sections et carousel)
        Route::get('/frontend', [AdminController::class, 'frontend'])->name('frontend');
        Route::get('/newsletters', [NewsletterController::class, 'index'])->name('newsletters.index');
        Route::post('/newsletters/send-message', [NewsletterController::class, 'sendMessage'])->name('newsletters.send-message');
        // Activer/désactiver une section
        Route::put('/sections/toggle/{id}', [AdminController::class, 'toggle'])->name('sections.toggle');

        Route::get('/settings/language', [AdminController::class, 'editLanguage'])->name('language.edit');
        Route::post('/settings/language', [AdminController::class, 'updateLanguage'])->name('language.update');

        Route::post('/carousel/store', [AdminController::class, 'store'])->name('carousel.store');
        Route::delete('/carousel/destroy/{id}', [AdminController::class, 'destroy'])->name('carousel.destroy');
        Route::put('/carousel/update/{id}', [AdminController::class, 'update'])->name('carousel.update');
    });
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/dashboard', 'index')->name('dashboard');
    });
    Route::get('/admin/payments', [AllPaymentController::class, 'index'])->name('admin.payments.index');
    Route::controller(TemplateController::class)->group(function () {
        Route::get('/admin/settings/templates', 'index')->name('admin.templates.index');
        Route::get('/admin/settings/template/select/{id}', 'select')->name('admin.template.select');
    });

    Route::resource('/admin/roles', RoleController::class)->names([
        'index'   => 'roles.index',
        'create'  => 'roles.create',
        'store'   => 'roles.store',
        'show'    => 'roles.show',
        'edit'    => 'roles.edit',
        'update'  => 'roles.update',
        'destroy' => 'roles.destroy',
    ]);

    Route::resource('/admin/permissions', PermissionController::class)->names([
        'index'   => 'permissions.index',
        'create'  => 'permissions.create',
        'store'   => 'permissions.store',
        'show'    => 'permissions.show',
        'edit'    => 'permissions.edit',
        'update'  => 'permissions.update',
        'destroy' => 'permissions.destroy',
    ]);

    Route::resource('/admin/teachers', UserController::class)->names([
        'index'   => 'users.index',
        'create'  => 'users.create',
        'store'   => 'users.store',
        'show'    => 'users.show',
        'edit'    => 'users.edit',
        'update'  => 'users.update',
        'destroy' => 'users.destroy',
    ]);

    Route::resource('/admin/students', StudentController::class)->names([
        'index'   => 'students.index',
        'create'  => 'students.create',
        'store'   => 'students.store',
        'show'    => 'students.show',
        'edit'    => 'students.edit',
        'update'  => 'students.update',
        'destroy' => 'students.destroy',
    ]);
    Route::controller(TranslationController::class)->group(function () {
        Route::get('admin/settings/translations', 'index')->name('translations.index');
        Route::post('admin/settings/translations', 'update')->name('translations.update');
        Route::post('/translations/settings/create', 'create')->name('translations.create');
    });

    // PageController routes
    Route::controller(PageController::class)->group(function () {
        Route::get('/admin/pages', 'index')->name('admin.pages.index');
        Route::get('/admin/pages/create', 'create')->name('admin.pages.create');
        Route::post('/admin/pages/store', 'store')->name('admin.pages.store');

        Route::post('/admin/pages/{page}/toggle', 'togglePublication')->name('admin.pages.toggle');
        Route::patch('/admin/pages/{page}/position', 'updatePosition')->name('admin.pages.position');
        Route::get('/admin/pages/{page}/edit', 'edit')->name('admin.pages.edit');
        Route::put('/admin/pages/{page}/edit', 'update')->name('admin.pages.update');
        Route::delete('/admin/pages/{page}/delete', 'destroy')->name('admin.pages.delete');
    });
    Route::controller(CategoriesForCourseController::class)->group(function () {
        Route::get('/admin/courses/categories/create',  'create')->name('create.category');
        Route::post('/admin/courses/categories/create',  'store')->name('store.category');
        Route::get('/admin/courses/categories/{category}/edit',  'edit')->name('category.edit');
        Route::put('/admin/courses/categories/{category}/edit',  'update')->name('update.category');
        Route::delete('/admin/courses/categories/{category}/delete',  'destroy')->name('destroy.category');
    });
    Route::controller(CategoryForBlogController::class)->group(function () {
        Route::get('/admin/posts/categories/create',  'create')->name('create.blogCategory');
        Route::post('/admin/posts/categories/create',  'store')->name('store.blogCategory');
        Route::get('/admin/posts/{category}/edit',  'edit')->name('blogCategory.edit');
        Route::put('/admin/posts/{category}/edit',  'update')->name('update.blogCategory');
        Route::delete('/admin/posts/{category}/delete',  'destroy')->name('destroy.blogCategory');
    });
    Route::controller(BlogController::class)->group(function () {
        Route::get('/admin/posts', 'index')->name('admin.blogs.index');
        Route::get('/admin/posts/create', 'create')->name('blogs.create');
        Route::post('/admin/posts/create', 'store');
        Route::get('/admin/posts/{blog}/edit', 'edit')->name('admin.blog.edit');
        Route::put('/admin/posts/{blog}/edit', 'update')->name('admin.blog.update');
        Route::delete('/admin/posts/{blog}/delete', 'destroy')->name('admin.blog.destroy');
    })->middleware(['admin']);


    Route::controller(CourseController::class)->group(
        function () {
            Route::get('/admin/courses',  'index')->name('admin.courses');
            Route::get('/admin/courses/create',  'create')->name('admin.courses.create');
            Route::post('/admin/courses/create',  'store')->name('admin.courses.store');
            Route::patch('/admin/courses/{course}/toggle-status', 'toggleStatus')->name('courses.toggle-status');
            Route::patch('/admin/courses/{course}/enable-audio', 'enableAudio')->name('course.enable-audio');
            Route::get('admin/courses/{course}/edit', 'edit')->name('admin.course.edit');
            Route::put('admin/courses/{course}/edit', 'update')->name('admin.course.update');
            Route::delete('admin/courses/{course}/delete', 'destroy')->name('admin.course.destroy');
        }
    );

    Route::prefix('admin')->group(function () {
        Route::resource('faqs', FaqController::class)->names('admin.faqs');
    });
    Route::controller(SectionController::class)->group(function () {
        Route::get('/admin/courses/{course}/sections', 'index')->name('admin.section.index');
        Route::post('/admin/courses/{course}/sections', 'store')->name('admin.sections.store');
        Route::delete('/admin/courses/{course}/sections/{section}', 'destroy')->name('admin.delete.section');
        Route::get('/admin/courses/{course}/sections/{section}/edit', 'edit')->name('admin.sections.edit');
        Route::put('/admin/courses/{course}/sections/{section}', 'update')->name('admin.sections.update');
    });
    Route::controller(QuizController::class)->group(function () {
        Route::get('/admin/courses/{course}/sections/{section}/quizzes', 'index')->name('section.quizzes.index');
        Route::post('/admin/courses/{course}/sections/{section}/quizzes', 'store')->name('section.quizzes.store');
        Route::get('/admin/courses/{course}/sections/{section}/quizzes/{quiz}/edit', 'edit')->name('section.quiz.edit');
        Route::put('/admin/courses/{course}/sections/{section}/quizzes/{quiz}/update', 'update')->name('section.quiz.update');
        Route::delete('/admin/courses/{course}/sections/{section}/quizzes/{quiz}', 'destroy')->name('section.quiz.delete');
    });
    Route::controller(QuestionController::class)->group(function () {
        Route::get('/admin/{course}/{section}/{quiz}/questions', 'index')->name('questions.index');
        Route::get('/admin/{course}/{section}/{quiz}/questions/create', 'create')->name('question.create');
        Route::post('/admin/{course}/{section}/{quiz}/questions/store', 'store')->name('question.store');
        Route::delete('/admin/{course}/{section}/{quiz}/{question}/delete', 'destroy')->name('question.delete');
    });
    Route::controller(LessonController::class)->group(function () {
        Route::get('/admin/lessons', 'index')->name('admin.lessons');
        Route::get('/admin/{course}/{section}/lessons', 'create')->name('admin.lessons.create');
        Route::post('/admin/{course}/{section}/lessons', 'store')->name('admin.lessons.store');

        Route::get('/admin/{course}/{section}/{lesson}/edit', 'edit')->name('admin.lesson.edit');
        Route::put('/admin/{course}/{section}/{lesson}/edit', 'update')->name('admin.lesson.update');
        Route::delete('/admin/{course}/{section}/{lesson}/delete', 'destroy')->name('admin.lesson.delete');
    });


    Route::controller(AdminProfileController::class)->group(function () {
        Route::get('/admin/profile', 'edit')->name('admin.profile.infos');
        // Route::get('/admin/profile/edit', 'edit')->name('admin.profile.edit');
        Route::put('/admin/profile/update', 'update')->name('admin.profile.update');
    })->middleware(['admin', 'instructor']);

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/settings/site-settings', [SiteSettingsController::class, 'edit'])->name('site-settings.edit');
        Route::put('/settings/site-settings', [SiteSettingsController::class, 'update'])->name('site-settings.update');
    });
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('/settings/payment-gateways', PaymentGatewayController::class)->except('show');
    });
    Route::get('/admin/reviews', [ReviewController::class, 'index'])->name('reviews.index');
    Route::delete('/admin/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
    Route::get('/admin/reviews/{id}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
    Route::put('/admin/reviews/{id}', [ReviewController::class, 'update'])->name('reviews.update');
});
