<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Tenant;
use Illuminate\Http\Request;

class ProviderPlanController extends Controller
{

    protected $repository, $plan;

    public function __construct(Tenant $provider, Plan $plan)
    {
        $this->repository = $provider;
        $this->plan = $plan;
        $this->middleware('can:isSuperAdmin');
    }


    public function index($urlPlan)
    {
        if (!$plan = $this->plan->where('url', $urlPlan)->first()) {
            return redirect()->back();
        }

        // $details = $plan->details();
        $providers = $plan->tenants()->paginate();

        return view('admin.plans.providers.index', [
            'plan' => $plan,
            'providers' => $providers,
        ]);
    }
}
