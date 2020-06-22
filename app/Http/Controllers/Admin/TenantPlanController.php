<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantPlanController extends Controller
{
    public function show(Tenant $tenant)
    {
        $plans = Plan::with('details')->orderBy('price', 'ASC')->get();

        return view('admin.tenants.plan.show', compact('tenant', 'plans'));
    }

    public function update(Tenant $tenant, Plan $plan)
    {
        
        $planoAntigo = $tenant->plan;
        
        $tenant->plan()->associate($plan);

        $tenant->save();

        return redirect()->route('tenant.profile.show', $tenant)->with('success', 'Plano alterado de '.$planoAntigo->name.' para ' .$plan->name);
    }
}
