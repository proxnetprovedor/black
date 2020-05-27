<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
namespace App\Models;

use Faker\Generator as Faker;
use Ramsey\Uuid\Uuid;

$factory->define(InternetPlanServer::class, function (Faker $faker) {
    $user = User::all()->first()->id;
    $plan = factory(InternetPlan::class)->create();
    $server = factory(Server::class)->create();
    return [
        'id' => Uuid::uuid4()->toString(),
        'server_id' => $server->id, 
        'internet_plan_id' => $plan->id,
        //'created_by' => $user,
    ];
});
