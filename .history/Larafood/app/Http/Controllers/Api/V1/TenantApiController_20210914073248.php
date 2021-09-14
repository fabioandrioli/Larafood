<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TenantService;
use App\Http\Resources\Tenant\TenantResource;

class TenantApiController extends Controller{

    protected $tenantService;
    public function __construct(TenantService $tenantService){
        $this->tenantService = $tenantService;
    }

    public function index(){
        return  TenantResource::collection( $this->tenantService->getAllTenants());
    }

    public function show($uuid){

        if(!$tenant = $this->tenantService->getTenantByUuid($uuid)){

        }
        
        return  new TenantResource($tenant);
    }
}
