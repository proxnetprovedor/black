<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
namespace App\Models;

use Faker\Generator as Faker;
use Ramsey\Uuid\Uuid;

$factory->define(Costumer::class, function (Faker $faker, $params) {
    $user = User::all()->first()->id;
    $tenant = Tenant::all()->random(1);
    //$tenant_id = $tenant[0]->id;
    $id = Uuid::uuid4()->toString();
    $person = factory(Person::class)->create(['tenant_id' => $params['tenant_id']]);
    $address = factory(Address::class)->create(['tenant_id' => $params['tenant_id'], 'addressable_id' => $id, 'addressable_type' => 'App\Models\Costumer']);
    //var_dump($person);
    return [
        'id' => $id,
        //'person_id' => $params['person_id'],
        'name' => $faker->name,
        'phone' => $faker->phone,
        'email' => $faker->email,
        'birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'lat' => $faker->latitude($min = 2.72, $max = 2.86),
        'lng' => -($faker->longitude($min = 60.78, $max = 60.65)),

        'person_id' => $person->id,
        'created_by' => $user,
        'tenant_id' => $params['tenant_id']
    ];
});
