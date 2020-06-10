<?php

namespace App\Providers;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        if ($this->app->runningInConsole()) return;

        $permissions = Permission::all();

        /**
         * Registra todas as permissões
         */
        foreach ($permissions as $permission) {
            Gate::define($permission->name, function (User $user) use ($permission) {
                return $user->hasPermission($permission->name);
            });
        }

        /**
         * Verifica se o usuário é dono do registro 
         */
        Gate::define('owner', function (User $user, $object) {
            return $user->id === $object->user_id;
        });

        /**
         * Define um gate de superAdmin
         */
        Gate::define('isSuperAdmin', function (User $user) {
            if ($user->isAdmin()) {
                return true;
            }
        });

        /**
         * Antes de definir as permissões acima, checa se o user é superAdmin
         */
        Gate::before(function (User $user) {
            if ($user->isAdmin()) {
                return true;
            }
        });
    }
}
