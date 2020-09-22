<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
// namespace App\Models;

use App\Models\Address;
use App\Models\Plan;
use App\Models\Tenant;
use App\Models\InternetPlan;
use App\Models\Server;
use Faker\Generator as Faker;
use Ramsey\Uuid\Uuid;

$factory->define(Tenant::class, function (Faker $faker) {
    $plans = Plan::all()->pluck('id');
    $id = Uuid::uuid4()->toString();
    //var_dump($id);
    $address = factory(Address::class)->create(['addressable_id' => $id, 'tenant_id' =>  null, 'addressable_type' => 'App\Models\Tenant']);
    //$userTenant = factory(User::class)->create();
    //$tenantUser = factory(UserTenant::class)->create(['user_id'=> $userTenant->id, 'tenant_id'=>$id]);
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
        // 'created_by' => $user,
        'plan_id' => $faker->randomElement($plans)
    ];
});
