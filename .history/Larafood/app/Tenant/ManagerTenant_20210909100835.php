<?php

namespace App\Tenant;
use App\Models\Tenant;

class ManagerTenant{
    public function getTenantIdentify(){
        auth()->user()->tenant_id;
    }

    public function getTenant(): Tenant {

    }
}