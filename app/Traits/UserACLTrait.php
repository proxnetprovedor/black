<?php

namespace App\Traits;

use App\Models\Tenant;

trait UserACLTrait
{
    /**
     * Retorna todas as permissões do usuário
     */
    public function permissions(): array
    {
        $permissionsPlan = $this->permissionsPlan();
        $permissionsRole = $this->permissionsRole();

        // dd($permissionsRole);
        $permissions = [];
        foreach ($permissionsRole as $permission) {
            if (in_array($permission, $permissionsPlan))
                array_push($permissions, $permission);
        }
        return $permissions;
    }

    /**
     * Retorna todas as permissões vinculadas ao plano do provedor
     */
    public function permissionsPlan(): array
    {
        // $tenant = $this->tenant;
        // $plan = $tenant->plan()->profiles()->permissions;
        $tenant = Tenant::with('plan.profiles.permissions')->where('id', $this->tenant_id)->first();
        $plan = $tenant->plan;
        // dd($tenant->plan()->profiles()->permissions);
        $permissions = [];
        foreach ($plan->profiles as $profile) {
            foreach ($profile->permissions as $permission) {
                array_push($permissions, $permission->name);
            }
        }
        // dd($permissions);
        return $permissions;
    }
    /**
     * Retorna todas as permissões associadas a role do usuário
     */
    public function permissionsRole(): array
    {
        $roles = $this->roles()->with('permissions')->get();
        // dd($roles);
        $permissions = [];
        foreach ($roles as $role) {
            foreach ($role->permissions as $permission) {
                array_push($permissions, $permission->name);
            }
        }
        // dd($permissions);
        return $permissions;
    }

    public function hasPermission(string $permissionName): bool
    {
        return in_array($permissionName, $this->permissions());
    }

    public function isAdmin(): bool
    {
        return in_array($this->email, config('acl.admins'));
    }

    public function isTenant(): bool
    {
        return !in_array($this->email, config('acl.admins'));
    }
}
