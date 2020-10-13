{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
{{--    <title>Laravel 7 CRUD using Datatables</title>--}}
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />--}}
{{--    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">--}}
{{--    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">--}}
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>--}}
{{--    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>--}}
{{--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>--}}
{{--    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>--}}

{{--    <script>--}}
{{--        error=false--}}

{{--        function validate()--}}
{{--        {--}}
{{--            if(document.userForm.name.value !='' && document.userForm.email.value !='' )--}}
{{--                document.userForm.btnsave.disabled=false--}}
{{--            else--}}
{{--                document.userForm.btnsave.disabled=true--}}
{{--        }--}}
{{--    </script>--}}

{{--</head>--}}
{{--<body>--}}

@extends('admin.layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tables</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <a class="btn btn-success mb-5" href="{{Route('userCreate')}}" style="margin-bottom: 5px" >New User</a>

            <div class="panel panel-default">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-report table-report--bordered display w-full data-table" >
                            <thead>
                            <tr>
                                <th class="border-b-2 whitespace-no-wrap">No</th>
                                <th class="border-b-2 whitespace-no-wrap">Id</th>
                                <th class="border-b-2 whitespace-no-wrap">Name</th>
                                <th class="border-b-2 whitespace-no-wrap">Email</th>
                                <th class="border-b-2 whitespace-no-wrap">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                    </div>

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
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
                            <tr height="50px"><td><strong>Name:</strong></td><td id="sname"></td></tr>
                            <tr height="50px"><td><strong>Email:</strong></td><td id="semail"></td></tr>

                            <tr><td></td><td style="text-align: right "><button data-dismiss="modal" class="btn btn-info">close</button> </td></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--</body>--}}

<script type="text/javascript">

    $(document).ready(function () {

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('users.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
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
                $('#user_id').val(data.user.id);
                $('#name').val(data.user.name);
                $('#email').val(data.user.email);

            })
        });
        /* Show customer */
        $('body').on('click', '#show-user', function () {
            var user_id = $(this).data('id');
            $.get('users/'+user_id, function (data) {
                $('#sname').html(data.user.name);
                $('#semail').html(data.user.email);

            })
            $('#userCrudModal-show').html("User Details");
            $('#crud-modal-show').modal('show');
        });

        /* Delete customer */
        $('body').on('click', '#delete-user', function () {
            var user_id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");
            confirm("Are You sure want to delete !");

            $.ajax({
                type: "DELETE",
                url: "{{route('usersDestroy')}}",
                data: {
                    "id": 'asdasdsa',
                    "_token": token,
                },
                success: function (data) {
                    console.log(data)
                    // table.ajax.reload();
                },
                error: function (data) {
                    console.log({{$errors}})
                }
            });
        });

    });

</script>
@endsection()
{{--</html>--}}