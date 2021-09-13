<?php

namespace App\Tenant;
use App\Models\Tenant;
use Illuminate\Support\Facades\Auth;

class ManagerTenant{
    public function getTenantIdentify(){
        $user = Auth::user();
        $user->tenant_id;
    }

    public function getTenant(): Tenant {
        $user = Auth::user();
        return $user->tenant;
    }
}