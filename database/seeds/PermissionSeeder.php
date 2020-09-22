<?php

use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;
use App\Models\Permission;
use Illuminate\Support\Facades\Artisan;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('cache:clear');

        
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'usuarios visualizar']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'usuarios criar']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'usuarios editar']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'usuarios deletar']);

        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'perfis-de-usuario visualizar']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'perfis-de-usuario criar']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'perfis-de-usuario editar']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'perfis-de-usuario deletar']);

        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'colaboradores visualizar']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'colaboradores criar']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'colaboradores editar']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'colaboradores deletar']);

        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'servidores visualizar']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'servidores criar']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'servidores editar']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'servidores deletar']);

        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'instalacoes visualizar']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'instalacoes criar']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'instalacoes editar']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'instalacoes deletar']);

        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'assinaturas visualizar']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'assinaturas criar']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'assinaturas editar']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'assinaturas deletar']);

        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'ctos visualizar']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'ctos criar']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'ctos editar']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'ctos deletar']);

        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'clientes visualizar']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'clientes criar']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'clientes editar']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'clientes deletar']);

        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'planos-de-internet visualizar']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'planos-de-internet criar']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'planos-de-internet editar']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'planos-de-internet deletar']);
    }
}
