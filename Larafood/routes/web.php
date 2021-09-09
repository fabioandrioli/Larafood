<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Admin\{
    PlanController,
    DetailPlanController,
    ProfileController,
    PermissionController,
    ProfilePermissionController,
    PlanProfileController,
    UserController,
    CategoryController,
    ProductController,
    TableController,
    CategoryProductController,

};

use App\Http\Controllers\Web\Site\SiteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::group(['prefix' => 'admin','middleware' => 'auth'], function(){
    /**
    *   Routes plan
    **/
    Route::resource('/plans',PlanController::class);
    Route::any('/plans/search',[PlanController::class,'search'])->name('plans.search');


    /**
    *   Routes users
    **/
    Route::resource('/users', UserController::class);
    Route::any('/users/search',[ UserController::class,'search'])->name('users.search');

    
    /**
    *   Routes Category
    **/
    Route::resource('/categories', CategoryController::class);
    Route::any('/categories/search',[ CategoryController::class,'search'])->name('categories.search');


    /**
    *   Routes category_product
    **/

    Route::get('/categories/{url}/products',[ CategoryProductController::class,'categories'])->name('categories.products');

    Route::any('/category/{url}/linkNewProduct',[ CategoryProductController::class,'linkNewProduct'])->name('categories.linkNewProduct');
  
    Route::post('/category/{url}/linkNewProduct/store',[ CategoryProductController::class,'linkNewProductStore'])->name('categories.linkNewProductStore');

    Route::get('/categories/{url}/products/{idProduct}/unbindProduct',[ CategoryProductController::class,'unbindProduct'])->name('categories.products.unbindproduct');

        
    /**
    *   Routes Product
    **/
    Route::resource('/products', ProductController::class);
    Route::any('/products/search',[ ProductController::class,'search'])->name('products.search');

    /**
    *   Routes Table
    **/
    Route::resource('/tables', TableController::class);
    Route::any('/tables/search',[ TableController::class,'search'])->name('tables.search');

    /**
    *   Routes details
    **/
    Route::get('/plans/{url}/details',[DetailPlanController::class,'index'])->name('details.plan.index');
    Route::get('/plans/{url}/create',[DetailPlanController::class,'create'])->name('details.plan.create');
    Route::post('/plans/{url}/store',[DetailPlanController::class,'store'])->name('details.plan.store');
    Route::get('/plans/{url}/show/{idDetail}',[DetailPlanController::class,'show'])->name('details.plan.show');
    Route::get('/plans/{url}/edit/{idDetail}',[DetailPlanController::class,'edit'])->name('details.plan.edit');
    Route::put('/plans/{url}/update/{idDetail}',[DetailPlanController::class,'update'])->name('details.plan.update');
    Route::delete('/plans/{url}/destroy/{idDetail}',[DetailPlanController::class,'destroy'])->name('details.plan.destroy');

    /**
    *   Routes profile
    **/
    Route::resource('/profiles',ProfileController::class);
    Route::any('/profiles/search',[ProfileController::class,'search'])->name('profiles.search');

    /**
    *   Routes permission
    **/
    Route::resource('/permissions',PermissionController::class);
    Route::any('/permissions/search',[PermissionController::class,'search'])->name('permissions.search');

    /**
    *   Routes profile_permisions
    **/
    Route::get('/profiles/{id}/permissions',[ProfilePermissionController::class,'profiles'])->name('profiles.permissions');

    Route::get('/permissions/{id}/profiles',[ProfilePermissionController::class,'permissions'])->name('permissions.profiles');

    Route::any('/profile/{id}/linkNewPermission',[ProfilePermissionController::class,'linkNewPermission'])->name('profiles.linkNewPermission');
  
    Route::post('/profile/{id}/linkNewPermission/store',[ProfilePermissionController::class,'linkNewPermissionStore'])->name('profiles.linkNewPermissionStore');

    Route::get('/profiles/{id}/permissions/{idPermission}/unbindPermission',[ProfilePermissionController::class,'unbindPermission'])->name('profiles.permissions.unbindPermission');
  
    /**
    *   Routes profile_plans
    **/
    Route::get('/profiles/{id}/plans',[PlanProfileController::class,'profiles'])->name('profiles.plans');

    Route::get('/plans/{id}/profiles',[PlanProfileController::class,'plans'])->name('plans.profiles');

    Route::any('/profile/{id}/linkNewPlan',[PlanProfileController::class,'linkNewPlan'])->name('profiles.linkNewPlan');
  
    Route::post('/profile/{id}/linkNewPlan/store',[PlanProfileController::class,'linkNewPlanStore'])->name('profiles.linkNewPlanStore');

    Route::get('/profiles/{id}/plans/{idPlan}/unbindPlan',[PlanProfileController::class,'unbindPlan'])->name('profiles.plans.unbindPlan');

});


/**
 * Rotas da web
 */

Route::get('/', [SiteController::class,'index']);

Route::get('/subscription/{url}', [SiteController::class,'subscription'])->name('plan.subscription');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
