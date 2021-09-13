<?php

namespace App\Tenant\Traits;
use App\Tenant\Observers\TenantObserver;
use App\Tenant\Scopes\TenantScope;



trait TenantTrait {
    //reescrevendo o metodo booted do scope para usar um observe específico.
    protected static function boot(){
        parent::boot();
        static::observe(TenantObserver::class);

    }
}

 