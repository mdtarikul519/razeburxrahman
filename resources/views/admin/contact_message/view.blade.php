@extends('layouts.admin')
@section('contents')
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Email details</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">Apps</li>
                        <li class="breadcrumb-item active">Email details</li>
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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="row">
                                <div class="col-xlg-2 col-lg-3 col-md-4">
                                    <div class="card-body inbox-panel"><a href="app-compose.html" class="btn btn-danger m-b-20 p-10 btn-block waves-effect waves-light">Compose</a>
                                        <ul class="list-group list-group-full">
                                            <li class="list-group-item">
                                                <a href="{{ url('/admin/message') }}">
                                                <i class="mdi mdi-gmail"></i> Inbox </a>
                                                <span class="badge badge-primary ml-auto">{{$count}}</span>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="{{route('message_trash')}}"> <i class="mdi mdi-delete"></i> Trash </a>
                                                <span class="badge badge-success ml-auto">{{$countTrash}}</span>
                                            </li>
                                        </ul>
                                     </div>
                                </div>
                                <div class="col-xlg-10 col-lg-9 col-md-8 bg-light-part b-l">

                                    <div class="card-body">
                                        <div class="card b-all shadow-none">
                                            <div class="card-body">
                                                {{-- before must use primary key in contact.php --}}
                                                <h3 class="card-title m-b-0">{{$data->subject}}</h3>
                                            </div>
                                            <div>
                                                <hr class="m-t-0">
                                            </div>
                                            <div class="card-body">
                                                <div class="d-flex m-b-40">
                                                    <div>
                                                        <a href="javascript:void(0)"><img src="{{asset('contents/admin/assets')}}/images/users/1.jpg" alt="user" width="40" class="img-circle" /></a>
                                                    </div>
                                                    <div class="p-l-10">
                                                        <h4 class="m-b-0">{{$data->name}}</h4>
                                                        <small class="text-muted">From: {{$data->email}}</small>
                                                    </div>
                                                </div>
                                                <p><b>Dear Admin</b></p>
                                                <p>{{$data->message}}</p>
                                            </div>
                                            <div>
                                                <hr class="m-t-0">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Page Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            @endsection
