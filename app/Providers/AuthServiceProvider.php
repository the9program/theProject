<?php

namespace App\Providers;

use App\Doctor;
use App\Policies\DoctorPolicy;
use App\Policies\TokenPolicy;
use App\Token;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Token::class =>TokenPolicy::class,
        Doctor::class => DoctorPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
