<?php

namespace App\Providers;

use App\Driver\Auth\XxAdminGuard;
use App\Driver\Auth\XxGuard;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(Gate $gate)
    {
        $this->registerPolicies($gate);
        //
        Auth::extend('xxauth', function ($app, $name, array $config) {
            return new XxGuard($app, $name, Auth::createUserProvider($config['provider']), $config);
        });
        Auth::extend('xxadminauth', function ($app, $name, array $config) {
            return new XxAdminGuard($app, $name, Auth::createUserProvider($config['provider']), $config);
        });
    }
}
