<?php

namespace App\Http\Controllers\Backend\Courses;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CourseSectionRequest;
use App\Models\Course;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SectionController extends Controller
{
    public function index(Course $course)
    {
        return view('backend.courses.sections.index', compact('course'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseSectionRequest $request, Course $course)
    {
        $validated = $request->validated();

        $validated['slug'] = Str::slug($validated['name']);

        $validated['course_id'] = $course->id;

        Section::create($validated);
        return redirect()->back()->with('ok', 'Section created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course, Section $section)
    {
        return view('backend.courses.sections.edit', compact('course', 'section'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Course $course, Section $section, CourseSectionRequest $request)
    {
        // Valider les données du formulaire
        $validated = $request->validated();

        // Mettre à jour le titre de la section
        $section->update([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
        ]);

        // Rediriger avec un message de succès
        return redirect()->route('admin.section.index', $course)->with('ok', 'Section updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course, Section $section)
    {
        if ($section->course_id !== $course->id) {
            return redirect()->route('admin.section.index', $course)->withF('Section not found in this course');
        }
        $section->delete();
        return redirect()->route('admin.section.index', $course)->withOk('Section deleted successfully');
    }
}
