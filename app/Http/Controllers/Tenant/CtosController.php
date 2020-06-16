<?php

namespace App\Http\Controllers\Tenant;

use App\Models\Ctos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class CtosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $ctos = Ctos::latest()->paginate(15);
        return view('tenant.ctos.index', compact('ctos'));
    }

    public function localizacao() {
        $ctos = Ctos::all();
        return response()->json([
            'data' => $ctos,
            'message' => 'creditos'
            ], 200);
        //return response()->json($ctos, 200, $headers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tenant.ctos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cto = Ctos::create($request->all());
        return redirect()->route('ctos.index')
            ->with('succes', 'CTO ' . $cto->name . 'cadastrado com sucesso !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ctos  $ctos
     * @return \Illuminate\Http\Response
     */
    public function show(Ctos $cto)
    {
        dd($cto->instalations);
        return view('tenant.ctos.show', compact('cto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ctos  $ctos
     * @return \Illuminate\Http\Response
     */
    public function edit(Ctos $cto)
    {
        return view('tenant.ctos.edit', compact('cto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ctos  $ctos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ctos $cto)
    {
        $cto->update($request->all());
        return redirect()->route('ctos.index')
            ->with('succes', 'CTO ' . $cto->name . 'atualizado com sucesso !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ctos  $ctos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ctos $ctos)
    {
        //
    }
}
