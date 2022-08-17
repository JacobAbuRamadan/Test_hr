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
use GuzzleHttp\Middleware;

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



Route::group(['Middleware'=>'auth','check_user'],function(){
    // // for add,edit and delete employees by HR
    Route::resource('employees', EmployeesController::class);
    // //for add,edit and delete HR by Admin
    Route::resource('admins', AdminsController::class);
// //for showing Employee information
    Route::resource('/userdata', UserDataController::class);
});


// Auth routes
Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Registration is not allowed in this case at the moment
Route::redirect('/register', '/not_allowed',);

//Not allowed page

   Route::view('/not_allowed', 'errors.403')->name('not.allowed');





//just for testing yajrabox datatable

// route::get('/dashboard', [DashboardsController::class,'index'])->name('dashboard');
// route::get('/user', [DashboardsController::class,'getUser'])->name('get.users');
// Route::resource('/yajra', YajrasController::class);
