<?php

namespace App\Observers\Tenant;

use App\Models\Tenant;
use Illuminate\Support\Str;

class TenantObserver
{

    /**
     * Handle the Tenant "created" event.
     *
     * @param  \App\Models\Models\Tenant  $tenant
     * @return void
     */
    public function creating(Tenant $tenant)
    {
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
