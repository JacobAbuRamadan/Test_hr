<?php

use App\Models\Yajra;
use App\Models\Employee;
use App\Models\Dashboard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\YajrasController;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\DashboardsController;

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
Route::resource('employees', EmployeesController::class)->Middleware(['auth','check_user']);


route::get('/dashboard', [DashboardsController::class,'index'])->name('dashboard');

route::get('/user', [DashboardsController::class,'getUser'])->name('get.users');


Route::resource('/yajra', YajrasController::class);


Route::resource('/userdata', UserDataController::class)->middleware(['auth','check_user']);



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('not_allowed',function(){
   return view('errors.403');
})->name('not.allowed');
