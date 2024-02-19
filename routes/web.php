<?php

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

Route::get('/', function () {
    return view('template.index');
});

Auth::routes();
//Homepage
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.dashboard');
//Users
Route::get('/admin/users', [App\Http\Controllers\UserController::class, 'index'])->name('admin');
//Department
Route::get('/admin/department', [App\Http\Controllers\DepartmentController::class, 'index'])->name('admin.department.home');
Route::get('/admin/department/create', [App\Http\Controllers\DepartmentController::class, 'create'])->name('admin.department.create');
Route::post('/admin/department/store', [App\Http\Controllers\DepartmentController::class, 'store'])->name('admin.department.store');
Route::delete('/admin/department/{department}', [App\Http\Controllers\DepartmentController::class, 'destroy'])->name('admin.department.destroy');
Route::get('/admin/department/{department}', [App\Http\Controllers\DepartmentController::class, 'modify'])->name('admin.department.modify');
Route::put('/admin/department/{department}', [App\Http\Controllers\DepartmentController::class, 'update'])->name('admin.department.update');
//Posisitions
Route::get('/admin/position', [App\Http\Controllers\PositionController::class, 'index'])->name('admin.position.home');
Route::get('/admin/position/create', [App\Http\Controllers\PositionController::class, 'create'])->name('admin.position.create');
Route::post('/admin/position/store', [App\Http\Controllers\PositionController::class, 'store'])->name('admin.position.store');
Route::delete('/admin/position/{positions}', [App\Http\Controllers\PositionController::class, 'destroy'])->name('admin.position.destroy');
Route::get('/admin/position/{positions}', [App\Http\Controllers\PositionController::class, 'modify'])->name('admin.position.modify');
Route::put('/admin/position/{positions}', [App\Http\Controllers\PositionController::class, 'update'])->name('admin.position.update');
//Users
Route::get('/admin/user', [App\Http\Controllers\UserController::class, 'index'])->name('admin.user.home');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
