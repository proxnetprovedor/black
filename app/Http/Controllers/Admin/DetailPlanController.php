<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUpdateDetailPlan;
use App\Http\Controllers\Controller;
use App\Models\DetailPlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class DetailPlanController extends Controller
{
    protected $repository, $plan;

    public function __construct(DetailPlan $detailPlan, Plan $plan)
    {
        $this->repository = $detailPlan;
        $this->plan = $plan;
    }

    public function index($urlPlan)
    {
        if (!$plan = $this->plan->where('url', $urlPlan)->first()) {
            return redirect()->back();
        }

        // $details = $plan->details();
        $details = $plan->details()->paginate();

        return view('admin.plans.details.index', [
            'plan' => $plan,
            'details' => $details,
        ]);
    }

    public function create($urlPlan)
    {
        if (!$plan = $this->plan->where('url', $urlPlan)->first()) {
            return redirect()->back();
        }

        return view('admin.plans.details.create', [
            'plan' => $plan,
        ]);
    }

    public function store(StoreUpdateDetailPlan $request, $urlPlan)
    {
        if (!$plan = $this->plan->where('url', $urlPlan)->first()) {
            return redirect()->back();
        }

        // $data = $request->all();
        // $data['plan_id'] = $plan->id;
        // $this->repository->create($data);
        $detail = $plan->details()->create($request->all());

        return redirect()->route('details.plan.index', $plan->url)->with('success', 'Detalhe ' .$detail->name. ' criado com sucesso !');
    }


    public function edit($urlPlan, $idDetail)
    {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($idDetail);

        if (!$plan || !$detail) {
            return redirect()->back();
        }

        return view('admin.plans.details.edit', [
            'plan' => $plan,
            'detail' => $detail,
        ]);
    }

    public function update(StoreUpdateDetailPlan $request, $urlPlan, $idDetail)
    {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($idDetail);

        if (!$plan || !$detail) {
            return redirect()->back();
        }

        $detail->update($request->all());

        return redirect()->route('details.plan.index', $plan->url)->with('success', 'Detalhe ' . $detail->name . ' editado com sucesso !');
    }

    public function show($urlPlan, $idDetail)
    {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($idDetail);

        if (!$plan || !$detail) {
            return redirect()->back();
        }

        return view('admin.plans.details.show', [
            'plan' => $plan,
            'detail' => $detail,
        ]);
    }


    public function destroy($urlPlan, $idDetail)
    {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($idDetail);

        if (!$plan || !$detail) {
            return redirect()->back();
        }

        $detail->delete();

        return redirect()
                    ->route('details.plan.index', $plan->url)
                    ->with('success', 'Registro ' .$detail->name. ' detalado com sucesso');
    }
}
