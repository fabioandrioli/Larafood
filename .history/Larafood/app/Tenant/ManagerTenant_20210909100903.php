<?php

namespace App\Tenant;
use App\Models\Tenant;
use Illuminate\Support\Facades\Auth;

class ManagerTenant{
    public function getTenantIdentify(){
        auth()->user()->tenant_id;
    }

    public function getTenant(): Tenant {

    }
}