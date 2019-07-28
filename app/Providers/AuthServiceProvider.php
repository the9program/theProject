<?php

namespace App\Providers;

use App\Availability;
use App\Doctor;
use App\Policies\Appointment\AvailabilityPolicy;
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
        Doctor::class => DoctorPolicy::class,
        Availability::class => AvailabilityPolicy::class
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
