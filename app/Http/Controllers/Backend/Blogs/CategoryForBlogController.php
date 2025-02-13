<?php

namespace App\Http\Controllers\Backend\Blogs;

use App\Http\Controllers\Controller;
use App\Models\CategoryForBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryForBlogController extends Controller
{
    // public static function middleware()
    // {
    //     return ['admin'];
    // }
    public function create()
    {
        $posts_categories = CategoryForBlog::all();
        return view('backend.blogs.categories.create', compact(['posts_categories']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,svg,vif'],
            'name' => ['required', 'min:3', 'string'],
            'description' => ['required', 'min:3', 'string']
        ]);
        // Vérifie si une catégorie avec le même nom ou slug existe déjà
        if (CategoryForBlog::where('name', $validated['name'])->orWhere('slug', Str::slug($validated['name']))->exists()) {
            return redirect()->back()->withErrors([
    'failed' => __('A category with the same name or slug already exists.')
]);

        }

        $validated['image'] = $request->file('image')->store('thumbnails/blogs_categories', 'public');

        $validated['slug'] = Str::slug($validated['name']);
        CategoryForBlog::query()->create($validated);
        return redirect()->route('create.blogCategory')->withok(__('New category for blogs added.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoryForBlog $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryForBlog $category)
    {
        return view('backend.blogs.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, CategoryForBlog $category)
    // {
    //     $validated = $request->validate([
    //         'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,svg,vif'],
    //         'name' => ['required', 'min:3', 'string'],
    //         'description' => ['required', 'min:3', 'string']
    //     ]);
    //     // Vérifie si une autre catégorie avec le même nom ou slug existe déjà
    //     if (CategoryForBlog::where('id', '!=', $category->id)
    //         ->where(function ($query) use ($validated) {
    //             $query->where('name', $validated['name'])
    //                 ->orWhere('slug', Str::slug($validated['name']));
    //         })->exists()
    //     ) {
    //         return redirect()->back()->withErrors(['failed' => __('Another category with the same name or slug already exists.')]);
    //     }
    //     if ($request->file('image')) {
    //         Storage::disk('public')->delete($category->image);
    //         $validated['image'] = $request->file('image')->store('thumbnails/blogs_categories', 'public');
    //     }
    //     $category->update($validated);
    //     return redirect()->route('create.blogCategory')->withok(__('Category Updated Successfully'));
    // }
public function update(Request $request, CategoryForBlog $category)
{
    $validated = $request->validate([
        'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,svg,vif'],
        'name' => ['required', 'min:3', 'string'],
        'description' => ['required', 'min:3', 'string']
    ]);

    // Vérifie si une autre catégorie avec le même nom ou slug existe déjà
    if (CategoryForBlog::where('id', '!=', $category->id)
        ->where(function ($query) use ($validated) {
            $query->where('name', $validated['name'])
                ->orWhere('slug', Str::slug($validated['name']));
        })->exists()
    ) {
        return redirect()->back()->withErrors(['failed' => __('Another category with the same name or slug already exists.')]);
    }

    if ($request->file('image')) {
        // Supprimer l'ancienne image avant de télécharger la nouvelle
        Storage::disk('public')->delete($category->image);
        // Enregistrer la nouvelle image
        $validated['image'] = $request->file('image')->store('thumbnails/blogs_categories', 'public');
    } else {
        // Si aucune image n'est téléchargée, enlever 'image' des données validées
        unset($validated['image']);
    }

    // Mise à jour de la catégorie
    $category->update($validated);

    return redirect()->route('create.blogCategory')->with('ok', __('Category Updated Successfully'));
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryForBlog $category)
    {
        $category->delete();
        return redirect()->route('create.blogCategory')->withok(__('Category deleted.'));
    }
}
