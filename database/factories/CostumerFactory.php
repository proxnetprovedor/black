<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
namespace App\Models;

use Faker\Generator as Faker;
use Ramsey\Uuid\Uuid;

$factory->define(Costumer::class, function (Faker $faker, $params) {
    $user = User::all()->first()->id;
    //$tenant = Tenant::all()->random(1);
    $id = Uuid::uuid4()->toString();
    $address = factory(Address::class)->create(['tenant_id' => $params['tenant_id'], 'addressable_id' => $id, 'addressable_type' => 'App\Models\Costumer']);
    return [
        'id' => $id,
        'person_id' => $params['person_id'],
        'name' => $faker->name,
        'phone' => $faker->phone,
        'email' => $faker->email,
        'birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'created_by' => $user,
        'tenant_id' => $params['tenant_id']
    ];
});
