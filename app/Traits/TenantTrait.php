<?php

namespace App\Traits;

use App\Models\Tenant;
use Illuminate\Support\Facades\Auth;

trait TenantTrait
{
    public  function tenant() {
        return $this->belongsTo(Tenant::class, 'tenant_id');
    }
}
