<?php

namespace App\Observers\Product;
use App\Models\Product;
use Illuminate\Support\Str;
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
        $product->flag = Str::kebab($product->title);
    }

    /**
     * Handle the Product "updated" event.
     *
     * @param  \App\Models\Models\Product  $product
     * @return void
     */
    public function updating(Product $product)
    {
        $product->flag = Str::kebab($product->title);
    }
}
