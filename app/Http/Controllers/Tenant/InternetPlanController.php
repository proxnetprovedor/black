<?php

namespace App\Http\Controllers\Tenant;

use App\Models\InternetPlan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class InternetPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('planos-de-internet visualizar'), 403);

        $internetPlans = InternetPlan::latest()->paginate(15);
        return view('tenant.internet-plan.index', compact('internetPlans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('planos-de-internet criar'), 403);

        return view('tenant.internet-plan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if(Gate::denies('planos-de-internet criar'), 403);

        //dd($request->all());
        $iPlan = InternetPlan::create($request->all());
        return redirect()->route('internet-plans.index')
            ->with('success', 'Plano de Internet ' . $iPlan->value . 'cadastrado com sucesso !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InternetPlan  $internetPlan
     * @return \Illuminate\Http\Response
     */
    public function show(InternetPlan $internetPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InternetPlan  $internetPlan
     * @return \Illuminate\Http\Response
     */
    public function edit(InternetPlan $internetPlan)
    {
        //dd($internetPlan);
        abort_if(Gate::denies('planos-de-internet editar'), 403);

        return view('tenant.internet-plan.edit', compact('internetPlan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InternetPlan  $internetPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InternetPlan $internetPlan)
    {
        abort_if(Gate::denies('planos-de-internet editar'), 403);

        $internetPlan->update($request->all());
        return redirect()->route('internet-plans.index')
            ->with('success', 'Plano ' . $internetPlan->price . ' atualizado com sucesso !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InternetPlan  $internetPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(InternetPlan $internetPlan)
    {
        abort_if(Gate::denies('planos-de-internet deletar'), 403);

        //dd("es");
        //$cto->instalations()->delete();
        $internetPlan->delete();

        return redirect()->route('internet-plans.index')
            ->with('success', 'Plano ' . $internetPlan->name . ' excluído com sucesso !');
    }
}
