<?php

use Illuminate\Database\Seeder;
use App\Models\Tenants;
//use App\Models\Employer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PlanSeeder::class);
        $this->call(UsersSeeder::class);
        factory(Tenants::class, 5)->create();
        factory(App\Models\Employer::class, 50)->create();
        factory(App\Models\InternetPlanServer::class, 50)->create();
        //factory(App\Models\Server::class, 100)->create();

        factory(App\Models\Ctos::class, 100)->create();
        factory(App\Models\AccesPoint::class, 100)->create();
        factory(App\Models\Instalation::class, 100)->create();
        factory(App\Models\Subscription::class, 100)->create();
        
        
    }
}
