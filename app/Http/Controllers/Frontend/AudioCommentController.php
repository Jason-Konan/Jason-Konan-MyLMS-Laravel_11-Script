<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class AudioCommentController extends Controller
{
    public function store(Request $request, Course $course)
    {
        // Validation de l'audio
        $request->validate([
            'audio' => 'required|file|mimes:mp3,wav|max:2048',
        ]);

        // Sauvegarde du fichier
        $path = $request->file('audio')->store('audio-comments', 'public');

        // Sauvegarde du commentaire audio dans la base de données
        $course->audioComments()->create([
            'file_path' => $path,
        ]);

        return redirect()->back()->with('ok', 'Commentaire audio sauvegardé avec succès !');
    }
}
