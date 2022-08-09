<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class DashboardsController extends Controller
{

    public function index()
    {
        return view('get_users');

    }

    public function getUser()
    {

        return Datatables::of(User::query())->make(true);
        // return Datatables::of(User::query())->make(true) ;


    }
}
