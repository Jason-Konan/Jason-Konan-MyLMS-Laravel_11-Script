<?php

namespace App\Http\Controllers\Backend\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use DB;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB as FacadesDB;

class RoleController extends Controller
{
    // public static function middleware()
    // {
    //     return ['admin'];
    // }
    public function index()
    {
        $roles = Role::orderBy('id', 'DESC')->paginate(5);
        return view('backend.users.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all(); // Récupérer toutes les permissions
        return view('backend.users.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles',
            'permissions' => 'required|array',
        ]);
        $permissionsID = array_map(
            function ($value) {
                return (int)$value;
            },
            $request->input('permissions')
        );

        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($permissionsID); // Assigner les permissions au rôle

        return redirect()->route('roles.index')->with('ok', 'Role créé avec succès.');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $permissions = Permission::all(); // Récupérer toutes les permissions
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = FacadesDB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        return view('backend.users.roles.edit', compact('role', 'permission', 'rolePermissions'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $permissionsID = array_map(
            function ($value) {
                return (int)$value;
            },
            $request->input('permission')
        );

        $role->syncPermissions($permissionsID);

        return redirect()->route('roles.index')->with('ok', 'Role mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        FacadesDB::table("roles")->where('id', $id)->delete();
        return redirect()->route('roles.index')->with('ok', 'Role deleted successfully.');
    }
}
