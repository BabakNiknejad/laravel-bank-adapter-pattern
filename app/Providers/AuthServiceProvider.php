<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Repositories\Auth\UserRepository;
use App\Repositories\Auth\UserRepositoryInterface;
use App\Services\Auth\AuthenticationService;
use App\Services\Auth\AuthenticationServiceInterface;
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
        //
    }

    public function register()
    {
        $this->app->bind(AuthenticationServiceInterface::class , AuthenticationService::class);
       $this->app->bind(UserRepositoryInterface::class , UserRepository::class);
    }
}
