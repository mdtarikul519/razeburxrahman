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
                <div class='row'>
                    <div class="col-md-4">
                        <div class="card">
                            <img class="card-img img-responsive" src="{{asset('contents/admin')}}/assets/images/big/img2.jpg" alt="Card image">
                            <div class="card-img-overlay card-inverse social-profile-first">
                                <img src="{{asset('')}}{{Auth::user()->photo}}" class="img-circle" width="100" />
                                <h4 class="card-title m-t-10">{{Auth::user()->name}}</h4>
                                <h6 class="card-subtitle">Security Expert</h6>
                            </div>
                            <div class="card-body text-center overflow-hidden">
                                <div class="row">
                                    <div class="col">
                                        <h3 class="m-b-0 text-uppercase">{{Auth::user()->rolename->role_name}}</h3>
                                    </div>
                                </div>
                            </div>
                            <div> <hr> </div>
                            <div class="card-body"> <small class="text-muted">Email address </small>
                                <h6>{{Auth::user()->email}}</h6>

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
                    {{-- update part --}}
                    <div class='col-md-6'>
                        <div class='card'>
                            <div class='card-body'>
                                <form class='form p-t-20 form-material' novalidate enctype='multipart/form-data' method='POST' action="{{route('user_setting_change',$view->slug)}}">
                                    @csrf
                                    <div class='form-group'>
                                        <div class='input-group'>
                                            <label for='name'>Name:</label>
                                        </div>
                                        <div class='input-group'>
                                            <input name='name' value='{{$view->name}}' autofocus class='form-control text-lower' id='exampleInputuname' placeholder='name'>
                                        </div>
                                    </div>

                                    <div class='form-group'>
                                        <div class='input-group'>
                                            <label for='name'>Email:</label>
                                        </div>
                                        <div class='input-group'>
                                            <input name='email' value='{{$view->email}}' autofocus class='form-control text-lower' id='exampleInputuname' placeholder='email'>
                                        </div>
                                    </div>
                                    <div class='form-group' {{ $errors->has('password') ? 'has-error' : ''}}>
                                        <div class='input-group'>
                                            <label for='name'>Old Password:</label>
                                        </div>
                                        <div class='input-group'>
                                            <input name='password' type="password" value='{{old("password")}}' autofocus class='form-control text-lower' id='exampleInputuname' placeholder='password'>
                                        </div>
                                        {!! $errors->first('password', '<p class="help-block" style="color:red">password did not match to current password!!</p>') !!}
                                    </div>

                                    <div class='form-group'>
                                        <div class='input-group'>
                                            <label for='name'>New Password:</label>
                                        </div>
                                        <div class='input-group'>
                                            <input name='newpassword' type="password" value='' autofocus class=' form-control text-lower' id='exampleInputuname' placeholder='password'>
                                        </div>
                                    </div>

                                    <div class='form-group'>
                                        <div class='input-group'>
                                            <label for='name'>Photo:</label>
                                        </div>
                                        <div class='input-group'>
                                            <input name='photo' value='' type="file" autofocus class='form-control text-lower' id='exampleInputuname' placeholder='input'>
                                        </div>
                                    </div>

                                    <button type='submit' class='btn btn-outline-success text-capitalize waves-effect waves-light m-r-10'>update information</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>

@endsection
