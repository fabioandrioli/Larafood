<?php

namespace App\Providers;

use App\Models\Plan;
use App\Models\Tenant;
use Illuminate\Support\ServiceProvider;
use App\Observers\Plan\PlanObserver;
use App\Observers\Tenant\TenantObserver;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Plan::observe(PlanObserver::class);
        Tenant::observe(TenantObserver::class);
    }
}
