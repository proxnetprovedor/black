<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Profile;
use Illuminate\Http\Request;

class PlanProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:isSuperAdmin');
    }

    public function plans(Profile $profile)
    {

        if (!$profile) {
            return redirect()->back();
        }


        $plans = Plan::latest()->get();

        return view('admin.profiles.plans.plans', compact('profile', 'plans'));
    }

    public function syncProfilePlan(Request $request, Profile $profile)
    {
        $plans = $request->input('plan') ?? [];

        $profile->plans()->sync($plans);

        return redirect()->route('profiles.index')->with('success', 'Plano sincronizados com sucesso !');
    }

    public function profiles(Plan $plan)
    {

        if (!$plan) {
            return redirect()->back();
        }


        $profiles = Profile::latest()->get();

        return view('admin.plans.profiles.profiles', compact('profiles', 'plan'));
    }

    public function syncPlanProfile(Request $request, Plan $plan)
    {
        $profiles = $request->input('profile') ?? [];

        $plan->profiles()->sync($profiles);

        return redirect()->route('plans.index')->with('success', 'Perfil de acesso sincronizados com sucesso !');
    }
}
