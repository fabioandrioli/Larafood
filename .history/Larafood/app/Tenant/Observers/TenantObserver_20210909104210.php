<?php

namespace App\Tenant\Observers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Tenant\ManagerTenant;

class TenantObserver{
      /**
     * Handle the Model "created" event.
     *
     * @param  Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function creating(Model $model)
    {

        $managerTenant = app(ManagerTenant::class);
  
        $model->tenant_id = $managerTenant.getTenantIdentify();
    }

}