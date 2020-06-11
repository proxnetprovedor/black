<?php

use App\Models\Plan;
use Illuminate\Database\Seeder;
use App\Models\Tenant;
use App\Models\User;
use Ramsey\Uuid\Uuid;

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
      

        

        factory(Plan::class)->create(
            [
                'id' => Uuid::uuid4()->toString(),
                'name' => 'Businers',
                'url' => 'businers',
                'price' => 499.99,
                'description' => 'Plano Empresarial',
            ]
        )->each(function (App\Models\Plan $plan) {
            factory(Tenant::class, 3)->create(['plan_id' => $plan->id])
                ->each(function (App\Models\Tenant $tenant) {
                    factory(User::class, 50)->create(['tenant_id' => $tenant->id]);
                    factory(App\Models\Employer::class, 50)->create(['tenant_id' => $tenant->id]);
                    //factory(App\Models\InternetPlanServer::class, 50)->create();
                    factory(App\Models\Server::class, 100)->create(['tenant_id' => $tenant->id]);
                    factory(App\Models\InternetPlan::class, 100)->create(['tenant_id' => $tenant->id]);

                    factory(App\Models\Ctos::class, 100)->create(['tenant_id' => $tenant->id]);
                    factory(App\Models\AccesPoint::class, 100)->create(['tenant_id' => $tenant->id]);
                    factory(App\Models\Instalation::class, 100)->create(['tenant_id' => $tenant->id]);
                });
        });


        $this->call(UsersSeeder::class);
        $this->call(PlanSeeder::class);
        $this->call(ProfileSeeder::class);


    }
}
