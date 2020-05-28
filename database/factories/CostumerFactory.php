<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
namespace App\Models;

use Faker\Generator as Faker;
use Ramsey\Uuid\Uuid;

$factory->define(Costumer::class, function (Faker $faker, $params) {
    $user = User::all()->first()->id;
    //$tenant = Tenants::all()->random(1);
    //$person = factory(Person::class)->create(['tenant_id' => $params['tenant_id']]);
    return [
        'id' => Uuid::uuid4()->toString(),
        'person_id' => $params['person_id'],
        'name' => $faker->name,
        'phone' => $faker->phone,
        'email' => $faker->email,
        'birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'created_by' => $user,
        'tenant_id' => $params['tenant_id']
    ];
});
