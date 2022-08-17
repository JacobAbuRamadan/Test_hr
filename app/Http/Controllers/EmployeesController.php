<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\UserPass;
use App\Models\Employee;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Gate;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            Gate::authorize('employees.show');

            $Employees = Employee::all();
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
        Gate::authorize('employees.create');

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
        if ($request->type == 'hr') {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password'=>Hash::make($request->password),
                'type' => $request->type,
                'role_id' => $request->role_id,
            ]);
            $name=$request->name;
            $email=$request->email;
            $password=$request->password;

            Mail::to($email)->send(new UserPass($name,$email,$password));

           return redirect()-> back()->with('msg','The HR has been added and the email has been sent successfully');

        }
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'type'=>'required',
            'role_id'=>'required',
            'university'=>'required',
            'major'=>'required',
            'graduation_year'=>'required',
            'birthday'=>'required',
            'adress'=>'required',
            'status'=>'nullable' ,
            'phone_num'=>'required|digits_between:9,15',
            'personal_photo'=>'required|mimes:png,jpeg,jpg',
            'college_degree'=>'required|mimes:png,jpeg,jpg',
            'cv'=>'required|mimes:png,jpeg,jpg',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password'=>Hash::make($request->password),
            'type' => $request->type,
            'role_id' => $request->role_id,


        ]);






        $new_personal_photo=rand().rand()."_" .$request ->file('personal_photo')->getClientOriginalName();
        $request->file('personal_photo')->move(public_path('Uploads/images/personal_photo'),$new_personal_photo);

        $new_college_degree=rand().rand()."_" .$request ->file('college_degree')->getClientOriginalName();
        $request->file('college_degree')->move(public_path('Uploads/images/college_degree'),$new_college_degree);

        $new_cv=rand().rand()."_" .$request ->file('cv')->getClientOriginalName();
        $request->file('cv')->move(public_path('Uploads/images/cv'),$new_cv);


        // $status= [
        //     'en'=> $request->name_en,
        //     'ar'=> $request->name_ar
        // ];


        Employee::create([
            'user_id' => $user->id,
            'university'=> $request->university,
            'major'=> $request->major,
            'graduation_year'=> $request->graduation_year,
            'birthday'=> $request->birthday,
            'adress'=> $request->adress,
            'status'=> $request->status,
            'phone_num'=> $request->phone_num,
            'personal_photo'=>$new_personal_photo,
            'college_degree'=>$new_college_degree,
            'cv'=>$new_cv,
        ]);

        $name=$request->name;
        $email=$request->email;
        $password=$request->password;

        Mail::to($email)->send(new UserPass($name,$email,$password));

       return redirect()-> back()->with('msg','The employee has been added and the email has been sent successfully');

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


        Gate::authorize('employees.edit');
        $users =  User::all();
        $Employees =  Employee::findOrFail($id);

        $user_id=$Employees->user_id;

       $user= User::where('id', $user_id)->get();


        // dd($Employees,$user_id,$user);
        return  view('dashboard.edit_employee',compact('user','Employees'));

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


        $request->validate([

            'university'=>'required',
            'major'=>'required',
            'graduation_year'=>'required',
            'birthday'=>'required',
            'adress'=>'required',
            'status'=>'nullable' ,
            'phone_num'=>'required',
            'personal_photo'=>'nullable|mimes:png,jpeg,jpg',
            'college_degree'=>'nullable|mimes:png,jpeg,jpg',
            'cv'=>'nullable|mimes:png,jpeg,jpg',

        ]);


        $Employees =  Employee::findOrFail($id);



        $new_personal_photo=$Employees->personal_photo;
        $new_college_degree=$Employees->college_degree;
        $new_cv=$Employees->cv;

        if($request->has('personal_photo')){
            if($new_personal_photo && file_exists(public_path('uploads/images/personal_photo/'.$new_personal_photo))) {
                FacadesFile::delete(public_path('uploads/images/personal_photo/'.$new_personal_photo));
            }
            $new_personal_photo=rand().rand()."_" .$request ->file('personal_photo')->getClientOriginalName();
            $request->file('personal_photo')->move(public_path('uploads/images/personal_photo/'),$new_personal_photo);
              }


        if($request->has('college_degree')){
            if($new_college_degree && file_exists(public_path('uploads/images/college_degree/'.$new_college_degree))) {
                FacadesFile::delete(public_path('uploads/images/college_degree/'.$new_college_degree));
            }
            $new_college_degree=rand().rand()."_" .$request ->file('college_degree')->getClientOriginalName();
            $request->file('college_degree')->move(public_path('uploads/images/college_degree/'),$new_college_degree);
              }

        if($request->has('cv')){
            if($new_cv && file_exists(public_path('uploads/images/cv/'.$new_cv))) {
                FacadesFile::delete(public_path('uploads/images/cv/'.$new_cv));
            }
            $new_cv=rand().rand()."_" .$request ->file('cv')->getClientOriginalName();
            $request->file('cv')->move(public_path('uploads/images/cv/'),$new_cv);
              }



              $users =  User::all();
              $user_id=$Employees->user_id;

             $user= User::find($user_id);

              $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password'=>Hash::make($request->password),
                'type' => $request->type,
            ]);



        $item=$Employees->update([
            'university'=> $request->university,
            'major'=> $request->major,
            'graduation_year'=> $request->graduation_year,
            'birthday'=> $request->birthday,
            'adress'=> $request->adress,
            'status'=> $request->status,
            'phone_num'=> $request->phone_num,

            'personal_photo'=>$new_personal_photo,
            'college_degree'=>$new_college_degree,
            'cv'=>$new_cv,

        ]);


       return redirect()->route('employees.index')->with('msg','The Data Updated Successfully');

    }


    public function destroy($id)
    {
        // $users = User::all();

        // $hr = User::where('type','hr')->get();
        // dd($hr);


        // if($hr=$id){
        //     $hr = User::where('type','hr')->get();
        //     if($hr->id =$id){
        //     $users = User::find($id);

        //         dd($id);
        //     $users->delete();
        //     return redirect()->back()->with('dmsg','The HR Deleted successfully');

        //          }
        // }


        Gate::authorize('employees.destroy');



        $Employees = Employee::find($id);
        $personal_photo = $Employees ->personal_photo;
        $college_degree = $Employees ->college_degree;
        $cv = $Employees ->cv;
        FacadesFile::delete(public_path('uploads/images/personal_photo/'. $Employees->personal_photo));

        FacadesFile::delete(public_path('uploads/images/college_degree/'. $Employees->college_degree));

        FacadesFile::delete(public_path('uploads/images/cv/'. $Employees->cv));


        $user = $Employees->user_id;
        $users = User::find($user);
           $Employees->delete();
           $users->delete();




        return redirect()->back()->with('dmsg','The Employee Deleted successfully');

    }



}
