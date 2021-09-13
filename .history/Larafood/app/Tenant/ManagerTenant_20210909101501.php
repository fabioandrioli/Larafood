<?php

namespace App\Tenant;
use App\Models\Tenant;
use Illuminate\Support\Facades\Auth;

class ManagerTenant{
    private $user;

    public function __construct(){
        $this->user = Auth::user();
    }

    public function getTenantIdentify(){
        $this->user->tenant_id;
    }

    public function getTenant(): Tenant {
        return  $this->user->tenant;
    }

    public function isAdmin:boolean {
        return in_array(  $this->user);
    }
}