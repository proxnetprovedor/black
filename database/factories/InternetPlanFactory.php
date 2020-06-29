<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
namespace App\Models;

use Faker\Generator as Faker;
use Ramsey\Uuid\Uuid;

$factory->define(InternetPlan::class, function (Faker $faker) {
    $user = User::all()->first()->id;
    $tenant = Tenant::all()->random(1);
    return [
        'id' => Uuid::uuid4()->toString(),
        'name' => $faker->word,
        'is_ppoe' => $faker->randomElement($array = array (false, true)),
        'is_hotpost' => $faker->randomElement($array = array (false, true)),

        'created_by' => $user,
        'tenant_id' => $tenant[0]->id
    ];
});
