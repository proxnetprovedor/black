<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlan;
use App\Models\Plan;
use App\Models\Profile;
use Illuminate\Http\Request;

class PlanController extends Controller
{

    protected $repository;

    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
        $this->middleware('can:isSuperAdmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = $this->repository->latest()->paginate();
        
        return view('admin.plans.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profiles = Profile::latest()->get();

        return view('admin.plans.create', compact('profiles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePlan $request)
    {
        $plan = $this->repository->create($request->except('profile'));

        $profiles = $request->input('profile') ? $request->input('profile') : [];

        $plan->sync($profiles);

        return redirect()->route('plans.index')->with('succes', 'Plano ' . $plan->name . 'cadastrado com sucesso !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        return view('admin.plans.show', compact('plan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        $profiles = Profile::latest()->get();
        
        return view('admin.plans.edit', compact('plan', 'profiles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Plan $plan, StoreUpdatePlan $request)
    {
        $plan->update($request->except('profile'));

        $profiles = $request->input('profile') ? $request->input('profile') : [];

        $plan->sync($profiles);

        return redirect()->route('plans.index')->with('succes', 'Plano ' . $plan->name . 'editado com sucesso !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        if ($plan->details->count() > 0) {
            return redirect()
                ->back()
                ->with('error', 'O plano ' . $plan->name . ' possui detalhes vinculados. Por favor, desvincule os detalhes primeiro para depois excluir o plano !');
        }

        $plan->delete();

        return redirect()->route('plans.index')->with('success', 'O plano ' . $plan->name . ' foi deletado com sucesso !');
    }
}
