<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ItemController;
use App\Http\Controllers\admin\UnitController;
use App\Http\Controllers\user\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return to_route('login');
// });

Route::view('/','welcome');



// for user

Route::middleware(['auth:sanctum','verified'])->group(function(){
    Route::get('/user/dashboard',[UserController::class,'index'])->name('user.dashboard');
});


// for user

Route::middleware(['auth:sanctum','verified','authadmin'])->group(function(){
    Route::get('/admin/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');

    Route::controller(UnitController::class)->group(function () {
        Route::get('/admin/units','index')->name('admin.units');
        Route::get('/admin/units/create','create')->name('admin.create-units');
        Route::post('/admin/units','store')->name('admin.store-unit');
        Route::get('/admin/units/{id}/edit','edit')->name('admin.edit-unit');
        Route::post('/admin/units/{id}','update')->name('admin.update-unit');
        Route::get('/admin/units/{id}/delete','destroy')->name('admin.delete-unit');
    });

    Route::controller(ItemController::class)->group(function () {
        Route::get('/admin/items','index')->name('admin.items');
        Route::get('/admin/items/create','create')->name('admin.create-items');
        Route::post('/admin/items','store')->name('admin.store-item');
        Route::get('/admin/items/{id}/edit','edit')->name('admin.edit-item');
        Route::post('/admin/items/{id}','update')->name('admin.update-item');
        Route::get('/admin/items/{id}/delete','destroy')->name('admin.delete-item');
    });
});
