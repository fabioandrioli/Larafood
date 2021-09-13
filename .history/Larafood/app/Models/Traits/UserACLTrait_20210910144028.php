<?php

namespace App\Models\Traits;

trait UserACLTrait{
    
    public function permissions(){
        $tenant = $this->tenant()->first();
        return $tenant->plan;
    }
}