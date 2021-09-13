<?php

namespace App\Tenant;

class ManagerTenant{
    public function getTenantIdentify(){
        auth()->user()->tenant_id;
    }
}