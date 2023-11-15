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
                    <h3 class="text-themecolor">All trash Message</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">admin</a></li>
                        <li class="breadcrumb-item">massage</li>
                        <li class="breadcrumb-item active">all trash</li>
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
                                            <li class="list-group-item "> <a href="{{url('/admin/message')}}"><i class="mdi mdi-gmail"></i> Inbox </a><span class="badge badge-primary ml-auto">{{$count}}</span></li>

                                            <li class="list-group-item active">
                                            <a href="{{url('/admin/message')}}"> <i class="mdi mdi-delete"></i> Trash </a><span class="badge badge-success ml-auto">{{$countTrash}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xlg-10 col-lg-9 col-md-8 bg-light-part b-l">
                                    <form action="{{ url("/admin/message/hard_delete_multiple/{id}")}}" method="post">
                                        {!! csrf_field() !!}
                                        <div class="card-body">
                                            <div class="btn-group m-b-10 m-r-10" role="group" aria-label="Button group with nested dropdown">
                                                <button type="button" class="btn btn-secondary font-18"><i class="mdi mdi-inbox-arrow-down"></i></button>
                                                <button type="button" class="btn btn-secondary font-18"><i class="mdi mdi-alert-octagon"></i></button>
                                                <button type="submit" class="btn btn-secondary font-18"><i class="mdi mdi-delete"></i></button>
                                            </div>
                                        </div>
                                        <div class="card-body p-t-0">
                                            <div class="card b-all shadow-none">
                                                <div class="inbox-center table-responsive">
                                                    <table class="table table-hover no-wrap">
                                                        <tbody>

                                                            @foreach ($all as $data)
                                                                <tr class="unread">
                                                                    <td style="width:40px">
                                                                        <div class="checkbox">
                                                                            <input type="checkbox" id="checkbox{{$data->id}}" value="{{$data->id}}" name="delete_multiple[]">
                                                                            <label for="checkbox{{$data->id}}"></label>
                                                                        </div>
                                                                    </td>
                                                                    <td style="width:40px" class="hidden-xs-down"><i class="fa fa-star-o text-warning"></i></td>
                                                                    <td class="hidden-xs-down">{{$data->name}}</td>
                                                                    <td class="max-texts">
                                                                        <a href="{{url('/admin/message/view/'.$data->slug)}}"
                                                                        title="{{$data->email}}( visit full massage )">
                                                                        <span class="label label-info m-r-10">{{str_limit($data->subject,40)}}</span>
                                                                        {{Str::limit($data->message,40)}}
                                                                    </td>
                                                                    <td class="hidden-xs-down"><i class="fa fa-paperclip"></i></td>
                                                                    <td class="text-right"> {{$data->created_at->format('M - D - Y | g:i:s A')}} </td>
                                                                </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme working">4</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                                <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a></li>
                            </ul>
                            <ul class="m-t-20 chatonline">
                                <li><b>Chat option</b></li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{asset('contents/admin/assets')}}/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{asset('contents/admin/assets')}}/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{asset('contents/admin/assets')}}/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{asset('contents/admin/assets')}}/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{asset('contents/admin/assets')}}/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{asset('contents/admin/assets')}}/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{asset('contents/admin/assets')}}/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{asset('contents/admin/assets')}}/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>

@endsection
