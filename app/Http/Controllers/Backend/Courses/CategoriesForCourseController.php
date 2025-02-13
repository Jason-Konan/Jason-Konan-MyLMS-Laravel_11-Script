<?php

namespace App\Http\Controllers\Backend\Courses;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CourseCategoryRequest;
use App\Models\CategoriesForCourse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoriesForCourseController extends Controller
{
    // public static function middleware()
    // {
    //     return ['admin'];
    // }
    public function create()
    {
        $categories = CategoriesForCourse::all();
        return view('backend.courses.categories.create', compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseCategoryRequest $request)
    {
        $validated = $request->validated();

        // Vérifie si une catégorie avec le même nom ou slug existe déjà
        if (CategoriesForCourse::where('name', $validated['name'])->orWhere('slug', Str::slug($validated['name']))->exists()) {
            return redirect()->back()->withErrors(['failed' => 'A category with the same name or slug already exists.']);
        }

        $validated['image'] = $request->file('image')->store('thumbnails/courses_categories', 'public');
        $validated['slug'] = Str::slug($validated['name']);
        CategoriesForCourse::create($validated);

        return redirect()->route('create.category')->with('ok', 'New category added');
    }


    /**
     * Display the specified resource.
     */
    public function show(CategoriesForCourse $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoriesForCourse $category)
    {
        return view('backend.courses.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseCategoryRequest $request, CategoriesForCourse $category)
    {
        $validated = $request->validated();

        // Vérifie si une autre catégorie avec le même nom ou slug existe déjà
        if (CategoriesForCourse::where('id', '!=', $category->id)
            ->where(function ($query) use ($validated) {
                $query->where('name', $validated['name'])
                    ->orWhere('slug', Str::slug($validated['name']));
            })->exists()
        ) {
            return redirect()->back()->withErrors(['failed' => 'Another category with the same name or slug already exists.']);
        }

        if ($request->file('image')) {
            Storage::disk('public')->delete($category->image);
            $validated['image'] = $request->file('image')->store('thumbnails/courses_categories', 'public');
        }

        $validated['slug'] = Str::slug($validated['name']);
        $category->update($validated);

        return redirect()->route('create.category')->with('ok', 'Category updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoriesForCourse $category)
    {
        $category->delete();
        return redirect()->route('create.category')->withok('Category deleted.');
    }
}
