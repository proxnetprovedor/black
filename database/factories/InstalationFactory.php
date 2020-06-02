<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
namespace App\Models;

use Faker\Generator as Faker;
use Ramsey\Uuid\Uuid;

$factory->define(Instalation::class, function (Faker $faker) {
    $user = User::all()->first()->id;
    $tenant = Tenant::all()->random(1);
    $accesPoint = AccesPoint::all()->random(1);
    $cto = Ctos::all()->random(1);
    return [
        'id' => Uuid::uuid4()->toString(),
        'ssid' => $faker->userName,
        'password' => $faker->password,
        'radio_ip' => $faker->localIpv4,
        'onu_olt_model' => $faker->domainWord,
        'onu_serial' => $faker->macAddress,
        'onu_ip' => $faker->ipv4,
        'onu_mac' => $faker->macAddress,
        'caixa_switch' => $faker->userName,
        'switch_porta' => 8000,
        'pppoe_port' => 5151,
        'access_point_id' => $accesPoint[0]->id,
        'cto_id' => $cto[0]->id,
        'created_by' => $user,
        'tenant_id' => $tenant[0]->id
    ];
});