<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
         'App\Models\User' => 'App\Policies\UserPolicy',
         'App\Models\Product' => 'App\Policies\admin\ProductPolicy',
         'App\Models\Contact' => 'App\Policies\admin\ContactPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *z
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
