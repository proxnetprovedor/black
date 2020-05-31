<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tenants;
use App\Models\Address;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TenantRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Auth;

class TenantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenants = Tenants::paginate();
        return view('admin.tenants.index', compact('tenants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tenants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response TenantRequest
     */
    public function store(TenantRequest $request)
    {
        $validated = $request->validated();
        
        // $validator = Validator::make($request, [
        //     'name' => 'bail|required|min:3|max:120',
        //     'cnpj' => 'required|max:11|unique:pessoas',
        //     'email' => 'required|max:150|unique:users',
        // ]);
        
        // if ($validated->fails()) {
        //     dd($validated);
        //     return redirect()->back()->withErrors($validated)->withInput();
        // }
        $user = Auth::user()->id;
        $inputs = $request->all();
        $inputs['created_by'] = $user;
        DB::beginTransaction();
        try {
            $tenant = Tenants::create($inputs);
            $inputs['addressable_type'] = 'App\Models\Tenants';
            $inputs['addressable_id'] = $tenant->id;
            $address = Address::create($inputs);

            DB::commit();
            return \redirect(\route('tenants.index'));
            //return view('admin.tenants.index');
        } catch (\Throwable $th) {
            throw $th;
			DB::rollback();
            //return view('admin.empresas.create', compact('representante'));
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Tenants  $tenants
     * @return \Illuminate\Http\Response
     */
    public function show(Tenants $tenants)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Tenants  $tenants
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tenant = Tenants::find($id);
        //dd($tenant->address()[0]);
        $address  = $tenant->address()[0];
        return view('admin.tenants.edit', compact('tenant', 'address'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Tenants  $tenants
     * @return \Illuminate\Http\Response
     */
    public function update(Tenants $tenant, Request $request)
    {
        //$input = $request->all();
        //$tenant = Tenants::find($input['id']);
        $tenant->update($request->all());
        return redirect(route('tenants.index'));
        //dd($tenant);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Tenants  $tenants
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tenants $tenants)
    {
        //
    }
}
