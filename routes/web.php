<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;


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


Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:isAdmin'])->group(function() {

    // dashboard
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

    // user-list
    Route::controller(UserController::class)->group(function () {
        Route::middleware('permission:viewUser')->get('/users', 'view')->name('user-list');
        Route::middleware('permission:createUser')->post('/user', 'store');
        Route::middleware('permission:updateUser')->get('/user/{id}/profile', 'edit')->whereNumber('id')->name('user-edit');
        Route::middleware('permission:updateUser')->patch('/user/{id}', 'update')->whereNumber('id');
        Route::middleware('permission:softDeleteUser')->delete('/user/softdelete/{id}', 'softdelete')->whereNumber('id');
        Route::middleware('permission:permDeleteUser')->delete('/user/permdelete/{id}', 'permdelete')->whereNumber('id');
    });

    // role-list
    Route::controller(RoleController::class)->group(function(){
        Route::middleware('permission:viewRole')->get('/roles', 'view')->name('role-list');
        Route::middleware('permission:createRole')->post('/role', 'store');
        Route::middleware('permission:updateRole')->get('/role/{id}/profile', 'edit')->whereNumber('id')->name('role-edit');
        Route::middleware('permission:updateRole')->patch('/role/{id}', 'update')->whereNumber('id');
        Route::middleware('permission:softDeleteRole')->delete('/role/softdelete/{id}', 'softdelete')->whereNumber('id');
        Route::middleware('permission:permDeleteRole')->delete('/role/permdelete/{id}', 'permdelete')->whereNumber('id');
    });

    // permission-list
    Route::controller(PermissionController::class)->group(function(){
        Route::middleware('permission:viewPermission')->get('/permissions', 'view')->name('permission-list');
        Route::middleware('permission:createPermission')->post('/permission', 'store');
        Route::middleware('permission:updatePermission')->get('/permission/{id}/profile', 'edit')->whereNumber('id')->name('permission-edit');
        Route::middleware('permission:updatePermission')->patch('/permission/{id}', 'update')->whereNumber('id');
        Route::middleware('permission:softDeletePermission')->delete('/permission/softdelete/{id}', 'softdelete')->whereNumber('id');
        Route::middleware('permission:permDeletePermission')->delete('/permission/permdelete/{id}', 'permdelete')->whereNumber('id');
    });
});

Route::prefix('auth')->name('auth.')->group(function (){
    Route::middleware('guest')->controller(Authentication::class)->group(function () {
        Route::get('/login', 'loginForm')->name('loginForm');
        Route::get('/signup', 'signupForm')->name('signupForm');
    });
    Route::post('/signupAction', [Authentication::class, 'signupAction']);
    Route::post('/loginAction', [Authentication::class, 'loginAction']);
    Route::post('/logout', [Authentication::class, 'logout']);
});;
