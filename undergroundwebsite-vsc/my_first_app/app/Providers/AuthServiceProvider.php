<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate; // make sure this line is UNcommented
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
        Program::class => ProgramPolicy::class,
        Producer::class => ProducerPolicy::class,
        Show::class => ShowPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        $this->registerPolicies();

        Gate::define('isAdmin',function($user){
            return $user->role == 'admin';
        });

        Gate::define('isEditor',function($user){
            return $user->role == 'editor';
        });

        Gate::define('isUser',function($user){
            return $user->role == 'user';
        });
    }
}
