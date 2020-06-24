<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateEmployeeRequest;
use App\Models\Employee;
use App\Models\User;
use App\Services\PersonService;
use App\Tenant\ManagerTenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::latest()->paginate();

        return view('tenant.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tenant.employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateEmployeeRequest $request)
    {
        $personService = app(PersonService::class);

        $employee = DB::transaction(function () use ($request, $personService) {
            $person = $personService->store($request->all());

            $user = $this->storeUser($request->all());

            $request->request->add(['person_id' => $person->id, 'user_id' => $user->id]);

           return Employee::create($request->all());

        });


        return redirect()->route('employees.index')->with('success', 'Colaborador  '.$employee->name.' cadastrado com sucesso !');
    }

    /**
     * Cadastra o usuário da provedora
     */
    public function storeUser($attributes)
    {   
        $tenant = app(ManagerTenant::class)->getTenant();

        return $tenant->users()->create([
            'name' =>  $attributes['name'],
            'email' =>  $attributes['email'],
            'password' => Hash::make($attributes['password']),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        // dd($employee->user);

        return view('tenant.employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
