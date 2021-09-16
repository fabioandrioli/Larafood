<?php

namespace App\Providers;
use Laravel\Sanctum\Sanctum;
use App\Models\Plan;
use App\Models\Tenant;
use App\Models\Category;
use App\Models\Product;
use App\Models\Table;
use App\Models\Client;
use App\Models\Order;
use App\Models\Evaluation;

use Illuminate\Support\ServiceProvider;
use App\Observers\Plan\PlanObserver;
use App\Observers\Tenant\TenantObserver;
use App\Observers\Category\CategoryObserver;
use App\Observers\Product\ProductObserver;
use App\Observers\Table\TableObserver;
use App\Observers\Client\ClientObserver;
use App\Observers\Evaluation\EvaluationObserver;





class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       
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

        //API
        Client::observe(ClientObserver::class);
        Order::observe(OrderObserver::class);
        Evaluation::observe(EvaluationObserver::class);
    }
}
