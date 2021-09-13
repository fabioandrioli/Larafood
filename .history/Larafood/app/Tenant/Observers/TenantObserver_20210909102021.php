<?php

namespace App\Tenant\Observers;
use Illuminate\Database\Eloquent\Model;

class TenantObserver{
      /**
     * Handle the Tenant "created" event.
     *
     * @param  \App\Models\Models\Tenant  $tenant
     * @return void
     */
    public function creating(Model $model)
    {
     
    }

}