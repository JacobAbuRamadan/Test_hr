<?php

namespace App\Http\Controllers;
use App\Models\User;

use App\Mail\UserPass;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =User::all();
        return view('dashboard.employee_form',compact('Employees','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('dashboard.employee_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'type'=>'required',
            'role_id'=>'required',

        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password'=>Hash::make($request->password),
            'type' => $request->type,
            'role_id' => $request->role_id,


        ]);


           return redirect()-> route('employees.index')->with('msg','The HR has been added and the email has been sent successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=  User::findOrFail($id);

        return  view('dashboard.edit_hr',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $user =  User::findOrFail($id);

        $request->validate([

            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'type'=>'required',
            'role_id'=>'required',

        ]);


        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password'=>Hash::make($request->password),
            'type' => $request->type,
        ]);


        return redirect()->route('employees.index')->with('msg','The Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();

     return redirect()->back()->with('dmsg','The HR Deleted successfully');

    }
}
