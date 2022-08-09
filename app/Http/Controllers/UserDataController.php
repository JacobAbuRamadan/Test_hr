<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Empty_;

class UserDataController extends Controller
{
    public function index()
    {
        $user= Auth::user();

        $user_id=Auth::user()->id;

       $Employee= Employee::where('user_id', $user_id)->get();

        return view('users.employee_data',compact('user','Employee'));

    }
}

