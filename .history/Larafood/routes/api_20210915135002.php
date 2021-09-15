<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\{
    TenantApiController,
    CategoryApiController,
    TableApiController,
    ProductApiController,
};

use App\Http\Controllers\Api\V1\Auth\{
    RegisterApiController,
    AuthApiController,
};

// use App\Models\Client;

Route::group(['prefix' => 'v1'], function(){

    Route::get('/tenants',[ TenantApiController::class,'index']);

    Route::get('/tenants/{uuid}',[ TenantApiController::class,'show']);

    //d3c2aa22-f597-4743-b8f3-7eeb1267ffc8 uuid para teste
    Route::get('/categories',[ CategoryApiController::class,'getCategoriesByTenant']);

    //o teste no postman foi assim com requisção GET.
    //http://127.0.0.1:8000/api/categories/pizzarias/?token_company=d3c2aa22-f597-4743-b8f3-7eeb1267ffc8

    Route::get('/categories/{url}',[ CategoryApiController::class,'show']);

    //Table

    Route::get('/tables',[TableApiController::class,'getTablesByTenant']);

    Route::get('/tables/{token_company}',[TableApiController::class,'show']);

    Route::get('/products',[ProductApiController::class,'productsByTenant']);

    Route::get('/products/{flag}',[ProductApiController::class,'show']);

    //Clients
    Route::post('/clients/store',[RegisterApiController::class,'store']);

    // Route::get('/clients/testeSanctumApi',function(){
    //     $client = Client::first();
    //     $token = $client->createToken('teste-token');
    //     dd($token->plainTextToken);
    // });

    Route::post('/sanctum/token',[AuthApiController,'auth']);
    

    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });

});
