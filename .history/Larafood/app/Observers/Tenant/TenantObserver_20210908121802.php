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
        $this->url = Str::kebab($tenant->name);
    }

    /**
     * Handle the Tenant "updated" event.
     *
     * @param  \App\Models\Models\Tenant  $tenant
     * @return void
     */
    public function updating(Tenant $tenant)
    {
        $this->url = Str::kebab($tenant->name);
    }

    /**
     * Handle the Tenant "deleted" event.
     *
     * @param  \App\Models\Models\Tenant  $tenant
     * @return void
     */
    public function deleted(Tenant $tenant)
    {
        //
    }

    /**
     * Handle the Tenant "restored" event.
     *
     * @param  \App\Models\Models\Tenant  $tenant
     * @return void
     */
    public function restored(Tenant $tenant)
    {
        //
    }

    /**
     * Handle the Tenant "force deleted" event.
     *
     * @param  \App\Models\Models\Tenant  $tenant
     * @return void
     */
    public function forceDeleted(Tenant $tenant)
    {
        //
    }
}
