<?php

use App\Models\Permission;
use App\Models\Plan;
use App\Models\Profile;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $gerente = Profile::create(['id' => Uuid::uuid4()->toString(), 'name' => 'Gerente']);
        $gerentePermissoes = Permission::where('name', 'like', '%gerente%');
        
        $servidores = Profile::create(['id' => Uuid::uuid4()->toString(), 'name' => 'Controle de Servidores']);

        $ctos = Profile::create(['id' => Uuid::uuid4()->toString(), 'name' => 'Controle de CTOs']);

        $colaboradores = Profile::create(['id' => Uuid::uuid4()->toString(), 'name' => 'Controle de Colaboradores']);

        $clientes = Profile::create(['id' => Uuid::uuid4()->toString(), 'name' => 'Controle de Clientes']);


        /**
         * Sync de todas a permissões com o plano mais completo
         */
        $plan = Plan::where('name', 'Businers')->first();

        $profiles = Profile::all()->pluck('id');

        $plan->profiles()->sync($profiles);
    }
}
