<?php

namespace App\Observers;

use App\Models\Tenant;
use Illuminate\Support\Str;

class TenantObserver
{
    /**
     * Handle the tenant "creating" event.
     *
     * @param  \App\Models\\Tenant  $tenant
     * @return void
     */
    public function creating(Tenant $tenant)
    {
        $tenant->url =  Str::kebab($tenant->name);
    }

    /**
     * Handle the tenant "updated" event.
     *
     * @param  \App\Models\\Tenant  $tenant
     * @return void
     */
    public function updated(Tenant $tenant)
    {
        $tenant->url =  Str::kebab($tenant->name);
    }

    
}
