

@section('add_hr_content')


<div class="modal modal-blur fade" id="modal-report2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">New Employee</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form class="mt-4" action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="modal-body">

            <div class="modal-body">
                <div class="mb-3">
                  <label class="form-label">Name</label>
                  <input type="text" class="form-control  @error('name') is-invalid @enderror " name="name" placeholder="Enter Employee Name">
                  @error('name')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
                </div>
            <div class="mb-3">
              <label class="form-label">Employee Email</label>
              <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter Employee Email">
              @error('email')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
            </div>
              <label class="form-label">Employee password</label>
              <div class="Generate_password">
                <input class="form-control @error('password') is-invalid @enderror" type="text" name="password" placeholder="Create password" id="password" readonly >
                @error('password')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
                    <div id="button" class="btn1"onclick="genPassword()">Generate</div>
            </div>

        <div class="col-lg-4 mt-3">
          <div class="mb-3">
            <label class="form-label">Type</label>
            <select name="type" class="form-select">
              <option  value="hr" selected> HR</option>
            </select>
          </div>
        </div>

        <input type="text" name="role_id" value="2" hidden>


        <div class="modal-footer">
          <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
            Cancel
          </a>
          <button  class="btn btn-primary ms-auto" >add</button>

        </div>
      </div>
    </div>
    </div>

    </form>

@stop
