<?php

namespace App\Http\Controllers\Tenant;

use App\Models\Costumer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCostumer;
use App\Services\PersonService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage as FacadesStorage;

class CostumerController extends Controller
{

    public function index()
    {
        abort_if(Gate::denies('clientes visualizar'), 403);

        $costumers = Costumer::latest()->paginate(15);
        return view('tenant.costumers.index', compact('costumers'));
    }


    public function create()
    {
        abort_if(Gate::denies('clientes criar'), 403);

        return view('tenant.costumers.create');
    }

    public function store(StoreUpdateCostumer $request, PersonService $person)
    {
        abort_if(Gate::denies('clientes criar'), 403);

        $attributes = $request->all();
        $path = '';

        if (isset($attributes['img'])) {
            $path = $request->file('img')->store('costumers');
            $attributes['img'] = $path;
        }

        if( empty($request->img)) $attributes = $request->except('img');
            

        $person = $person->store($attributes);

        $attributes['birth'] = Carbon::make($request->birth)->format('Y-m-d');
        $attributes['person_id'] = $person->id;
        $costumer = Costumer::create($attributes);
        return redirect(route('costumers.edit', $costumer->id))->with(['success' => 'Cliente registrado com sucesso!']);
    }


    public function edit(Costumer $costumer)
    {
        abort_if(Gate::denies('clientes editar'), 403);

        return view('tenant.costumers.edit', compact('costumer'));
    }


    public function update(StoreUpdateCostumer $request, Costumer $costumer, PersonService $person)
    {
        abort_if(Gate::denies('clientes editar'), 403);

        $attributes = $request->all();
        $path = '';

        if (isset($attributes['img'])) {
            FacadesStorage::delete($costumer->img);

            $path = $request->file('img')->store('costumers');
            $attributes['img'] = $path;
        }
        if (empty($request->img)) $attributes = $request->except('img');
           
        $attributes['birth'] = Carbon::make($request->birth)->format('Y-m-d');
        $costumer->update($attributes);
        $person->update($costumer->person, $attributes);

        return redirect()->back()->with(['success' => 'Cliente atualizado com sucesso']);
    }


    public function destroy(Costumer $costumer)
    {
        abort_if(Gate::denies('clientes deletar'), 403);

        if (isset($costumer->img)) {
            FacadesStorage::delete($costumer->img);
        }
        $costumer->person->address->delete();
        $costumer->person->delete();
        $costumer->delete();
        return redirect(route('costumers.index'))->with(['success' => 'Cliente excluído com sucesso']);
    }
}
