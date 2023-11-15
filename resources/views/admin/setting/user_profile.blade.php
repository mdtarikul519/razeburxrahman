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
                    <h3 class="text-themecolor"> Settings</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">admin</a></li>
                        <li class="breadcrumb-item">user</li>
                        <li class="breadcrumb-item active">settings</li>
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
                    <!-- Column -->
                    <div class="col-md-6 m-auto">
                        <div class="card">
                            <img class="card-img img-responsive" src="{{asset('contents/admin')}}/assets/images/big/img2.jpg" alt="Card image">
                            <div class="card-img-overlay card-inverse social-profile-first">
                                <img src="{{asset('')}}{{$select->photo}}" class="img-circle" width="150" />
                                <h4 class="card-title m-t-10">{{$select->name}}</h4>
                                <h6 class="card-subtitle">Security Expert</h6>
                            </div>
                            <div class="card-body text-center overflow-hidden">
                                <div class="row">
                                    <div class="col">
                                        <h3 class="m-b-0 text-uppercase">{{$select->rolename->role_name}}</h3>
                                    </div>
                                </div>
                            </div>
                            <div> <hr> </div>
                            <div class="card-body"> <small class="text-muted">Email address </small>
                                <h6>{{$select->email}}</h6>

                                <div class="map-box">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3653.4536018289914!2d90.4463185154596!3d23.695490396787687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b9df184f29ef%3A0x9e8e35a5a75eda29!2sPaterbag+Jame+Masjid!5e0!3m2!1sen!2sbd!4v1564493152496!5m2!1sen!2sbd"  frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div> <small class="text-muted p-t-30 db">Social Profile</small>
                                <br/>
                                @php
                                    $select=App\Models\personalinfo::where('status',1)->get();
                                @endphp
                                    @foreach ($select as $item)
                                    <a href="{{$item->link}}" class="btn btn-circle btn-secondary"><i class="{{$item->icon}}"></i></a>
                                    @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>

@endsection
