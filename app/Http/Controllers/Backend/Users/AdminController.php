<?php

namespace App\Http\Controllers\Backend\Users;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\CarouselImage;
use App\Models\Course;
use App\Models\DefaultLanguageSetting;
use App\Models\Faq;
use App\Models\Payment;
use App\Models\Review;
use App\Models\SectionVisibility;
use App\Models\Setting;
use App\Models\Template;
use App\Models\TemplateSection;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index()
    {
        $studentCount = User::role('Student')->count();
        $instructorCount = User::role('Teacher')->count();
        $courseCount = Course::count();
        $completedPayments = Payment::where('status', 'paid')->count();
        $canceledPayments = Payment::where('status', 'canceled')->count();
        $blogCount = Blog::count();

        $userEvolution = User::selectRaw("strftime('%Y-%m', created_at) as month, count(*) as count")
            ->where('created_at', '>=', Carbon::now()->subMonths(6))
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->pluck('count', 'month');

        $paymentEvolution = Payment::where('status', 'completed')
            ->selectRaw("strftime('%Y-%m', created_at) as month, sum(amount) as total")
            ->where('created_at', '>=', Carbon::now()->subMonths(6))
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->pluck('total', 'month');

        // Remplir les mois manquants
        $months = collect(range(0, 5))->map(function ($i) {
            return Carbon::now()->subMonths($i)->format('Y-m');
        })->reverse();

        $userEvolution = $months->mapWithKeys(function ($month) use ($userEvolution) {
            return [$month => $userEvolution->get($month, 0)];
        });

        $paymentEvolution = $months->mapWithKeys(function ($month) use ($paymentEvolution) {
            return [$month => $paymentEvolution->get($month, 0)];
        });


        return view('backend.dashboard', compact(
            'studentCount',
            'instructorCount',
            'courseCount',
            'completedPayments',
            'canceledPayments',
            'blogCount',
            'paymentEvolution',
            'userEvolution'
        ));
    }

    public function frontend(Faq $faq)
    {
        $faqs = Faq::all();
        $sections = TemplateSection::all();
        $images = CarouselImage::all();
        // $images = CarouselImage::where('section', 'hero-section')->get();
        return view('backend.frontend.index', compact('sections', 'images', 'faqs', 'faq'));
    }
    public function toggle($id)
    {
        $section = TemplateSection::findOrFail($id);
        $section->update(['is_active' => !$section->is_active]);
        return redirect()->back()->with('ok', 'Section mise à jour avec succès.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,svg,avif',
            'section' => 'required|string', // Ajouter cette ligne si vous souhaitez récupérer une section spécifique
            'title_fr' => 'nullable|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'title_es' => 'nullable|string|max:255',
            'title_it' => 'nullable|string|max:255',
            'description_fr' => 'nullable|string|max:1000',
            'description_en' => 'nullable|string|max:1000',
            'description_es' => 'nullable|string|max:1000',
            'description_it' => 'nullable|string|max:1000',
        ]);

        try {
            $path = $request->file('image')->store('carousel', 'public');

            // Enregistrez l'image avec la section spécifiée
            CarouselImage::create([
                'image_path' => $path,
                'section' => 'hero-section',
                'title_fr' => $request->title_fr,
                'title_en' => $request->title_en,
                'title_es' => $request->title_es,
                'title_it' => $request->title_it,
                'description_fr' => $request->description_fr,
                'description_en' => $request->description_en,
                'description_es' => $request->description_es,
                'description_it' => $request->description_it,
            ]);

            return redirect()->back()->with('ok', 'Image ajoutée avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->withFailed('Une erreur est survenue lors de l\'ajout de l\'image.');
        }
    }

    public function update(Request $request, $id)
    {
        // Validation des champs
        $validated = $request->validate([
            'title_fr' => 'nullable|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'title_es' => 'nullable|string|max:255',
            'title_it' => 'nullable|string|max:255',
            'description_fr' => 'nullable|string|max:1000',
            'description_en' => 'nullable|string|max:1000',
            'description_es' => 'nullable|string|max:1000',
            'description_it' => 'nullable|string|max:1000',
        ]);

        try {
            // Trouver l'image
            $image = CarouselImage::findOrFail($id);

            // Mettre à jour les informations uniquement pour les champs envoyés
            $image->update($validated);

            // Rediriger avec un message de succès
            return redirect()->back()->with('ok', 'Image mise à jour avec succès.');
        } catch (\Exception $e) {
            // Gestion des erreurs
            return redirect()->back()->with('failed', 'Une erreur est survenue : ' . $e->getMessage());
        }
    }


    public function destroy($id)
    {
        $image = CarouselImage::findOrFail($id);

        try {
            // Supprime le fichier du stockage
            if (Storage::disk('public')->exists($image->image_path)) {
                Storage::disk('public')->delete($image->image_path);
            }

            // Supprime l'entrée de la base de données
            $image->delete();

            return redirect()->back()->with('ok', 'Image supprimée avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->withFailed('Une erreur est survenue lors de la suppression de l\'image.');
        }
    }

    // Afficher la page pour configurer la langue
    public function editLanguage()
    {
        $currentLanguage = DefaultLanguageSetting::first(); // On suppose une seule ligne dans la table
        return view('components.front-end.default-language', compact('currentLanguage'));
    }

    // Mettre à jour la langue par défaut
    public function updateLanguage(Request $request)
    {
        $request->validate([
            'locale' => 'required|string|max:5', // Valider la langue
        ]);

        // Récupérer ou créer une ligne pour la langue par défaut
        $language = DefaultLanguageSetting::firstOrNew();
        $language->locale = $request->locale;
        $language->save();

        // Mettre à jour immédiatement la langue pour l'application
        config(['app.locale' => $request->locale]);

        return redirect()->back()->with('ok', 'Langue mise à jour avec succès.');
    }
}
