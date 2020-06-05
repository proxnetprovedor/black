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
       
        $instalations = Instalation::latest()->get();

        return view('tenant.instalations.index', compact('instalations'));
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
     * @param  \App\Models\Instalation  $instalation
     * @return \Illuminate\Http\Response
     */
    public function show(Instalation $instalation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instalation  $instalation
     * @return \Illuminate\Http\Response
     */
    public function edit(Instalation $instalation)
    {
        //
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
        //
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
