<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
namespace App\Models;

//use App\Models\Employer;
use Faker\Generator as Faker;
use Ramsey\Uuid\Uuid;

$factory->define(Employer::class, function (Faker $faker) {
    $user = User::all()->first()->id;
    $tenant = Tenants::all()->random(1);
    //dd($tenant[0]->id);
    $tenant_id = $tenant[0]->id;
    //dd($tenant_id);
    $person = factory(Person::class)->create(['tenant_id' => $tenant_id]);
    //dd($person);
    $id = Uuid::uuid4()->toString();
    $address = factory(Address::class)->create(['tenant_id' =>  $tenant_id, 'addressable_id' => $id, 'addressable_type' => 'App\Models\Employer']);
    return [
        'id' => $id,
        'name' => $faker->name,
        'function' => $faker->randomElement($array = array ('Administrativo', 'Tec. Informática', 'Analista de Sistemas', 'Gerente')),
        'working_hours' => 8,
        'salary' => 1200.00,
        //'plan_id',
        'person_id' => $person->id,
        'user_id' => $user,


        'created_by' => $user,
        'tenant_id' => $tenant_id,
    ];
});
