<?php

namespace App\Listeners\Tenant;

use App\Events\Tenant\TenantCreated;
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
        //os dois metodos que estão na classe de eventos em Events/Tentant/TenantCreated 
        $user = $event->user();
        $tenant = $event->tenant();
        if(!$role = Role::first()){
            return;
        }

    }
}
