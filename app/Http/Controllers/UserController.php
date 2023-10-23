<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;



class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('components.backend.user.user_index', compact('users'));
    }
    public function info($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $permissions = Permission::all();
        return view('components.backend.user.user_info', compact('user', 'roles', 'permissions'));
    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        toastr()->error('User deleted!', 'Oops');
        return redirect()->back();
    }

    public function user_role_assign(Request $request, $id)
    {
        $user = User::find($id);
        $user->assignRole($request->role);
        toastr()->success('Role assigned successfully!', 'Congrats');
        return redirect()->back();
    }

    public function user_permission_assign(Request $request, $id)
    {
        $user = User::find($id);
        $user->givePermissionTo($request->permission);
        toastr()->success('Permission assigned successfully!', 'Congrats');
        return redirect()->back();
    }
    public function user_role_delete($user_id, $role_id)
    {
        $user = User::find($user_id);
        $role = Role::find($role_id);
        $user->removeRole($role);
        toastr()->error('Role removed!', 'Oops!');
        return redirect()->back();
    }

    public function user_permission_delete($user_id, $permisison_id)
    {
        $user = User::find($user_id);
        $permission = Role::find($permisison_id);
        $user->revokePermissionTo($permission);
        toastr()->error('Permission removed!', 'Oops!');
        return redirect()->back();
    }
}
