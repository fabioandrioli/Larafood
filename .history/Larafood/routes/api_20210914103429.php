<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\{
    TenantApiController,
    CategoryApiController,
};

Route::get('/tenants',[ TenantApiController::class,'index']);

Route::get('/tenants/{uuid}',[ TenantApiController::class,'show']);

//d3c2aa22-f597-4743-b8f3-7eeb1267ffc8 uuid para teste
Route::get('/categories',[ CategoryApiController::class,'getCategoriesByTenant']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
