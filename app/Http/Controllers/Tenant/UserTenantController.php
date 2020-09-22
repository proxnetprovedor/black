<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserTenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserTenantController extends Controller
{
    
    public function changePassword (User $user, Request $request)
    {
        $validator = Validator::make(
            [
                'password' => $request->input('password'),
                'password_confirmation' =>  $request->input('password_confirmation')
            ],
            [
                'password' => ['required', 'min:8', 'max:16', 'confirmed'],
                'password_confirmation' => ['required', 'min:8', 'max:16']
            ],
           [
               'password.required' => 'Informe a senha',
               'password.min' => 'A senha deve ter ao menos 8 caracteres',
               'password.max' => 'A senha deve ter no máximo 16 caracteres',
               'password.confirmed' => 'As senhas devem ser iguais',
               'password_confirmation.required' => 'Repita a senha aqui',
           ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $user->update(['password' => Hash::make($request->input('password'))]);

        return redirect()->back()->with('success', 'Senha atualizada com sucesso !');
      
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\UserTenant  $userTenant
     * @return \Illuminate\Http\Response
     */
    public function show(UserTenant $userTenant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserTenant  $userTenant
     * @return \Illuminate\Http\Response
     */
    public function edit(UserTenant $userTenant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserTenant  $userTenant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserTenant $userTenant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserTenant  $userTenant
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserTenant $userTenant)
    {
        //
    }
}
