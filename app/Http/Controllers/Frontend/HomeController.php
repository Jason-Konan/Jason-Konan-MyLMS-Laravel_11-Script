<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\CarouselImage;
use App\Models\CategoriesForCourse;
use App\Models\CategoryForBlog;
use App\Models\Course;
use App\Models\Faq;
use App\Models\Page;
use App\Models\Payment;
use App\Models\Review;
use App\Models\Setting;
use App\Models\SiteSetting;
use App\Models\TemplateSection;
use App\Models\User;
// use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\View\View as ViewView;

class HomeController extends Controller
{

    public function home()
    {
        $teachers = User::role('Teacher')->paginate(5);
        $reviews = Review::query()->orderBy('created_at', 'asc')->take(6)->get();
        $setting = Setting::where('key', 'current_template')->first();
        $courses = Course::query()->orderBy('updated_at', 'asc')->take(4)->get();
        $blogs = Blog::query()->orderBy('updated_at', 'asc')->take(4)->get();
        $currentTemplate = $setting ? $setting->value : 'frontend.templates.template1'; // Template par défaut
        $sections = TemplateSection::active()->get();
        $carouselImages = CarouselImage::all(); // Récupérer toutes les images du carousel
        $faqs = Faq::all();
        // $categories = CategoriesForCourse::all();
        if (!View::exists($currentTemplate . '.home')) {
            return abort(404, __('messages.template-error'));
        }

        return view($currentTemplate . '.home', compact('teachers', 'sections', 'carouselImages', 'currentTemplate', 'blogs', 'courses', 'reviews', 'faqs'));
    }





    public function courses(Request $request)
    {
        $query = Course::query()->where('is_active', true);

        // Filtre par catégorie
        if ($request->has('category')) {
            $query->whereIn('categories_for_course_id', $request->input('category'));
        }

        // Filtre par langue
        if ($request->has('language')) {
            $query->whereIn('language', $request->input('language'));
        }
        // Filtre par level
        if ($request->has('level')) {
            $query->whereIn('level', $request->input('level'));
        }
        // Filtre par nom
        if ($request->has('name') && $request->input('name') !== '') {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        $courses = $query->orderBy('created_at', 'desc')->paginate(10);
        $categorieForCourses = CategoriesForCourse::all();


        $setting = Setting::where('key', 'current_template')->first();
        $currentTemplate = $setting ? $setting->value : 'frontend.templates.template1'; // Utilise un template par défaut valide

        // Vérifie si la vue existe
        if (!View::exists($currentTemplate . '.courses/index')) {
            abort(404)->with('failed', __('messages.template-error')); // Gérer le cas où la vue n'existe pas
        }

        return view($currentTemplate . '.courses/index', compact(['courses', 'categorieForCourses']));
    }

    public function coursesByCategory(CategoriesForCourse $category)
    {
        $courses = $category->courses()->paginate(5);
        $categories = CategoriesForCourse::all();
        $setting = Setting::where('key', 'current_template')->first();
        $currentTemplate = $setting ? $setting->value : 'frontend.templates.template1'; // Utilise un template par défaut valide

        // Vérifie si la vue existe
        if (!View::exists($currentTemplate . '.courses/index')) {
            abort(404)->with('failed', __('messages.template-error')); // Gérer le cas où la vue n'existe pas
        }

        return view($currentTemplate . '.courses/index', compact('courses', 'categories'));
    }


    public function allBlogs()
    {
        $blogs = Blog::query()->orderBy('created_at', 'desc')->paginate(4);
        $bloggy = Blog::query()->orderBy('created_at', 'asc')->take(1)->get();
        $categoriesForBlog = CategoryForBlog::all();
        $setting = Setting::where('key', 'current_template')->first();
        $currentTemplate = $setting ? $setting->value : 'frontend.templates.template1'; // Utilise un template par défaut valide

        // Vérifie si la vue existe
        if (!View::exists($currentTemplate . '.blogs/index')) {
            abort(404)->with('failed', __('messages.template-error')); // Gérer le cas où la vue n'existe pas
        }

        return view($currentTemplate . '.blogs/index', compact('blogs', 'categoriesForBlog', 'bloggy'));
        // return view('blogs.index', compact('blogs'));
    }



    public function postsByCategory(CategoryForBlog $category)
    {
        $blogs = $category->blogs()->paginate(5);
        $bloggy = Blog::query()->orderBy('created_at', 'asc')->take(1)->get();
        $categoriesForBlog = CategoryForBlog::all();
        $setting = Setting::where('key', 'current_template')->first();
        $currentTemplate = $setting ? $setting->value : 'frontend.templates.template1'; // Utilise un template par défaut valide

        // Vérifie si la vue existe
        if (!View::exists($currentTemplate . '.blogs/index')) {
            abort(404)->with('failed', __('messages.template-error')); // Gérer le cas où la vue n'existe pas
        }

        return view($currentTemplate . '.blogs/index', compact('blogs', 'categoriesForBlog', 'bloggy'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('frontend.students.profile.edit', compact('user'));
    }
}
