<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('roles', RoleController::class);
// Route::get('permissions', PermissionController::class);
Route::get('/',[AdminController::class,'admin']);


Route::group(['prefix'=>'/admin'], function(){
Route::group(['prefix'=>'/roles'], function(){
Route::get('/', [RoleController::class, 'index'])->name('roles.index');
Route::get('/create', [RoleController::class, 'create'])->name('roles.create');
Route::post('/store', [RoleController::class, 'store'])->name('roles.store');
Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
Route::post('/update/{id}', [RoleController::class, 'update'])->name('roles.update');
Route::get('/delete/{id}', [RoleController::class, 'delete'])->name('roles.delete');
});


Route::group(['prefix'=>'/permissions'], function(){
Route::get('/', [PermissionController::class, 'index'])->name('permissions.index');
Route::get('/create', [PermissionController::class, 'create'])->name('permissions.create');
Route::post('/store', [PermissionController::class, 'store'])->name('permissions.store');
Route::get('/edit/{id}', [PermissionController::class, 'edit'])->name('permissions.edit');
Route::post('/update/{id}', [PermissionController::class, 'update'])->name('permissions.update');
Route::get('/delete/{id}', [PermissionController::class, 'delete'])->name('permissions.delete');
});

Route::group(['prefix' => '/rolepermission'], function() {
    Route::get('/',[RolePermissionController::class,'index'])->name('rolepermission.index');
    Route::get('/create/{roleId}',[RolePermissionController::class,'create'])->name('rolepermission.create');
    Route::post('/store/{roleId}',[RolePermissionController::class,'store'])->name('rolepermission.store');
    });
    // Route::group(['middleware' => 'role:manager'], function () {
    //     Route::get('/manager',[HomeController::class,'second'])->name('manager.second');
    // });
   
    Route::get('/user',[HomeController::class,'first'])->name('user.first');

    Route::group(['middleware' => 'admin:manager'], function () {
        
    Route::get('/manager',[HomeController::class,'second'])->name('manager.second');
    });
    

});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/dashboard', 'AdminController@dashboard')->middleware('admin');
