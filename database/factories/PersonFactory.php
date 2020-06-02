<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
namespace App\Models;

//use App\Models\Person;
use Faker\Generator as Faker;
use Ramsey\Uuid\Uuid;

$factory->define(Person::class, function (Faker $faker, $params) {
    $user = User::all()->first()->id;
    //$tenant = Tenant::all()->random(1);
    return [
        'id' => Uuid::uuid4()->toString(),
        
        'cpf_cnpj' => $faker->cpf(false),
        'documento' => $faker->rg(false),
        'insc_estadual' => $faker->rg(false), 
        'insc_municipal' => $faker->rg(false),
        'created_by' => $user,
        'tenant_id' => $params['tenant_id']
    ];
});
