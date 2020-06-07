<?php

namespace App\Http\Controllers\Tenant;

use App\Models\Instalation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class InstalationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $instalations = Instalation::latest()->paginate(15);

        return view('tenant.instalations.index', compact('instalations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tenant.instalations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $instalation = Instalation::create($request->all());
        return redirect()->route('instalations.index')
            ->with('succes', 'Intalação ' . $instalation->ssd . 'cadastrado com sucesso !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instalation  $instalation
     * @return \Illuminate\Http\Response
     */
    public function show(Instalation $instalation)
    {
        return view('tenant.instalations.show', compact('instalation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instalation  $instalation
     * @return \Illuminate\Http\Response
     */
    public function edit(Instalation $instalation)
    {
        return view('tenant.instalations.edit', compact('instalation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Instalation  $instalation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instalation $instalation)
    {
        $instalation->update($request->all());
        return redirect()->route('instalations.index')
            ->with('succes', 'Instalação ' . $instalation->ssid . 'atualizado com sucesso !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instalation  $instalation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instalation $instalation)
    {
        //
    }
}
