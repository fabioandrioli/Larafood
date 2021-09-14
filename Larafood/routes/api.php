<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\{
    TenantApiController,
};

Route::get('/tenants',[ TenantApiController::class,'index']);

Route::get('/tenants/{uuid}',[ TenantApiController::class,'show']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
