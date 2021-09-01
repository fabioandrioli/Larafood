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
    Route::resource('/plans/{url}/details',DetailPlanController::class);
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
