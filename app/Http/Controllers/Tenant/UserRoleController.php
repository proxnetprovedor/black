<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{

    public function roles(User $user)
    {

        if (!$user) {
            return redirect()->back();
        }


        $roles = Role::latest()->get();

        return view('tenant.employees.roles.edit', compact('user', 'roles'));
    }


    public function syncRoleUser(Request $request, User $user)
    {
        $roles = $request->input('roles') ?? [];

        $user->roles()->sync($roles);

        return redirect()->route('user.roles', $user)->with('success', 'Perfis de acesso sincronizados com sucesso !');
    }
}
