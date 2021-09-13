<?php

namespace App\Providers;

use App\Models\Plan;
use App\Models\Tenant;
use App\Models\Category;
use App\Models\Product;
use App\Models\Table;
use Illuminate\Support\ServiceProvider;
use App\Observers\Plan\PlanObserver;
use App\Observers\Tenant\TenantObserver;
use App\Observers\Category\CategoryObserver;
use App\Observers\Product\ProductObserver;
use App\Observers\Table\TableObserver;


use App\Repositories\{
    TenantRepository,
};

use App\Repositories\Category\{
    TenantRepositoryInterface,
};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //bind significa "ligar"
        $this->app->bind(
            TenantRepositoryInterface::class,
        );
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
        Category::observe(CategoryObserver::class);
        Product::observe(ProductObserver::class);
        Table::observe(TableObserver::class);
    }
}
