<?php

use App\Models\Instalation;
use Illuminate\Database\Seeder;

class InstalationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Instalation::class,1)->create();
    }
}
