@section('add_content')



<div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
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
              <option  value="employee" selected>Employee</option>
            </select>
          </div>
        </div>





          <div class="mb-3">
            <label class="form-label">University</label>
            <input type="text" " name="university" class="form-control @error('university') is-invalid @enderror  placeholder="university name">
            @error('university')
            <span class="invalid-feedback">{{ $message }}</span>
          @enderror

          </div>
          <div class="mb-3">
            <label class="form-label">Major</label>
            <input type="text" class="form-control  @error('major') is-invalid @enderror" name="major" placeholder="Major name">
            @error('major')
            <span class="invalid-feedback">{{ $message }}</span>
          @enderror
          </div>
          <div class="mb-3">
            <label class="form-label">Adress</label>
            <input type="text" class="form-control @error('adress') is-invalid @enderror" name="adress" placeholder="adress">
            @error('adress')
            <span class="invalid-feedback">{{ $message }}</span>
          @enderror
          </div>
          <div class="mb-3">
            <label class="form-label">Phone Num</label>
            <input type="number" value="059" class="form-control @error('phone_num') is-invalid @enderror " name="phone_num" placeholder="phone num">
            @error('phone_num')
            <span class="invalid-feedback">{{ $message }}</span>
          @enderror
          </div>

          <div class="modal-body">
              <div class="row">

                <div class="col-lg8">
                  <div class="mb-3">
                    <label class="form-label">Graduation Year</label>
                    <input type="date" name="graduation_year" class="form-control  @error('graduation_year') is-invalid @enderror">
                    @error('graduation_year')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Birthday</label>
                    <input type="date" name="birthday"  class="form-control @error('birthday') is-invalid @enderror">
                    @error('birthday')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                  </div>
                </div>

              </div>
            </div>


          <div class="mb-3">
            <label class="form-label">Personal Photo</label>
            <input type="file" class="form-control @error('personal_photo') is-invalid @enderror" name="personal_photo" >
            @error('personal_photo')
            <span class="invalid-feedback">{{ $message }}</span>
          @enderror
          </div>
          <div class="mb-3">
            <label class="form-label">College Degree</label>
            <input type="file" class="form-control @error('college_degree') is-invalid @enderror" name="college_degree" >
            @error('college_degree')
            <span class="invalid-feedback">{{ $message }}</span>
          @enderror
          </div>
          <div class="mb-3">
          <label class="form-label"> CV </label>
            <input type="file" class="form-control @error('cv') is-invalid @enderror" name="cv" >
            @error('cv')
            <span class="invalid-feedback">{{ $message }}</span>
          @enderror
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
                  <option  value="available" selected>Available</option>
                  <option value="not_available" >Not Available</option>
                </select>
              </div>
            </div>
          </div>
        </div>

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
