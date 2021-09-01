<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Admin\{
    PlanController,
    DetailPlanController,
};

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'admin'], function(){
    /**
    *   Routes plan
    **/
    Route::resource('/plans',PlanController::class);
    Route::any('/plans/search',[PlanController::class,'search'])->name('plans.search');

      /**
    *   Routes details
    **/
    Route::get('/plans/{url}/details',[DetailPlanController::class,'index'])->name('details.plan.index');
    Route::get('/plans/{url}/create',[DetailPlanController::class,'create'])->name('details.plan.create');
    Route::post('/plans/{url}/store',[DetailPlanController::class,'store'])->name('details.plan.store');
    Route::get('/plans/{url}/show',[DetailPlanController::class,'show'])->name('details.plan.show');
    Route::get('/plans/{url}/edit',[DetailPlanController::class,'edit'])->name('details.plan.edit');
    Route::post('/plans/{url}/update',[DetailPlanController::class,'update'])->name('details.plan.update');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
