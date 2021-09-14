<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\{
    TenantApiController,
    CategoryApiController,
    TableApiController,
};

Route::get('/tenants',[ TenantApiController::class,'index']);

Route::get('/tenants/{uuid}',[ TenantApiController::class,'show']);

//d3c2aa22-f597-4743-b8f3-7eeb1267ffc8 uuid para teste
Route::get('/categories',[ CategoryApiController::class,'getCategoriesByTenant']);

//o teste no postman foi assim com requisção GET.
//http://127.0.0.1:8000/api/categories/pizzarias/?token_company=d3c2aa22-f597-4743-b8f3-7eeb1267ffc8

Route::get('/categories/{url}',[ CategoryApiController::class,'show']);


Route::get('/tables',[TableApiController::class,'getTablesByTenant']);

Route::get('/tables/{uuid}',[TableApiController::class,'show']);

Route::get('/products',[ProductApiController::class,'productsByTenant']);

Route::get('/products/{uuid}',[ProductApiController::class,'show']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
