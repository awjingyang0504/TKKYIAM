<?php

namespace App\Providers;
 
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //Team::class => TeamPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('ManageandActivity', function (User $user) {
            return $user->role_id == 1;
        });

        Gate::define('RegisterCompetition', function (User $user) {
            return ($user->role_id == 2 || $user->role_id == 3);
        });
    }
}
