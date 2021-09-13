<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TenantApiController extends Controller{

    protected $tenantService;
    public function __construct(TenantService $tenantService){

    }
}
