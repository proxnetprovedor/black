<?php

use App\Models\Plan;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'id' => Uuid::uuid4()->toString(),
            'name' => 'Básico',
            'url' => 'basico',
            'price' => 99.99,
            'description' => 'Plano Básico',
        ]);

        Plan::create([
            'id' => Uuid::uuid4()->toString(),
            'name' => 'Padrão',
            'url' => 'padrao',
            'price' => 200.00,
            'description' => 'Plano Padrão',
        ]);

        // Plan::create([
        //     'id' => Uuid::uuid4()->toString(),
        //     'name' => 'Businers',
        //     'url' => 'businers',
        //     'price' => 499.99,
        //     'description' => 'Plano Empresarial',
        // ]);
    }
}
