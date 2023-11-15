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
                    <h3 class="text-themecolor"> Post View</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">admin</a></li>
                        <li class="breadcrumb-item">post</li>
                        <li class="breadcrumb-item active">view</li>
                    </ol>
                </div>
                <div class="">
                    {{-- <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button> --}}
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
                <script src="{{asset('contents/admin/assets')}}/plugins/jquery/jquery.min.js"></script>
                <script>
                    $(document).ready(function(){
                        $("p img").css("width",'400px');
                        $("p img").css("height",'auto');
                        $("p img").css("align",'center');
                        $("p img").css("margin-left",'50%');
                        $("p img").css("transform",'translateX(-50%)');
                    });
                </script>
                <div class="row">
                    <div class="col-md-3 ">
                        <div class="card">
                            <div class="card-body ">
                                    <center class="m-t-30" > <img style="border:1px solid gray;" src="{{asset('contents/admin/assets/images/users/5.jpg')}}" class="img-circle" width="150">

                                    <h4 class="card-title m-t-10">{{$select->creator}} post</h4>
                                    {{-- <h6 class="card-subtitle">created at : {{ Carbon\Carbon::createFromFormat('Ymd', $select->created_at)->month }}</h6> --}}
                                    <h6 class="card-subtitle">created at : {{date('h:i:s a m/d/Y', strtotime($select->created_at))}}</h6>
                                    <h5 class="card-subtitle">total view : <span class=" " style="padding: 5px 15px; background:transparent;">{{$select->total_view}}</span></h5>

                                    {{-- status button --}}
                                    @php $i=$select->status; if($i==1) $a = 'display:inline-block;'; else $a ='display:none;';@endphp
                                    <a style="{{$a}}" href="{{route('post_soft_delete',$select->slug)}}" onclick="return confirm('deactive post')" class=" btn btn-outline-success" title="" data-toggle="tooltip" data-original-title="deactive">
                                        Post active
                                    </a>

                                    @php $i=$select->status; if($i==0) $a = 'display:inline-block;'; else $a ='display:none;';@endphp
                                    <a style="{{$a}}" href="{{route('post_restore',$select->slug)}}" onclick="return confirm('active post')" class=" btn btn-outline-danger" title="" data-toggle="tooltip" data-original-title="active">
                                        Post not active
                                    </a>
                                    <br>
                                </center>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card-body">
                                <small class="text-muted">Category </small>
                                <h6>{{$select->category}}</h6>
                                <small class="text-muted">post Heading </small>
                                <h6>{{$select->heading}}</h6>
                                <a href="{{route('post_add_view')}}" class="btn btn-outline-success"> Add post</a>
                                <a href="{{route('post')}}" class="btn btn-outline-info"> All post</a>
                                <a href="{{route('post_update_view',$select->slug)}}" class="btn btn-outline-primary"> Update post</a>
                                <a href="{{route("post_delete",$select->slug)}}" style="margin-top:5px;" class="btn btn-outline-danger"> Delete post</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="text-center">{{$select->heading}}</h2><br><br>
                                {{-- {!!$select->post_head_image!!} --}}
                                <img class="img-fluid" src="{{asset('')}}{{$select->post_head_image}}" alt="{{$select->heading}}">
                                <div style="height: 30px;"></div>
                                {!!$select->description!!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <iframe src="{{$select->video_link}}" frameborder="0" width="100%" height="auto"></iframe>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>

@endsection
