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

        
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'users manage']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'users create']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'users view']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'users delete']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'users edit']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'plans view']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'plans manage']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'plans edit']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'plans delete']);
        Permission::create(['id' => Uuid::uuid4()->toString(), 'name' => 'plans create']);
    }
}
