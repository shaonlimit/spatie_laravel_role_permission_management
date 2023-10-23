<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;



class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('components.backend.permission.permission_index', compact('permissions'));
    }

    public function delete($id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        return redirect()->back();
    }
    public function store(Request $request)
    {
        Permission::create([
            'name' => strtolower($request->name),
        ]);
        return redirect()->route('permission.index');
    }
    public function create()
    {
        return view('components.backend.permission.permission_create');
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        $roles = Role::all();
        return view('components.backend.permission.permission-edit', compact('permission', 'roles'));
    }
    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);
        $data = $request->except('_token');
        $permission->update($data);
        return redirect()->route('permission.index');
    }
    public function assign_role(Request $request, $id)
    {
        $permission = Permission::find($id);
        if ($permission->hasRole($request->role)) {
            toastr()->error('Role exist!', 'Oops!');
            return redirect()->back();
        }
        $permission->assignRole($request->role);
        toastr()->success('Permission assigned successfully!', 'Congrats');
        return redirect()->back();
    }
    public function remove_role($permission_id, $role_id)
    {
        $permission = Permission::find($permission_id);
        $role = Role::find($role_id);
        $permission->removeRole($role);
        toastr()->error('Role removes!', 'Oops');
        return redirect()->back();
    }
}
