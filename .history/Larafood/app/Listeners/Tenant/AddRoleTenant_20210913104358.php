<?php

namespace App\Listeners\Tenant;

use App\Events\Tenant/TenantCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddRoleTenant
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  TenantCreated  $event
     * @return void
     */
    public function handle(TenantCreated $event)
    {
        //
    }
}
