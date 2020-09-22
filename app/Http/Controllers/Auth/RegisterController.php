<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Services\TenantService;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/tenant/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make(
            $data,
            [
                'name' => ['required', 'string', 'min:3', 'max:255'],
                'email' => ['required', 'string', 'email', 'min:3', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:6', 'max:16', 'confirmed'],
                'empresa' => ['required', 'unique:pgsql.providers.tenants,name', 'string', 'min:3', 'max:255',],
                'cnpj' => ['required', 'unique:pgsql.providers.tenants', 'numeric', 'digits:14', 'cnpj'],
            ],
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $plan = session('plan');

        if (!$plan) {
            redirect()->route('site.home');
        }

        if (is_null($plan)) {
            redirect()->route('site.home');
        }

        $tenantService = app(TenantService::class);

        $user = DB::transaction(function () use ($tenantService, $plan, $data) {
            return  $tenantService->make($plan, $data);
        });


        return $user;
    }
}
