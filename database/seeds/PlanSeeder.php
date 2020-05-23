<?php

use App\Models\Plan;
use Illuminate\Database\Seeder;

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
            'name' => 'Default',
            'url' => 'defaults',
            'price' => 99.99,
            'description' => 'Plano Básico',
        ]);
        Plan::create([
            'name' => 'Standard',
            'url' => 'standard',
            'price' => 200.00,
            'description' => 'Plano Padrão',
        ]);
        Plan::create([
            'name' => 'Businers',
            'url' => 'businers',
            'price' => 499.99,
            'description' => 'Plano Empresarial',
        ]);
    }
}
