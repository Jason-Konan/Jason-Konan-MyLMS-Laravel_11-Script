<?php

namespace App\Http\Controllers\Backend\Users;

use App\Enums\Gender;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AdminProfileController extends Controller
{
    // public static function middleware()
    // {
    //     return ['admin'];
    // }
    // public function index()
    // {
    //     $user = Auth::user();
    //     return view('backend.profile.edit', compact('user'));
    // }

    // public function edit()
    // {
    //     $user = Auth::user();
    //     return view('backend.profile.edit', compact('user'));
    // }

    // public function update(Request $request)
    // {
    //     $user = Auth::user();

    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
    //         'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'bio' => 'nullable|string',
    //         'phone' => 'nullable|string',
    //         'address' => 'nullable|string',
    //         // 'date_of_birth' => 'nullable|date',
    //     ]);

    //     if ($request->hasFile('profile_picture')) {
    //         $profilePicture = $request->file('profile_picture')->store('profile-pictures', 'public');
    //         $validated['profile_picture'] = $profilePicture;
    //     }

    //     $user->update($validated);

    //     return redirect()->route('admin.profile.infos')->with('ok', 'Profil mis à jour avec succès.');
    // }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $genders = Gender::cases();
        return view('backend.profile.edit', [
            'user' => $request->user(),
            'genders' => $genders,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request,): RedirectResponse
    {
        $validated = $request->validated();
        $user = $request->user();
        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }
        // Enregistrer l'image de profile
        // if ($request->hasFile('profile_picture')) {
        //     $profilePicture = $request->file('profile_picture')->store('profile-pictures', 'public');
        //     $validated['profile_picture'] = $profilePicture;
        // }
        if ($request->hasFile('profile_picture')) {
            // Supprimer l'ancienne image si elle existe
            if (!empty($user->profile_picture) && Storage::disk('public')->exists($user->profile_picture)) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            $validated['profile_picture'] = $request->file('profile_picture')->store('profile-pictures', 'public');
        }
        // Gérer le champ 'gender'
        if (isset($validated['gender'])) {
            $validated['gender'] = Gender::from($validated['gender']);
        }



        $request->user()->update($validated);

        return Redirect::route('admin.profile.infos')->with('ok', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
