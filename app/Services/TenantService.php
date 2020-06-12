<?php

namespace App\Services;

use App\Models\Plan;
use Illuminate\Support\Facades\Hash;

/*
 |  Implementa os recuros para o formulário de registro de um provedor
 |
 |
 */

class TenantService
{
    private $plan, $data;

    public function make(Plan $plan, array $data)
    {
        $this->plan = $plan;

        $this->data = $data;

        $tenant = $this->storeTenant();

        $user = $this->storeUser($tenant);

        return $user;
    }

    /**
     * Cadastra o provedor para um teste de 7 dias
     */
    public function storeTenant()
    {
        $data = $this->data;

        return  $this->plan->tenants()->create([
            'cnpj' => $data['cnpj'],
            'name' => $data['empresa'],
            'email' => $data['email'],
            'subscription_date' => now(),
            'expires_at' => now()->addDays(7),
        ]);
    }

    /**
     * Cadastra o usuário da provedora
     */
    public function storeUser($tenant)
    {
        $data = $this->data;

        return $tenant->users()->create([
            'name' =>  $data['name'],
            'email' =>  $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
