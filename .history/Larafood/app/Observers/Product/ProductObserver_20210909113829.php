<?php

namespace App\Observers\Product;
use App\Models\Product;
class ProductObserver
{
     /**
     * Handle the Tenant "created" event.
     *
     * @param  \App\Models\Models\Tenant  $product
     * @return void
     */
    public function creating(Product $product)
    {
        $product->uuid = Str::uuid();
        $product->url = Str::kebab($product->name);
    }

    /**
     * Handle the Tenant "updated" event.
     *
     * @param  \App\Models\Models\Tenant  $product
     * @return void
     */
    public function updating(Tenant $product)
    {
        $product->url = Str::kebab($product->name);
    }
}
