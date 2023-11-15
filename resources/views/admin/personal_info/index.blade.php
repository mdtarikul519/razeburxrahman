@extends('layouts.admin')
@section('contents')
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">social links section</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">admin</a></li>
                        <li class="breadcrumb-item">personal</li>
                        <li class="breadcrumb-item active">social links</li>
                    </ol>
                </div>
                <div class="">
                    <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">

                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                @if(Session::has('success'))
                   <script>
                         swal({title: "Success!", text: "Successfully done !", icon: "success",timer:5000});
                   </script>
                @endif

                <div class='row d-none'>
                    <div class='col-md-4'>
                        <div class='card'>
                            <div class='card-body'>
                                <form class='form p-t-20' enctype='multipart/form-data' method='POST' action="{{route('social_link_add')}}">
                                    @csrf
                                    <div class='form-group'>
                                        <div class='input-group'>
                                            <label for='name'>Icon <sub>check sidebar and choose font awesome icon class</sub></label>
                                        </div>
                                        <div class='input-group'>
                                            <div class='input-group-addon'><i class='ti ti-pencil'></i></div>
                                            <input name='icon' value='fa fa-' class='form-control text-lower' id='exampleInputuname' placeholder='fa fa-facebook'>
                                        </div>
                                    </div>
                                    <div class='form-group'>
                                        <div class='input-group'>
                                            <label for='name'>link</label>
                                        </div>
                                        <div class='input-group'>
                                            <div class='input-group-addon'><i class='ti ti-pencil'></i></div>
                                            <input name='link' value='' class='form-control text-lower' id='exampleInputuname' placeholder='ex:facebook.com'>
                                        </div>
                                    </div>
                                    <button type='submit' class='btn btn-outline-success text-capitalize waves-effect waves-light m-r-10'>add new</button>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class='row'>
                    @foreach ($select as $select)
                        <div class='col-md-4'>
                            <div class='card'>
                                <div class='card-body'>
                                    <form class='form p-t-20' enctype='multipart/form-data' method='POST' action="{{route('social_link_update',$select->slug)}}">
                                        @csrf
                                        <div class='form-group'>
                                            <div class='input-group'>
                                                <label for='name'>Icon <sub>check sidebar and choose font awesome icon class</sub></label>
                                            </div>
                                            <div class='input-group'>
                                                <div class='input-group-addon'><i class='{{$select->icon}}'></i></div>
                                                <input name='icon' value='{{$select->icon}}' class='form-control text-lower' id='exampleInputuname' placeholder='fa fa-facebook'>
                                            </div>
                                        </div>
                                        <div class='form-group'>
                                            <div class='input-group'>
                                                <label for='name'>link</label>
                                            </div>
                                            <div class='input-group'>
                                                <div class='input-group-addon'><i class='{{$select->icon}}'></i></div>
                                                <input name='link' value='{{$select->link}}' class='form-control text-lower' id='exampleInputuname' placeholder='ex:facebook.com'>
                                            </div>
                                        </div>
                                        <button type='submit' class='btn btn-outline-success text-capitalize waves-effect waves-light m-r-10'>Upadate</button>
                                        <a href='{{route('social_link_delete',$select->slug)}}' class='btn d-none btn-outline-danger text-capitalize waves-effect waves-light m-r-10'>Delete</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>

@endsection
