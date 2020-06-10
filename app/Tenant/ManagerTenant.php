<?php

namespace App\Tenant;

use App\Models\Tenant;

class ManagerTenant
{
    /**
     * Retorna o id do tenant
     */
    public function getTenantIdentify()
    {
        return auth()->check() ? auth()->user()->tenant_id : '';
    }

    /**
     * Retorna o objeto do tenant
     */
    public function getTenant()
    {
        return auth()->check() ? auth()->user()->tenant : '';
    }

    /**
     * Checa se o usuário autenticado é um superAdmin
     */
    public function isAdmin(): bool
    {
        return in_array(auth()->user()->email, config('tenant.admins'));
    }
}
