<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
namespace App\Models;

use Faker\Generator as Faker;
use Ramsey\Uuid\Uuid;

$factory->define(Subscription::class, function (Faker $faker) {
    $user = User::all()->first()->id;
    $tenant = Tenant::all()->random(1);
    $person = factory(Person::class)->create(['tenant_id' => $tenant[0]->id]);
    $costumer = factory(Costumer::class)->create(['tenant_id' => $tenant[0]->id, 'person_id' => $person->id]);
    $contract = factory(Contract::class)->create(['tenant_id' => $tenant[0]->id, 'person_id' => $person->id]);
    $id = Uuid::uuid4()->toString();
    $address = factory(Address::class)->create(['tenant_id' =>  $tenant[0]->id, 'addressable_id' => $id, 'addressable_type' => 'App\Models\Subscription']);
    //$instation = factory(Instalation::class)->create(['tenant_id' => $tenant[0]->id]);
    //dd($instation->id);
    //$costumer = factory(Costumer::class)->create(['tenant_id' => $tenant[0]->id, 'person_id' => $person->id]);
    return [
        'id' => $id,
        //'person_id' => $person->id,
        'created_by' => $user,
        'tenant_id' => $tenant[0]->id,
        'auto_block' => true,
        'costumer_id' => $costumer->id,
        'contract_id' => $contract->id,
        //'instalation_id' => $instation->id,
        // 'pay_day' = ,
        // 'pay_discount',
        // 'pay_exta',
        // 'has_to_pay'
        // 'days_to_block'
        // 'auth_type',
        // 'login',
        // 'password', 
        // 'ip_address',
        // 'mac_address',
        
        
        // 'server_id'
        
        // 'employee_id'
        
        // 'internet_plan_id'
        
        
        // 'address_charge_id'
    ];
});
