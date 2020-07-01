<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantPlanController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:isSuperAdmin');
    }
    
    public function show(Tenant $tenant)
    {
        if (!($tenant->id === auth()->user()->tenant_id)) {
            abort(403);
        }

        $plans = Plan::with('details')->orderBy('price', 'ASC')->get();

        return view('admin.tenants.plan.show', compact('tenant', 'plans'));
    }

    public function update(Tenant $tenant, Plan $plan)
    {
        if (!($tenant->id === auth()->user()->tenant_id)) {
            abort(403);
        }

        $planoAntigo = $tenant->plan;

        $tenant->plan()->associate($plan);

        $tenant->subscription_date =   now();

        $tenant->expires_at = now()->addDays(30);

        $tenant->save();

        return redirect()->route('tenant.profile.show', $tenant)->with('success', 'Plano alterado de ' . $planoAntigo->name . ' para ' . $plan->name);
    }
}
