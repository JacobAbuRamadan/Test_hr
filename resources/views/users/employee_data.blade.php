@extends('pages._layouts.dashboard.master')

@section('user_data')
<style>
    .contaner{
        width: 80%;
        margin: 10px auto;
    }
</style>
<body>


    <div class="table-responsive contaner">
<table class="table card-table table-vcenter text-nowrap datatable">
        <tr>
            <th>Data</th>
            <th>Information</th>
        </tr>
    @foreach ($Employee as $Employee )
    <tr>
    <th>User Name :</th>
    <td> {{ $user->name }}</td>
    </tr>
    <tr>
    <tr>
    <th>User Type :</th>
    <td> {{ $user->type }}</td>
    </tr>
    <tr>
    <th>University :</th>
    <td> {{ $Employee->university }}</td>
    </tr>

    <tr>
    <th>Major : </th>
    <td> {{ $Employee->major }}</td>
    </tr>
    <tr>
    <th>Phone Num : </th>
    <td> {{ $Employee->phone_num }}</td>
    <tr>
    <th>Birthday : </th>
    <td> {{ $Employee->birthday }}</td>
    <tr>
    <th>Graduation Year : </th>
    <td> {{ $Employee->graduation_year }}</td>
    <tr>
    <th>Adress : </th>
    <td> {{ $Employee->adress }}</td>
    <tr>
    <th>Status : </th>
    <td>
        @if ($Employee->statuse == 'Available')
        <span class="badge bg-success me-1"></span> {{$Employee->statuse}}
        @else
        <span class="badge bg-danger me-1"></span> {{$Employee->statuse}}
        @endif
      </td>
    </tr>

    <tr>
        <th>Personal Photo : </th>
        <td><img width="100px" src="{{ asset('Uploads/images/personal_photo/'.$Employee->personal_photo) }}" alt=""></td>
    </tr>
    <tr>
        <th>College Degree : </th>
        <td><img width="100px" src="{{ asset('Uploads/images/college_degree/'.$Employee->college_degree) }}" alt=""></td>
    </tr>
    <tr>
        <th>CV : </th>
        <td><img width="100px" src="{{ asset('Uploads/images/cv/'.$Employee->cv) }}" alt=""></td>
    </tr>


{{--
    <th>personal_photo</th>
    <th>college_degree	</th>
    <th>cv</th> --}}







    @endforeach
</table>

</div>

@stop
</body>
</html>
