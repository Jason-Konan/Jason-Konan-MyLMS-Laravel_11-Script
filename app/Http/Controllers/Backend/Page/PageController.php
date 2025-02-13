<?php

namespace App\Http\Controllers\Backend\Page;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\PageRequest;
use App\Http\Requests\Backend\UpdatePageRequest;
use Mews\Purifier\Facades\Purifier;
use App\Models\Page;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::all(); // Récupère toutes les pages
        return view('backend.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(PageRequest $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validated();

        // Nettoyer le contenu avec Purifier
        // $cleanContent = Purifier::clean($request->input('content'));

        // Créer la page avec les données nettoyées
        Page::create([
            'name' => $validatedData['name'],
            'slug' => $validatedData['slug'],

            'content' => $request->input('content'),
            'meta_title' => $validatedData['meta_title'],
            'meta_description' => $validatedData['meta_description'],
            'meta_keywords' => $validatedData['meta_keywords'],
        ]);

        return redirect()->route('admin.pages.index')->with('ok', 'Page créée avec succès.');
    }
    public function show(Page $page)
    {
        if (!$page->published) {
            abort(404, __('messages.page-not-found'));
        }
        $siteSettings = SiteSetting::first(); // Récupérer les paramètres globaux
        return view('frontend.pages.show', compact('page', 'siteSettings'));
    }
    public function togglePublication(Request $request, Page $page)
    {
        $page->update(['published' => !$page->published]);
        return redirect()->back()->with('ok', 'Status changed');
    }

    public function updatePosition(Request $request, Page $page)
    {
        $validated = $request->validate([
            'position' => 'nullable|in:nav,footer',
            // Ajoute ici les autres champs si nécessaire
        ]);

        $page->update($validated);
        return redirect()->back()->with('ok', 'Position changed');
    }

    public function edit(Page $page)
    {
        return view('backend.pages.edit', compact('page'));
    }

    public function update(UpdatePageRequest $request, Page $page)
    {
        $validated = $request->validated();

        $page->update($validated);
        return redirect()->route('admin.pages.index')->withOk('Page updated Successfully');
    }


    public function destroy(page $page)
    {
        $page->delete();
        return redirect()->back()->withOk('Page delete Successfully');
    }
}
