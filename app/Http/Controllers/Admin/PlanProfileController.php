<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Profile;
use Illuminate\Http\Request;

class PlanProfileController extends Controller
{
    public function plans(Profile $profile)
    {
       
        if (!$profile) {
            return redirect()->back();
        }


        $plans = Plan::latest()->get();

        return view('admin.profiles.plans.plans', compact('profile', 'plans'));
    }

    public function syncPlanProfile(Request $request, Profile $profile)
    {
        $plans = $request->input('plan') ?? [];

        $profile->plans()->sync($plans);

        return redirect()->route('profiles.index')->with('success', 'Plano sincronizados com sucesso !');
    }
}
