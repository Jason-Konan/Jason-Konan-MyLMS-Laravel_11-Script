<?php

namespace App\Http\Controllers\Backend\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    // public static function middleware()
    // {
    //     return ['admin'];
    // }
    public function index()
    {
        $permissions = Permission::all();
        return view('backend.users.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('backend.users.permissions.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|unique:permissions']);
        Permission::create(['name' => $request->name]);
        return redirect()->route('permissions.index')->with('ok', 'Permission created successfully.');
    }

    public function edit(Permission $permission)
    {
        return view('backend.users.permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate(['name' => 'required|unique:permissions,name,' . $permission->id]);
        $permission->update(['name' => $request->name]);
        return redirect()->route('permissions.index')->with('ok', 'Permission updated successfully.');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permissions.index')->with('ok', 'Permission deleted successfully.');
    }
}
