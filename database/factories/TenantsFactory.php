<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
namespace App\Models;

//use App\Models\Tenants;
use Faker\Generator as Faker;
use Ramsey\Uuid\Uuid;

$factory->define(Tenants::class, function (Faker $faker) {
    $user = User::all()->first()->id;
    $id = Uuid::uuid4()->toString();
    var_dump($id);
    $address = factory(Address::class)->create(['addressable_id' => $id, 'tenant_id' =>  null, 'addressable_type' => 'App\Models\Tenants']);
    return [
        'id' => $id,
        'name' => $faker->company,
        'cnpj' => $faker->cnpj(false),
        'url' => $faker->url,
        'email' => $faker->email,
        'logo' => 'https://images.vexels.com/media/users/3/142887/isolated/preview/fc58c5ffb8c2e33fc3e15a2453189825-logotipo-da-empresa-de-log--stica-crescente-by-vexels.png',
        'active' => true,
        'subscription_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'expires_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'subscription_active' => true,
        'subscription_suspende' => false,
        'lat' => $faker->latitude($min = 2.72, $max = 2.86),
        'lng' => -($faker->longitude($min = 60.78, $max = 60.65)),
        'created_by' => $user,
    ];
});
