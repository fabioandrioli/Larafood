<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\TenantService;

class TenantApiController extends Controller{

    protected $tenantService;
    public function __construct(TenantService $tenantService){
        $this->tenantService = $tenantService;
    }

    public function index(){
        return  $this->tenantService->getAllTenants();
    }
}
