<?php

namespace App\Tenant\Observers;
use Illuminate\Database\Eloquent\Model;

class TenantObserver{
      /**
     * Handle the Tenant "created" event.
     *
     * @param  Model  $model
     * @return void
     */
    public function creating(Model $model)
    {
     
    }

}