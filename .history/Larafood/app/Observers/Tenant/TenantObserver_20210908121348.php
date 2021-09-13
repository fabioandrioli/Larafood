<?php

namespace App\Observers\Tenant;

use App\Models\Models\Tenant;

class TenantObserver
{
    /**
     * Handle the Tenant "created" event.
     *
     * @param  \App\Models\Models\Tenant  $tenant
     * @return void
     */
    public function created(Tenant $tenant)
    {
        //
    }

    /**
     * Handle the Tenant "updated" event.
     *
     * @param  \App\Models\Models\Tenant  $tenant
     * @return void
     */
    public function updated(Tenant $tenant)
    {
        //
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
