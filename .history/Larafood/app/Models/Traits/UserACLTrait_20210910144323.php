<?php

namespace App\Models\Traits;

trait UserACLTrait{
    
    public function permissions(){
        $tenant = $this->tenant()->first();
        $plan =  $tenant->plan;
        $profiles = $plan->profiles;

        $permissions = [];
        foreach($profiles as $profile){
            $permissions[] = $profile->permissions;
        }
        return;
    }
}