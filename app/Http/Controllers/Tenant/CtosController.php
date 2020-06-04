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
        $user = Auth::user();
        $tenant = $user->tenant->first();
        $ctos = $tenant->ctos;
        //dd($ctos);
        return view('tenant.ctos.index', compact('ctos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ctos  $ctos
     * @return \Illuminate\Http\Response
     */
    public function show(Ctos $ctos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ctos  $ctos
     * @return \Illuminate\Http\Response
     */
    public function edit(Ctos $ctos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ctos  $ctos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ctos $ctos)
    {
        //
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
