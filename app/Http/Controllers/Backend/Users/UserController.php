<?php

namespace App\Http\Controllers\Backend\Users;

use App\Enums\Gender;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // public static function middleware()
    // {
    //     return ['admin'];
    // }

    public function index()
    {

        $users = User::role('Teacher')->latest()->paginate(5); // ou d'autres critères selon ton besoin

        return view('backend.users.index', compact(['users']));
    }
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all(); // Récupérer tous les rôles disponibles
        $genders = Gender::cases();
        return view('backend.users.create', compact('roles', 'genders'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'profession' => 'required|string|max:255',
            // 'roles' => 'required', // Pour attribuer des rôles lors de la création
            'gender' => ['required', Rule::in(array_column(Gender::cases(), 'value'))],
        ]);
        $validated['password'] = bcrypt($request->password);
        $user = User::create($validated);

        // if ($request->roles) {
        //     $user->syncRoles($request->roles); // Attribuer les rôles au nouvel utilisateur
        // }
        $user->assignRole('Teacher');
        return redirect()->route('users.index')->with('ok', 'Utilisateur créé avec succès.');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        $genders = Gender::cases();

        return view('backend.users.edit', compact('user', 'roles', 'userRole', 'genders'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            // 'roles' => 'required',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bio' => 'nullable|string',
            'phone' => 'nullable|string',
            'profession' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'country' => ['nullable', 'string'],
            'city' => ['nullable', 'string'],
            'state' => ['nullable', 'string'],
            'gender' => ['required', Rule::in(array_column(Gender::cases(), 'value'))],
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            $validated = Arr::except($validated, array('password'));
        }

        $user = User::find($id);
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
        $user->update($validated);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole('Teacher');
        return redirect()->route('users.index')->with('ok', 'Teacher updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('ok', 'User deleted successfully');
    }
}
