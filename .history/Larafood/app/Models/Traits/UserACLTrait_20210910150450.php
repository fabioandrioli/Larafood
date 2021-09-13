<?php

namespace App\Models\Traits;

trait UserACLTrait{
    
    public function permissions(){
        $tenant = $this->tenant()->first();
        $plan =  $tenant->plan;
        $profiles = $plan->profiles;

        $permissions = [];
        foreach($profiles as $profile){
            foreach ($profile->permissions as $permission) {
                array_push($permissions,$permission->name);
            }
        }
        return  $permissions;
    }

    public function hasPermission($permissionName){

    }
}