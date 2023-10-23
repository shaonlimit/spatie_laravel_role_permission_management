<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;



class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('components.backend.role.role_index', compact('roles'));
    }

    public function create()
    {
        return view('components.backend.role.role_create');
    }

    public function store(Request $request)
    {
        Role::create([
            'name' => strtolower($request->name),
        ]);
        return redirect()->route('role.index');
    }
    public function delete($id)
    {
        Role::findOrFail($id)->delete();
        return redirect()->back()->with('message', 'Role deleted!');
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();

        return view('components.backend.role.role-edit', compact('role', 'permissions'));
    }
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $data = $request->except('_token');
        $role->update($data);
        return redirect()->route('role.index');
    }
    public function assign_permission(Request $request, $id)
    {
        $role = Role::find($id);
        if ($role->hasPermissionTo($request->permission)) {
            toastr()->error('Permission exist!', 'Oops!');
            return redirect()->back();
        }
        $role->givePermissionTo($request->permission);
        toastr()->success('Permission assigned successfully!', 'Congrats');
        return redirect()->back();
    }
    public function revoke_permission($role_id, $permission_id)
    {
        $role = Role::find($role_id);
        $permission = Permission::find($permission_id);
        $role->revokePermissionTo($permission);
        toastr()->error('Permission revoked!', 'Oops!');
        return redirect()->back();
    }
}
