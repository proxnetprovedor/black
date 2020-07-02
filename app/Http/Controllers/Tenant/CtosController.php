<?php

namespace App\Http\Controllers\Tenant;

use App\Models\Ctos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Instalation;
use App\Models\Subscription;
use Auth;
use Illuminate\Support\Facades\Gate;

class CtosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('ctos visualizar'), 403);

        $ctos = Ctos::latest()->paginate(15);
        return view('tenant.ctos.index', compact('ctos'));
    }

    public function localizacao()
    {
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
        abort_if(Gate::denies('ctos criar'), 403);

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
        abort_if(Gate::denies('ctos criar'), 403);

        $cto = Ctos::create($request->all());
        return redirect()->route('ctos.index')
            ->with('success', 'CTO ' . $cto->name . 'cadastrado com sucesso !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ctos  $ctos
     * @return \Illuminate\Http\Response
     */
    public function show(Ctos $cto)
    {
        abort_if(Gate::denies('ctos visualizar'), 403);

        //    dd($cto->with(Subscription::all())->with(Instalation::all())->get());
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
        abort_if(Gate::denies('ctos editar'), 403);

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
        abort_if(Gate::denies('ctos editar'), 403);

        $cto->update($request->all());
        return redirect()->route('ctos.index')
            ->with('success', 'CTO ' . $cto->name . ' atualizado com sucesso !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ctos  $ctos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ctos $cto)
    {
        abort_if(Gate::denies('ctos deletar'), 403);
        // dd($cto);
        $cto->instalations()->delete();
        $cto->delete();
        return redirect()->route('ctos.index')
            ->with('success', 'CTO ' . $cto->name . ' excluído com sucesso !');
    }
}
