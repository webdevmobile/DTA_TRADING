<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Admin;
use App\Models\Personal;
use App\Models\Trade;
use App\Models\Session;
use App\Models\Training;
use App\models\User;
use App\Policies\AdminPolicy;
use App\Policies\PersonalPolicy;
use App\Policies\TradePolicy;
use App\Policies\SessionPolicy;
use App\Policies\TrainingPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Training::class => TrainingPolicy::class,
        Trade::class => TradePolicy::class,
        Session::class => SessionPolicy::class,
        Admin::class => AdminPolicy::class,
        User::class => UserPolicy::class,
        Personal::class => PersonalPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
