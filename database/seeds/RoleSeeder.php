<?php

use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;
use App\Models\Role;

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

        $role = Role::create(['id' => Uuid::uuid4()->toString(), 'name' => 'administrator', 'guard_name'=>'web']);
        $role->givePermissionTo('users_manage');
    }
}
