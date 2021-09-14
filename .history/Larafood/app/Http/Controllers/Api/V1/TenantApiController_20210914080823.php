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

    public function index(Request $request){
        $per_page = (int) $request->get('per_page',15);
        $tenants = $this->tenantService->getAllTenants(
            $per_page
        );
        return  TenantResource::collection($tenants);
    }

    public function show($uuid){
   
        if(!$tenant = $this->tenantService->getTenantByUuid($uuid)){
            return response()->json(['message' => 'Not found'], 404);
        }

        //$tenant = $this->tenantService->getTenantByUuid($uuid);

        return  new TenantResource($tenant);
    }
}
