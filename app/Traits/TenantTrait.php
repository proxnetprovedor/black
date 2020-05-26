<?php

namespace App\Traits;

use App\Models\Tenants;
use Illuminate\Support\Facades\Auth;

trait TenantTrait
{
    public  function tenant() {
        return $this->belongsTo(Tenants::class, 'tenant_id');
    }
}
