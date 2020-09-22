<?php

namespace App\Traits;

use App\Models\Tenant;
use App\Tenant\Observers\TenantObserver;
use App\Tenant\Scopes\TenantScope;
use Illuminate\Support\Facades\Auth;

trait TenantTrait
{
    protected static function boot()
    {
        parent::boot();

        static::observe(TenantObserver::class);

        static::addGlobalScope(new TenantScope);
    }

    public  function tenant() {
        return $this->belongsTo(Tenant::class, 'tenant_id');
    }
}
