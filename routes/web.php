<?php

use App\Http\Controllers\AdminsController;
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




// for add,edit and delete employees by HR
Route::resource('employees', EmployeesController::class)->Middleware(['auth','check_user']);


//for add,edit and delete HR by Admin
Route::resource('admins', AdminsController::class)->Middleware(['auth','check_user']);


//for showing Employee information
Route::resource('/userdata', UserDataController::class)->middleware(['auth','check_user']);


// Auth routes
Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Registration is not allowed in this case at the moment
Route::get('/register',function(){
    return redirect()->route('not.allowed');
});


//Not allowed page
Route::get('not_allowed',function(){
   return view('errors.403'); })->name('not.allowed');






//just for testing yajrabox datatable

// route::get('/dashboard', [DashboardsController::class,'index'])->name('dashboard');
// route::get('/user', [DashboardsController::class,'getUser'])->name('get.users');
// Route::resource('/yajra', YajrasController::class);
