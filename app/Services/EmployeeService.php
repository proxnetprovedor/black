<?php

namespace App\Services;

use App\Models\Employee;
use App\Tenant\ManagerTenant;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| EmployeeService
|--------------------------------------------------------------------------
|
| Classe responsável por persistir, relacionar e retorna as entidades
| correspondentes a Employee    
|
*/


class EmployeeService
{
    /**
     * Persiste um Colaborador
     */
    public function store($attributes)
    {
        $personService = app(PersonService::class);

        $person = $personService->store($attributes);

        $user = $this->storeUser($attributes);

        $attributes['person_id'] = $person->id;

        $attributes['user_id'] = $user->id;

        return Employee::create($attributes);
    }

    /**
     * Atualiza as informações de um colaborador
     */
    public function update(Employee $employee, $attributes)
    {
        $personService = app(PersonService::class);

        $personService->update($employee->person, $attributes);

        $employee->update($attributes);

        $employee->save();

        return $employee;
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
}
