<?php

namespace App\Observers\Product;
use App\Models\Product;
class ProductObserver
{
     /**
     * Handle the Product "created" event.
     *
     * @param  \App\Models\Models\Product  $product
     * @return void
     */
    public function creating(Product $product)
    {
        $product->uuid = Str::uuid();
        $product->url = Str::kebab($product->name);
    }

    /**
     * Handle the Product "updated" event.
     *
     * @param  \App\Models\Models\Product  $product
     * @return void
     */
    public function updating(Product $product)
    {
        $product->url = Str::kebab($product->name);
    }
}
