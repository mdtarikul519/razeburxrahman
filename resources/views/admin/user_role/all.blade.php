@extends('layouts.admin')
@section('contents')
<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">User Role</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
                <li class="breadcrumb-item active">user role</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">


{{-- edit part start --}}

<div class="container-fluid">
    @if(Session::has('success'))
       <script>
             swal({title: "Success!", text: "Successfully done !", icon: "success",timer:5000});
       </script>
    @endif
    @if(Session::has('error'))
       <script>
             swal({title: "error!", text: "insert failed ! use unique serial no", icon: "warning",timer:7000});
       </script>
    @endif
    <div class="row">
        <div class="col-md-5">
            <div class="card-body all-user">
                <table id="dt-example-responsive" class="table table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>role serial</th>
                            <th>role name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all as $data)
                        <tr>
                            <td>{{$data->role_serial}}</td>
                            <td>{{$data->role_name}}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <script type="text/javascript">
                    document.addEventListener("DOMContentLoaded", function() {
                        app._loading.show($("#dt-ext-responsive"), {
                            spinner: true
                        });
                        $("#dt-example-responsive").DataTable({
                            "responsive": false,
                            "initComplete": function(settings, json) {
                                setTimeout(function() {
                                    app._loading.hide($("#dt-ext-responsive"));
                                }, 1000);
                            }
                        });
                    });

                </script>
            </div>
        </div>
        <div class='col-md-4' style="">
            <div class='card'>
                <div class='card-body'>
                    <form class='form p-t-20' enctype='multipart/form-data' method='POST' action="{{route('user_role_add')}}">
                        @csrf

                        <div class='form-group'>
                            <div class='input-group'>
                                <label for='name'>Role name</label>
                            </div>
                            <div class='input-group'>
                                <div class='input-group-addon'><i class='ti ti-pencil'></i></div>
                                <input name='name' value='' class='form-control text-lower' id='exampleInputuname' placeholder='input'>
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='input-group'>
                                <label for='name'>Role serial</label>
                            </div>
                            <div class='input-group'>
                                <div class='input-group-addon'><i class='ti ti-pencil'></i></div>
                                <input name='serial' value='' class='form-control text-lower' id='exampleInputuname' placeholder='input'>
                            </div>
                        </div>

                        <button type='submit' class='btn btn-outline-success text-capitalize waves-effect waves-light m-r-10'>Add new Role</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class='row' style='margin-top:30px;'>
        @foreach ($all as $data)
        <div class='col-md-4'>
            <div class='card'>
                <div class='card-body'>
                    <form class='form p-t-20' enctype='multipart/form-data' method='POST' action="{{route('user_role_update',$data->slug)}}">
                        @csrf

                        <div class='form-group'>
                            <div class='input-group'>
                                <label for='name'>Role name</label>
                            </div>
                            <div class='input-group'>
                                <div class='input-group-addon'><i class='ti ti-pencil'></i></div>
                                <input name='name' value='{{$data->role_name}}' class='form-control text-lower' id='exampleInputuname' placeholder='input'>
                            </div>
                        </div>
                        <button type='submit' class='btn btn-outline-success text-capitalize waves-effect waves-light m-r-10'>update Role</button>
                        <a class="btn btn-outline-danger text-capitalize waves-effect waves-light m-r-10" href="{{route('user_role_delete',$data->slug)}}">Delete</a>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>




</div>
@endsection
