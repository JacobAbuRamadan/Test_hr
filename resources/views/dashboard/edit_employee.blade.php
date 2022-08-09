@extends('pages._layouts.dashboard.master')

@section('edit_content')



<div  id="modal-report" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update Employee</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>


        <form class="mt-4" action="{{ route('employees.update', $Employees->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
         @method('put')

        @foreach ($user as $user)

        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" value="{{ old('name', $user->name ) }}" name="name" >
          </div>

          <div class="mb-3">
            <label class="form-label">Employee Email</label>
            <input type="text" class="form-control" name="email" value="{{ old('email', $user->email ) }} ">
          </div>
            <label class="form-label">Employee password</label>
            <div class="Generate_password">
              <input class="form-control" type="text" name="password" placeholder="Create password" id="password" value="{{ old('password', $user->password ) }} "  readonly >
                  <div id="button" class="btn1"onclick="genPassword()">Generate</div>
          </div>

      <div class="col-lg-4 mt-3">
        <div class="mb-3">
          <label class="form-label">Type</label>
          <select name="type" class="form-select">
            <option  value="employee" selected>Employee</option>
          </select>
        </div>
        </div>
        @endforeach

          <div class="mb-3">
            <label class="form-label">University</label>
            <input type="text" class="form-control" name="university" value="{{ old('university', $Employees->university ) }}">
          </div>
          <div class="mb-3">
            <label class="form-label">Major</label>
            <input type="text" class="form-control" name="major" value="{{ old('major', $Employees->major ) }}">
          </div>
          <div class="mb-3">
            <label class="form-label">Adress</label>
            <input type="text" class="form-control" name="adress" value="{{ old('adress', $Employees->adress ) }}">
          </div>
          <div class="mb-3">
            <label class="form-label">Phone Num</label>
            <input type="number"  class="form-control" name="phone_num" value="{{ old('phone_num', $Employees->phone_num ) }}">
          </div>

          <div class="modal-body">
              <div class="row">

                <div class="col-lg8">
                  <div class="mb-3">
                    <label class="form-label">Graduation Year</label>
                    <input type="date" name="graduation_year" value="{{ old('graduation_year', $Employees->graduation_year ) }}" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Birthday</label>
                    <input type="date" name="birthday" value="{{ old('birthday', $Employees->birthday ) }}" class="form-control">
                  </div>
                </div>

              </div>
            </div>


          <div class="mb-3">
            <label class="form-label">Personal Photo</label>
            <input type="file" class="form-control" name="personal_photo" >
            <img class=" img-thumbnail mt-2 ms-3 " width="80px" src="{{ asset('Uploads/images/personal_photo/'.$Employees->personal_photo) }}" alt="">

          </div>
          <div class="mb-3">
            <label class="form-label">College Degree</label>
            <input type="file" class="form-control" name="college_degree" >
            <img class=" img-thumbnail mt-2 ms-3 " width="80px" src="{{ asset('Uploads/images/college_degree/'.$Employees->college_degree) }}" alt="">

          </div>
          <div class="mb-3">
          <label class="form-label"> CV </label>
            <input type="file" class="form-control" name="cv" >
            <img class=" img-thumbnail mt-2 ms-3 " width="80px" src="{{ asset('Uploads/images/cv/'.$Employees->cv) }}" alt="">
          </div>


          <div class="form-selectgroup-boxes row mb-3">
            <div class="col-lg-6">
              <label class="form-selectgroup-item">
                <input type="radio" name="report-type" value="1" class="form-selectgroup-input" checked>

                  <span class="form-selectgroup-label-content">

                </span>
              </label>
            </div>
            <div class="col-lg-6">
              <label class="form-selectgroup-item">
                <input type="radio" name="report-type" value="1" class="form-selectgroup-input">

              </label>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-8">

            </div>
            <div class="col-lg-4">
              <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">

                    <option  value=" {{  $Employees->status }}" selected> {{ $Employees->statuse }}</option>
                    @if ( $Employees->status == 'available' )
                    <option value="not_available">Not Available </option>
                    @elseif ($Employees->status == 'not_available')
                    <option  value="available" >Available</option>

                    @endif

                </select>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
            Cancel
          </a>
          <button class="btn btn-primary ms-auto">update</button>

        </form>

        </div>
        </div>
    </div>
</div>

</div>

@stop

