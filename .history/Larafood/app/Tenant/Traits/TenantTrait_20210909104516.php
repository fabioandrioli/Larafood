<?php

namespace App\Tenant\Traits;


class TenantTrait {
    //reescrevendo o metodo booted do scope para usar um observe específico.
    protected static function boot(){
        parent::boot();
        static::observe(TenantObserver::class);

    }
}

 