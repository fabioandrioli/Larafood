<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\{
    TenantApiController,
    CategoryApiController,
    TableApiController,
    ProductApiController,
    OrderApiController,
};

use App\Http\Controllers\Api\V1\Auth\{
    RegisterApiController,
    AuthApiController,
};

// use App\Models\Client;

Route::get('/',function(){
    return response()->json(200);
});

Route::group(['prefix' => 'v1'], function(){

    
    //Clients
    Route::post('/clients/store',[RegisterApiController::class,'store']);

    Route::post('/sanctum/token',[AuthApiController::class,'auth']);
    
    Route::group(['middleware' => ['auth:sanctum']], function(){
        Route::get('/auth/me',[AuthApiController::class,'me']);
       
    });

    Route::post('/auth/logout',[AuthApiController::class,'logout']);
     //autenticação
    // Route::group(['middleware' => ['auth:sanctum']], function(){
    //      //autenticação
    //     Route::get('/auth/me',[AuthApiController::class,'me']);

    //     Route::post('/auth/logout',[AuthApiController::class,'logout']);


        
        Route::get('/tenants',[ TenantApiController::class,'index']);

        Route::get('/tenants/{uuid}',[ TenantApiController::class,'show']);

        //d3c2aa22-f597-4743-b8f3-7eeb1267ffc8 uuid para teste
        Route::get('/categories',[ CategoryApiController::class,'getCategoriesByTenant']);

        //o teste no postman foi assim com requisção GET.
        //http://127.0.0.1:8000/api/categories/pizzarias/?token_company=d3c2aa22-f597-4743-b8f3-7eeb1267ffc8

        Route::get('/categories/{identify}',[ CategoryApiController::class,'show']);

        //Table

        Route::get('/tables',[TableApiController::class,'getTablesByTenant']);

        Route::get('/tables/{identify}',[TableApiController::class,'show']);

        Route::get('/products',[ProductApiController::class,'productsByTenant']);

        Route::get('/products/{identify}',[ProductApiController::class,'show']);

        //Pedidos ================================================
        Route::post('/orders/store',[OrderApiController::class,'store']);

        Route::get('/orders/{identify}',[OrderApiController::class,'show']);
        Route::get('/orders/myOrders/{identify}',[OrderApiController::class,'myOrders']);

    // });

    

    // Route::get('/clients/testeSanctumApi',function(){
    //     $client = Client::first();
    //     $token = $client->createToken('teste-token');
    //     dd($token->plainTextToken);
    // });




    // Route::middleware('auth:api')->get('/user', function (Request $request) {
    //     return $request->user();
    // });

});
