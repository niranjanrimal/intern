<?php

use App\Models\UserHasRoles;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserHasRolesController;
use App\Http\Controllers\RoleHasPermissionController;

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


Route::get('users',[UserController::class,'index'])->name('users.index');

Route::get('users/create',[UserController::class,'create'])->name('users.create');

Route::post('users',[UserController::class,'store'])->name('users.store');

Route::get('users/{user}/edit',[UserController::class,'edit'])->name('users.edit');

Route::put('users/{user}',[UserController::class,'update'])->name('users.update');

Route::delete('users/{user}',[UserController::class,'destroy'])->name('users.destroy');



//Role

Route::resource('roles',RoleController::class);
Route::resource('permissions',PermissionController::class);



//rolehaspermission

Route::post('role-has-permission',[RoleHasPermissionController::class,'store'])->name('role-has-permission.store');
Route::get('get-role-permissions/{role}',[RoleHasPermissionController::class,'getRolePermissions'])->name('get-role-permissions');


Route::post('user-has-role',[UserHasRolesController::class,'store'])->name('user-has-role.store');
Route::get('get-user-roles/{user}',[UserHasRolesController::class,'getUserRoles'])->name('get-user-roles');