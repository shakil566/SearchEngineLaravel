<?php

use App\Http\Controllers\Frontend\RoleController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/',[FrontendController::class,'index']);
Route::post('/searchHistory',[FrontendController::class,'searchHistory']);

Auth::routes();


// Route::prefix('admin')->middleware(['auth','adminCheck'])->group(function () {
Route::prefix('admin')->middleware(['auth'])->group(function () {

    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/user', [App\Http\Controllers\Admin\UsersController::class, 'index'])->name('user');
    Route::post('/user/filter', [App\Http\Controllers\Admin\UsersController::class, 'filter']);

    Route::get('/role', [App\Http\Controllers\Admin\RoleController::class, 'index'])->name('role');
    Route::get('/role/create', [App\Http\Controllers\Admin\RoleController::class, 'create'])->name('role.create');
    Route::post('/role', [App\Http\Controllers\Admin\RoleController::class, 'store'])->name('role.store');
    Route::post('/role/filter', [App\Http\Controllers\Admin\RoleController::class, 'filter']);
    Route::get('/role/{id}/edit', [App\Http\Controllers\Admin\RoleController::class, 'edit'])->name('role.edit');
    Route::post('/role/{id}', [App\Http\Controllers\Admin\RoleController::class, 'update'])->name('role.update');
    Route::delete('/role/{id}', [App\Http\Controllers\Admin\RoleController::class, 'destroy'])->name('role.destroy');


});
