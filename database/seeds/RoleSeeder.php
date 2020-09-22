<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;
use App\Models\Role;
use Illuminate\Support\Facades\Artisan;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('cache:clear');

        $role = Role::create(['id' => Uuid::uuid4()->toString(), 'name' => 'Administrador']);
        $permissoes = Permission::all()->pluck('id');
        $role->permissions()->sync($permissoes);
    }
}
