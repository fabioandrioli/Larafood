<?php

namespace App\Providers;

use App\Models\Plan;
use Illuminate\Support\ServiceProvider;
use App\Observers\Plan\PlanObserver;
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
    }
}
