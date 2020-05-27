<?php

use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;
use App\Models\Permission;

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

        
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'users_manage', 'guard_name' => 'web']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'users create', 'guard_name' => 'web']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'users view', 'guard_name' => 'web']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'users delete', 'guard_name' => 'web']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'users edit', 'guard_name' => 'web']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'plans view', 'guard_name' => 'web']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'plans manage', 'guard_name' => 'web']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'plans edit', 'guard_name' => 'web']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'plans delete', 'guard_name' => 'web']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'plans create', 'guard_name' => 'web']);
    }
}
