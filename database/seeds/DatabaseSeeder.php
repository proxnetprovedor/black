<?php

use Illuminate\Database\Seeder;
use App\Models\Tenant;
use App\Models\User;
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
        factory(Tenant::class, 5)->create();
        
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PlanSeeder::class);
        $this->call(UsersSeeder::class);

        factory(App\Models\Employer::class, 50)->create();
        factory(App\Models\InternetPlanServer::class, 50)->create();
        //factory(App\Models\Server::class, 100)->create();

        factory(App\Models\Ctos::class, 100)->create();
        factory(App\Models\AccesPoint::class, 100)->create();
        factory(App\Models\Instalation::class, 100)->create();
        //factory(App\Models\Subscription::class, 100)->create();
        $tenant = Tenant::all()->random(5);
        foreach($tenant as $t) {
            //var_dump($t->id);
            $user = factory(User::class)->create(['tenant_id'=> $t->id]);
            //var_dump($user->id);
            
            // factory(App\Models\UserTenant::class, 1)->create(['user_id'=> $user->id, 'tenant_id'=> $t->id]);
        }
    }
}
