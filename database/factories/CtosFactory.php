<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
namespace App\Models;

use Faker\Generator as Faker;
use Ramsey\Uuid\Uuid;

$factory->define(Ctos::class, function (Faker $faker) {
    $user = User::all()->first()->id;
    $tenant = Tenant::all()->random(1);
    return [
        'id' => Uuid::uuid4()->toString(),
        'name' => $faker->word,
        'number' => $faker->randomNumber($nbDigits = 9, $strict = false),
        'capacity' => $faker->numberBetween($min = 1, $max = 9000),
        'lat' => $faker->latitude($min = 2.72, $max = 2.86),
        'lng' => -($faker->longitude($min = 60.78, $max = 60.65)),
        'created_by' => $user,
        'tenant_id' => $tenant[0]->id
    ];
});
