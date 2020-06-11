<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Plan;
use Faker\Generator as Faker;
use Ramsey\Uuid\Uuid;

$factory->define(Plan::class, function (Faker $faker) {
    $id = Uuid::uuid4()->toString();
    return [
        'id' => $id,
        'name' => $faker->word, 
        'url' => $id,
        'price' => 100.00, 
    ];
});
