<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
namespace App\Models;

use Faker\Generator as Faker;
use Ramsey\Uuid\Uuid;

$factory->define(Address::class, function (Faker $faker, $params) {
    // $user = User::all()->first()->id;
    if($params['addressable_type'] == 'App\Models\Tenant') {
       // var_dump($params['addressable_id']);
    }
    return [
        'id' => Uuid::uuid4()->toString(),
        'lat' => $faker->latitude($min = 2.72, $max = 2.86),
        'lng' => -($faker->longitude($min = 60.78, $max = 60.65)),
        'cep' => $faker->postcode(false),
        'neighborthood' => $faker->citySuffix,
        'address' => $faker->streetName,
        'number' => $faker->buildingNumber,
        'state'  => 'RR',
        'city' => 'Boa Vista',
        'condominium' => $faker->buildingNumber,
        'block' => $faker->buildingNumber,
        'apartment' => $faker->buildingNumber,
        'addressable_id' => $params['addressable_id'],
        'addressable_type'  => $params['addressable_type'],
        // 'created_by' => factory(User::class)->create()->id,
        'tenant_id' => $params['tenant_id']
    ];
});
