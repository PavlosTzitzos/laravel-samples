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
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Check if current user is admin
        Gate::define('isAdmin', function($user){
            return $user->role == 'admin';
        });
        // Check if current user is editor
        Gate::define('isEditor', function($user){
            return $user->role == 'editor';
        });
        // Check if current user is user
        Gate::define('isUser', function($user){
            return $user->role == 'user';
        });
    }
}
