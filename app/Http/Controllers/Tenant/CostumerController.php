<?php

namespace App\Http\Controllers\Tenant;

use App\Models\Costumer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\PersonService;
use Carbon\Carbon;
use Carbon\Traits\Date;
use PersonSeeder;

class CostumerController extends Controller
{

    public function formatDate($str)
    {
        $date = str_replace('/', '-', $str);
        return date('Y-m-d', strtotime($date));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $costumers = Costumer::latest()->paginate(15);
        return view('tenant.costumers.index', compact('costumers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tenant.costumers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PersonService $person)
    {
        $attributes = $request->all();

        $person = $person->store($attributes);

        $attributes['birth'] = $this->formatDate($attributes['birth']);
        $attributes['person_id'] = $person->id;
        // dd($attributes['person_id']);
        $costumer = Costumer::create($attributes);
        return redirect(route('costumers.edit', $costumer->id))->with(['success' => 'Cliente registrado com sucesso!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Costumer  $costumer
     * @return \Illuminate\Http\Response
     */
    public function show(Costumer $costumer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Costumer  $costumer
     * @return \Illuminate\Http\Response
     */
    public function edit(Costumer $costumer)
    {
        // dd($costumer->person->address->cep);
        return view('tenant.costumers.edit', compact('costumer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Costumer  $costumer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Costumer $costumer, PersonService $person)
    {
        $attributes = $request->all();

        $attributes['birth'] = $this->formatDate($attributes['birth']);
        $costumer->update($attributes);
        $person->update($costumer->person, $attributes);

        return redirect()->back()->with(['success' => 'Cliente atualizado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Costumer  $costumer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Costumer $costumer)
    {
        $costumer->person->address->delete();
        $costumer->person->delete();
        $costumer->delete();
        //    dd($costumer->person->address);
        return redirect(route('costumers.index'))->with(['success' => 'Cliente excluído com sucesso']);
    }
}
