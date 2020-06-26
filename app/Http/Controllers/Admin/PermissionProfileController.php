<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Profile;
use Illuminate\Http\Request;

class PermissionProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:isSuperAdmin');
    }

    public function permissions(Profile $profile)
    {
       
        if (!$profile) {
            return redirect()->back();
        }


        $permissions = Permission::orderBy('name', 'ASC')->get();

        return view('admin.profiles.permissions.permissions', compact('profile', 'permissions'));
    }

    public function syncPermissionsProfile(Request $request, Profile $profile)
    {
        $permissions = $request->input('permission') ?? [];

        $profile->permissions()->sync($permissions);

        return redirect()->back()->with('success', 'Permissões sincronizadas com sucesso');
    }
}
