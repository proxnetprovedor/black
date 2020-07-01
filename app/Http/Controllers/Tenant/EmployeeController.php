<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateEmployeeRequest;
use App\Models\Employee;
use App\Models\User;
use App\Services\EmployeeService;
use App\Services\PersonService;
use App\Tenant\ManagerTenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
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
        abort_if(Gate::denies('colaboradores visualizar'), 403);

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
        abort_if(Gate::denies('colaboradores criar'), 403);

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
        abort_if(Gate::denies('colaboradores criar'), 403);

        $employee = DB::transaction(function () use ($request) {

            $employeeService = app(EmployeeService::class);

            return $employeeService->store($request->all());
        });


        return redirect()->route('employees.index')->with('success', 'Colaborador  ' . $employee->name . ' cadastrado com sucesso !');
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
        abort_if(Gate::denies('colaboradores editar'), 403);

        return view('tenant.employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateEmployeeRequest $request, Employee $employee)
    {
        abort_if(Gate::denies('colaboradores editar'), 403);

        $employee = DB::transaction(function () use ($employee, $request) {

            $employeeService = app(EmployeeService::class);

            return $employeeService->update($employee, $request->all());
        });

        return redirect()->route('employees.edit', $employee)->with('success', 'Colaborador ' . $employee->name . ' editado com sucesso !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        abort_if(Gate::denies('colaboradores deletar'), 403);

        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Colaborador  ' . $employee->name . ' removido com sucesso !');
    }
}
