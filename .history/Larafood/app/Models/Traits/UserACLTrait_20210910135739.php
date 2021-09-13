<?php

namespace App\Models\Traits;

trait UserACLTrait{
    
    public function permissions(){
        return $this->tenant()->first();
    }
}