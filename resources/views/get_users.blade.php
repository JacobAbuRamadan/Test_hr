{{-- <!DOCTYPE html>
<html> --}}
@extends('pages._layouts.dashboard.master')
@section('content')
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
error=false

function validate()
{
if(document.userForm.name.value !='' && document.userForm.email.value !='' )
document.userForm.btnsave.disabled=false
else
document.userForm.btnsave.disabled=true
}
</script>
</head>
<body>

<div class="container">
<br/>
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-right">
<a class="btn btn-success mb-2" id="new-user" data-toggle="modal">New User</a>
</div>
</div>
</div>

<table class="table table-bordered data-table" >
<thead>
<tr id="">
<th width="5%">Id</th>
<th width="30%">Name</th>
<th width="30%">Email</th>
{{-- <th width="30%">password</th> --}}
<th width="30%">type</th>
{{-- <th width="20%">Action</th> --}}
</tr>
</thead>
<tbody>
</tbody>
</table>
</div>

<!-- Add and Edit customer modal -->
<div class="modal fade" id="crud-modal" aria-hidden="true" >
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="userCrudModal"></h4>
</div>
<div class="modal-body">
<form name="userForm" action="{{ route('yajra.store') }}" method="POST">
@csrf
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Name:</strong>
<input type="text" name="name" id="name" class="form-control" placeholder="Name" onchange="validate()" >
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Email:</strong>
<input type="text" name="email" id="email" class="form-control" placeholder="Email" onchange="validate()">
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>password:</strong>
<input type="password" name="password" id="password" class="form-control" placeholder="password" onchange="validate()">
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>type:</strong>
<div class="mb-3">
    <select name="type" class="form-select">
      <option  value="employee" selected>Employee</option>
    </select>
  </div>
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 text-center">
<button type="submit" id="btn-save" name="btnsave" class="btn btn-primary" disabled>Save</button>
<a href="{{ route('yajra.index') }}" class="btn btn-danger">Cancel</a>
</div>
</div>
</form>
</div>
</div>
</div>
</div>

<!-- Show user modal -->
<div class="modal fade" id="crud-modal-show" aria-hidden="true" >
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="userCrudModal-show"></h4>
</div>
<div class="modal-body">
<div class="row">
<div class="col-xs-2 col-sm-2 col-md-2"></div>
<div class="col-xs-10 col-sm-10 col-md-10 ">

<table class="table-responsive ">
<tr height="50px"><td><strong>id:</strong></td><td id="sid"></td></tr>
<tr height="50px"><td><strong>Name:</strong></td><td id="sname"></td></tr>
<tr height="50px"><td><strong>Email:</strong></td><td id="semail"></td></tr>
<tr height="50px"><td><strong>password:</strong></td><td id="spassword"></td></tr>
<tr height="50px"><td><strong>type:</strong></td><td id="stype"></td></tr>

<tr><td></td><td style="text-align: right "><a href="{{ route('yajra.index') }}" class="btn btn-danger">OK</a> </td></tr>
</table>
</div>
</div>
</div>
</div>
</div>
</div>

</body>

<script type="text/javascript">

$(document).ready(function () {

var table = $('.data-table').DataTable({
processing: true,
serverSide: true,
ajax: "{{ route('get.users') }}",
columns: [
{data: 'id', name: 'id'},
{data: 'name', name: 'name'},
{data: 'email', name: 'email'},
{data: 'type', name: 'type'},
// {data: 'action', name: 'action', orderable: false, searchable: false},
]
});

/* When click New customer button */
$('#new-user').click(function () {
$('#btn-save').val("create-user");
$('#user').trigger("reset");
$('#userCrudModal').html("Add New User");
$('#crud-modal').modal('show');
});

/* Edit customer */
$('body').on('click', '#edit-user', function () {
var user_id = $(this).data('id');
$.get('users/'+user_id+'/edit', function (data) {
$('#userCrudModal').html("Edit User");
$('#btn-update').val("Update");
$('#btn-save').prop('disabled',false);
$('#crud-modal').modal('show');
$('#user_id').val(data.id);
$('#name').val(data.name);
$('#email').val(data.email);


})
});
/* Show customer */
$('body').on('click', '#show-user', function () {
var user_id = $(this).data('id');
$.get('users/'+user_id, function (data) {

$('#sname').html(data.name);
$('#semail').html(data.email);
$('#spassword').html(data.password);
$('#stype').html(data.type);

})
$('#userCrudModal-show').html("User Details");
$('#crud-modal-show').modal('show');
});

/* Delete customer */
$('body').on('click', '#delete-user', function () {
var user_id = $(this).data("id");
var token = $("meta[name='csrf-token']").attr("content");
confirm("Are You sure want to delete !");
s$.ajax({
type: "DELETE",
// url: "http://localhost/laravelpro/public/users/"+user_id,
url: "http://127.0.0.1:8000/dashboard"+user_id,
data: {
"id": user_id,
"_token": token,
},
success: function (data) {

//$('#msg').html('Customer entry deleted successfully');
//$("#customer_id_" + user_id).remove();
table.ajax.reload();
},
error: function (data) {
console.log('Error:', data);
}
});
});

});

</script>
@stop
</html>



{{--
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel DataTables Editor</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.0/css/buttons.bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.4/css/select.bootstrap.min.css">
        <link rel="stylesheet" href="/plugins/editor/css/dataTables.editor.css">
        <link rel="stylesheet" href="/plugins/editor/css/editor.bootstrap.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.0/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/select/1.2.4/js/dataTables.select.min.js"></script>
        <script src="{{asset('plugins/editor/js/dataTables.editor.js')}}"></script>

        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.0/js/buttons.bootstrap.min.js"></script>

        <script src="{{asset('plugins/editor/js/editor.bootstrap.min.js')}}"></script>
    </head>
    <body>
        <div class="container">
            {{$dataTable->table(['id' => 'users'])}}
        </div>

        <script>
            $(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}'
                    }
                });

                var editor = new $.fn.dataTable.Editor({
                    ajax: "/users",
                    table: "#users",
                    display: "bootstrap",
                    fields: [
                        {label: "Name:", name: "name"},
                        {label: "Email:", name: "email"},
                        {label: "Password:", name: "password", type: "password"}
                    ]
                });

                $('#users').on('click', 'tbody td:not(:first-child)', function (e) {
                    editor.inline(this);
                });

                {{$dataTable->generateScripts()}}
            })
        </script>
    </body>
</html> --}}
