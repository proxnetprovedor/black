<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UserTenant;
use Faker\Generator as Faker;

$factory->define(UserTenant::class, function (Faker $faker, $params) {
    return [
        'user_id' => $params['user_id'],
        'tenant_id' => $params['tenant_id']
    ];
});
