<?php

namespace App\Tenant;
use App\Models\Tenant;
use Illuminate\Support\Facades\Auth;

class ManagerTenant{
    private $user;

    public function __construct(){
        return $this->user = Auth::user();
    }

    public function getTenantIdentify(){
        return $this->user->tenant_id;
    }

    public function getTenant(): Tenant {
        return  $this->user->tenant;
    }

    public function isAdmin():bool {
        return in_array(  $this->user->email, config('tenant.admins'));//acessando dentro da configuração o tenant e dentro do arquivo tenant o array admin
    }
}