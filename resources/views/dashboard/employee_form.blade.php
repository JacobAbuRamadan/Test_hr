@extends('pages._layouts.dashboard.master')
@include('dashboard.add_hr')
@include('dashboard.add_employee')


@section('content')


@if (session('msg'))
    <div class="alert alert-success">
        <p class="m-0">{{ session('msg') }}</p>
    </div>
@endif

@if (session('dmsg'))
    <div class="alert alert-danger">
        <p class="m-0">{{ session('dmsg') }}</p>
    </div>
@endif


<div class="page-wrapper">
  <div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <div class="page-pretitle">
            Overview
          </div>
          <h2 class="page-title">
            Dashboard
          </h2>
        </div>
        <!-- Page title actions -->
        <div class="col-12 col-md-auto ms-auto d-print-none">
          <div class="btn-list">
           @if (Auth::user()->type == 'super-admin')

           <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report2">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
            Add HR

          </a>
          </span>
@yield('add_hr_content')

           @endif



           @if (Auth::user()->type == 'hr')
           <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
              <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
              Add New Employee
            </a>
            @endif
            <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
              <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="page-body">
    <div class="container-xl">
      <div class="row row-deck row-cards">
        <div class="col-sm-6 col-lg-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="subheader">Users Count</div>
                <div class="ms-auto lh-1">
                  <div class="dropdown">


                  </div>
                </div>
              </div>

    @if (Auth::user()->type == 'super-admin')
      <div class="h1 mb-2">  {{ $UsersCount = count($users) .' Users'; }}</div>

      {{-- {{ $users= $users->type=='hr'; }} --}}

      <div class="h1 mb-2">  {{ $HRCount = count($users) .' HR'; }}</div>
    @endif
      {{-- ->type =='hr' --}}

      <div class="h1 mb-2">  {{ $EmployeeCount = count($Employees) .' Employees'; }}</div>



              <div class="d-flex mb-2">
                <div class="ms-auto">

                </div>
              </div>

            </div>
          </div>
        </div>




















        @if (Auth::user()->type == 'super-admin')


        <div class="col-12">
            <div class="card">
              <div class="card-header">



                <h3 class="card-title">Users Table</h3>
              </div>
              <div class="card-body border-bottom py-3">
                <div class="d-flex">
                  <div class="text-muted">
                    Show
                    <div class="mx-2 d-inline-block">
                      <input type="text" class="form-control form-control-sm" value="8" size="3" aria-label="Invoices count">
                    </div>
                    entries
                  </div>
                  <div class="ms-auto text-muted">
                    Search:
                    <div class="ms-2 d-inline-block">
                      <input type="text" class="form-control form-control-sm" aria-label="Search invoice">
                    </div>
                  </div>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                  <thead>
                    <tr>

                      <th class="w-1"><input  class="select_all" type="checkbox" id="select_all" aria-label="Select all invoices"></th>


                      <th class="w-1">No. <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm text-dark icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="6 15 12 9 18 15" /></svg>
                      </th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Type</th>
                      <th>Actions</th>


                    </tr>
                  </thead>




                    @foreach ($users as $user)
                    <tr>
                      <td><input  class="select_item" type="checkbox" name="select_item" aria-label="Select invoice" value="{{$user->id}}"></td>

                      <td><span class="text-muted">{{$user->id}}</span></td>
                      {{-- <td><a href="#" class="text-reset" tabindex="-1">

                  </a>
                </td> --}}

                      <td>
                        {{$user->name}}
                      </td>
                      <td>
                        {{$user->email}}

                      </td>
                      <td>
                        {{$user->type}}

                      </td>

                      <td  class="text-end">
                        <span @if ($user->type!=='hr')
                            hidden
                          @endif class="dropdown">
                          <button  class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                          <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="{{ route('employees.edit',$user->id) }}">
                              Edit
                            </a>
                            <a class="dropdown-item" href="#">
                                <form  action="{{ route('employees.destroy',$user->id) }}" method="POST" >
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('Are you sure ?')" class="dropdown-item">Delete</button>
                                </form>
                            </a>
                          </div>
                        </span>
                      </td>

                      @endforeach

                </table>


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>





@endif















        <div class="col-12">
          <div class="card">
            <div class="card-header">



              <h3 class="card-title">Employees Table</h3>
            </div>
            <div class="card-body border-bottom py-3">
              <div class="d-flex">
                <div class="text-muted">
                  Show
                  <div class="mx-2 d-inline-block">
                    <input type="text" class="form-control form-control-sm" value="8" size="3" aria-label="Invoices count">
                  </div>
                  entries
                </div>
                <div class="ms-auto text-muted">
                  Search:
                  <div class="ms-2 d-inline-block">
                    <input type="text" class="form-control form-control-sm" aria-label="Search invoice">
                  </div>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table card-table table-vcenter text-nowrap datatable">
                <thead>
                  <tr>

                    <th class="w-1"><input  class="select_all" type="checkbox" id="select_all" aria-label="Select all invoices"></th>


                    <th class="w-1">No. <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm text-dark icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="6 15 12 9 18 15" /></svg>
                    </th>
                    <th>Name</th>
                    <th>University</th>
                    <th>Major</th>
                    <th>Graduation Year</th>
                    <th>Status</th>
                    <th>Phone Num</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>



                  @foreach ($Employees as $Employee)
                  <tr>
                    <td><input  class="select_item" type="checkbox" name="select_item" aria-label="Select invoice" value="{{$Employee->id}}"></td>

                    <td><span class="text-muted">{{$Employee->id}}</span></td>
                    <td><a href="#" class="text-reset" tabindex="-1">

                        @foreach ($users as $user )
                        @if( $Employee->user_id == $user->id )
                        {{ $user->name }}
                       @endif
                       @endforeach


                </a></td>

                    <td>
                      {{$Employee->university}}
                    </td>
                    <td>
                      {{$Employee->major}}

                    </td>
                    <td>
                      {{$Employee->graduation_year}}

                    </td>

                    <td>
                      @if ($Employee->statuse == 'Available')
                      <span class="badge bg-success me-1"></span> {{$Employee->statuse}}
                      @else
                      <span class="badge bg-danger me-1"></span> {{$Employee->statuse}}
                      @endif
                    </td>

                    <td>{{$Employee->phone_num}}</td>
                    <td class="text-end">
                      <span class="dropdown">
                        <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                        <div class="dropdown-menu dropdown-menu-end">
                          <a class="dropdown-item" href="{{ route('employees.edit',$Employee->id) }}">
                            Edit
                          </a>
                          <a class="dropdown-item" href="#">
                              <form  action="{{ route('employees.destroy',$Employee->id) }}" method="POST" >
                                  @csrf
                                  @method('delete')
                                  <button onclick="return confirm('Are you sure ?')" class="dropdown-item">Delete</button>
                              </form>
                          </a>
                        </div>
                      </span>
                    </td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
            </div>
            <div class="card-footer d-flex align-items-center">

              <ul class="pagination m-0 ms-auto">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                    <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="15 6 9 12 15 18" /></svg>
                    prev
                  </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active"><a class="page-link" href="#">2</a></li>

                <li class="page-item">
                  <a class="page-link" href="#">
                    next <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="9 6 15 12 9 18" /></svg>
                  </a>

                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>






@yield('add_content')

@stop
