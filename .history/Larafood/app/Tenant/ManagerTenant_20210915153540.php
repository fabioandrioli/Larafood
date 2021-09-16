<?php

namespace App\Tenant;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ManagerTenant{
    private $user;

    public function __construct(){
       // $this->user = Auth::user();
       $this->user = User
    }

    public function getTenantIdentify():int{
        return $this->user->tenant_id;
    }

    public function getTenant(): Tenant {
        return  $this->user->tenant;
    }

    public function isAdmin():bool {
        return in_array(  $this->user->email, config('tenant.admins'));//acessando dentro da configuração o tenant e dentro do arquivo tenant o array admin
    }
}