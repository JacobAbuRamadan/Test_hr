@extends('pages._layouts.dashboard.master')

@section('edit_content')



<div  id="modal-report" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update Employee</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>


        <form class="mt-4" action="{{ route('admins.update', $user->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
         @method('put')


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
                <option  value="{{ $user->type }}" selected> HR</option>
              </select>
            </div>
          </div>

          <input type="text" name="role_id" value="2" hidden>

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

