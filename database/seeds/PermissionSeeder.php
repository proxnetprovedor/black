<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

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
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        
        Permission::create(['name' => 'users_manage', 'guard_name'=>'web']);
        Permission::create(['name' => 'users create', 'guard_name'=>'web']);
        Permission::create(['name' => 'users view', 'guard_name'=>'web']);
        Permission::create(['name' => 'users delete', 'guard_name'=>'web']);
        Permission::create(['name' => 'users edit', 'guard_name'=>'web']);
        Permission::create(['name' => 'plans view', 'guard_name'=>'web']);
        Permission::create(['name' => 'plans manage', 'guard_name'=>'web']);
        Permission::create(['name' => 'plans edit', 'guard_name'=>'web']);
        Permission::create(['name' => 'plans delete', 'guard_name'=>'web']);
        Permission::create(['name' => 'plans create', 'guard_name'=>'web']);
    }
}
