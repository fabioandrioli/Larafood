<?php

namespace App\Models\Traits;
use App\Models\Tenant;

trait UserACLTrait{
    
    public function permissionsPlan(): array{
        // $tenant = $this->tenant()->first();
        // $plan =  $tenant->plan;
        // $profiles = $plan->profiles;
        $tenant = Tenant::with('plan.profiles.permissions')->where('id',$this->tenant_id)->first();
        $plan = $tenant->plan;
        $profiles = $plan->profiles;

        $permissions = [];
        foreach($profiles as $profile){
            foreach ($profile->permissions as $permission) {
                array_push($permissions,$permission->name);
            }
        }
        return  $permissions;
    }

    public function permissionsRole(): array {
        $roles = $this->roles()->with('permissions')->get();
        $permissions = [];
        foreach ( $roles->permissions as $permission) {
            array_push($permissions,$permission->name);
        }
        return $permissions;
    }

    public function hasPermission(string $permissionName): bool{
        return in_array($permissionName, $this->permissions());
    }

    public function isAdmin():bool{
        return in_array($this->email, config('acl.admins'));
    }

    public function isTenant():bool{
        return !in_array($this->email, config('acl.admins'));
    }
}