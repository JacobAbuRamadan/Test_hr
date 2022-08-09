<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('/home');
    }

    // public function getUsers()
    // {
    //     //     $data=Datatables::of(User::query())->make(true);
    //     // return view('get_users',compact('data'));

    //     return Datatables::of(Employee::query())->make(true);

    // }
}
