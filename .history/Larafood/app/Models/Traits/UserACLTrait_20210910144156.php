<?php

namespace App\Models\Traits;

trait UserACLTrait{
    
    public function permissions(){
        $tenant = $this->tenant()->first();
        $plan =  $tenant->plan;
        $profiles = $plan->profiles;

        foreach($profiles as $profile){
            
        }
        return;
    }
}