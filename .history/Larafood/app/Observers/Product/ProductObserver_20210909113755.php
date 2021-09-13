<?php

namespace App\Observers\Product;
use App\Models\Product;
class ProductObserver
{
     /**
     * Handle the Tenant "created" event.
     *
     * @param  \App\Models\Models\Tenant  $tenant
     * @return void
     */
    public function creating(Tenant $tenant)
    {
        $tenant->uuid = Str::uuid();
        $tenant->url = Str::kebab($tenant->name);
    }

    /**
     * Handle the Tenant "updated" event.
     *
     * @param  \App\Models\Models\Tenant  $tenant
     * @return void
     */
    public function updating(Tenant $tenant)
    {
        $tenant->url = Str::kebab($tenant->name);
    }
}
