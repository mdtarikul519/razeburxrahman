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
                    <h3 class="text-themecolor">All banner top left News</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">admin</a></li>
                        <li class="breadcrumb-item"> top </li>
                        <li class="breadcrumb-item active"> news</li>
                    </ol>
                </div>
                <div class="">
                    <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <style>
                table tr th,
                table tr td{
                    text-align: center;
                    border: 1px solid rgba(0,0,0,.4);
                }
            </style>
            <style>
                    *,
                    *:before,
                    *:after {
                        box-sizing: border-box;
                    }
                    .button {
                        display: block;
                        position: relative;
                        width: 60px;
                        height: 30px;
                        background: linear-gradient(to bottom, #11181f 0%, #161f29 100%);
                        border-radius: 40px;
                        box-shadow: 0 0 0px 1px rgba(255, 255, 255, 0.1);
                        cursor: pointer;
                        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
                        margin-left: 50%;
                        transform: translateX(-50%);
                    }
                    .button span {
                        position: absolute;
                        display: block;
                    }
                    .button span:first-of-type {
                        z-index: 100;
                        top: 4px;
                        right: 4px;
                        width: 36px;
                        height: 22px;
                        background: linear-gradient(to bottom, #2c3e50 0%, #1e2a36 100%);
                        box-shadow: 0 6px 4px rgba(255, 255, 255, 0.1) inset, 0 2px 0px rgba(255, 255, 255, 0.2) inset, 0 -6px 0px rgba(0, 0, 0, 0.2) inset, 0 -2px 0px rgba(0, 0, 0, 0.2) inset, 0 2px 2px rgba(0, 0, 0, 0.4), -4px 2px 8px rgba(0, 0, 0, 0.4), 2px 0 1px rgba(242, 201, 197, 0.5) inset;
                        border-radius: 36px;
                        transition: right 400ms ease, box-shadow 400ms ease;
                    }
                    .button span.deactive{
                        right: 20px;
                    }
                    .button span:nth-of-type(2),
                    .button span:last-of-type {
                        z-index: 10;
                        width: 27px;
                        height: 22px;
                        transition: opacity 800ms ease 100ms;
                    }
                    .button span:nth-of-type(2):after,
                    .button span:last-of-type:after {
                        position: absolute;
                        top: 26px;
                        line-height: 1;
                        font-family: "Open Sans";
                        font-weight: 800;
                        color: white;
                        font-size: 24px;
                        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2), 0 0 20px white;
                    }
                    .button span:nth-of-type(2) {
                        top: 4px;
                        left: 4px;
                        background: linear-gradient(to bottom, #c0392b 0%, #d65548 100%);
                        border-top-left-radius: 36px;
                        border-bottom-left-radius: 36px;
                        box-shadow: 4px 4px 12px 4px rgba(0, 0, 0, 0.5) inset, 0 -2px 8px rgba(0, 0, 0, 0.4) inset;
                    }
                    .button span:nth-of-type(2):after {
                        content: "";
                        left: 18px;
                    }
                    .button span:last-of-type {
                        top: 4px;
                        /* right: 20px; */
                        right: 4px;
                        background: linear-gradient(to bottom, #3498db 0%, #8bc4ea 100%);
                        border-top-right-radius: 36px;
                        border-bottom-right-radius: 36px;
                        box-shadow: -4px 4px 12px 4px rgba(0, 0, 0, 0.5) inset, 0 -2px 8px rgba(0, 0, 0, 0.4) inset;
                        opacity: 0.2;
                    }
                    .button span:last-of-type:after {
                        content: "";
                        right: 22px;
                    }
                    .button input[type="checkbox"] {
                        display: none;
                    }
                    .button input[type="checkbox"]:checked + span {
                        right: 20px;
                        box-shadow: 0 6px 4px rgba(255, 255, 255, 0.1) inset, 0 2px 0px rgba(255, 255, 255, 0.2) inset, 0 -6px 0px rgba(0, 0, 0, 0.2) inset, 0 -2px 0px rgba(0, 0, 0, 0.2) inset, 0 2px 2px rgba(0, 0, 0, 0.4), 4px 2px 8px rgba(0, 0, 0, 0.4), -2px 0 1px rgba(225, 240, 250, 0.5) inset;
                    }

                    .button input[type="checkbox"]:checked + span.deactive {
                        right: 4px;
                    }

                    .button input[type="checkbox"]:checked + span + span {
                        opacity: 0.2;
                    }
                    .button input[type="checkbox"]:checked + span + span + span {
                        opacity: 1;
                    }
                </style>
                <script>
                    $(document).ready(function(){
                        $("#switch").click(function(){
                            var go_to_url = $(this).data('url');
                            document.location.href = go_to_url;
                        });
                    });
                </script>
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">

                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                @php $select=App\Models\newsPost::where('status',1)->where('add_to_top_left',1)->get(); $i=1; @endphp
                <div class="card card-default">
                    <div class="card-header">
                        <div class="card-actions">
                            <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                            <a class="btn-minimize" data-action="expand"><i class="mdi mdi-arrow-expand"></i></a>
                            {{-- <a class="btn-close" data-action="close"><i class="ti-close"></i></a> --}}
                        </div>
                        <h4 class="card-title m-b-0">All active POSTS</h4>
                    </div>
                    <div class="card-body collapse show">
                        <div style="width:100%;overflow-x:scroll;">
                            <table id="category_deactive" class="table product-overview text-center">
                                <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Headline</th>
                                        <th>Category</th>
                                        <th>Total View</th>
                                        <th>Tags</th>
                                        <th>Created by</th>
                                        <th>Created at</th>
                                        <th>Status</th>
                                        <th>add to top left news</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($select as $select)
                                        <tr>
                                            <script>
                                                $(document).ready(function(){
                                                    $("#{{$select->slug}}").click(function(){
                                                        var go_to_url = $(this).data('url');
                                                        document.location.href = go_to_url;
                                                    });
                                                });
                                            </script>
                                            <td>{{$i++}}</td>
                                            <td>{{$select->heading}}</td>
                                            <td>{{$select->category}}</td>
                                            <td>{{$select->total_view}}</td>
                                            <td>{{$select->tag}}</td>
                                            <td>{{$select->creator}}</td>
                                            <td>{{$select->created_at}}</td>
                                            <td>
                                                @php $j=$select->status; if($j==1)echo'<span class="label label-success font-weight-100">active</span>';@endphp
                                                @php $j=$select->status; if($j==0)echo'<span class="label label-danger font-weight-100">not active</span>';@endphp
                                            </td>
                                            <td>
                                                <label class="button">
                                                    @php $j=$select->add_to_top_left; if($j==1) $url1='data-url';else $url1='';@endphp
                                                    @php $j=$select->add_to_top_left; if($j==0) $url2='data-url';else $url2='';@endphp
                                                    <input type="checkbox" id="{{$select->slug}}" {{$url1}}="{{route("remove_from_top_left",$select->slug)}}" {{$url2}}="{{route("add_to_top_left",$select->slug)}}">
                                                    <span @php if($j==0) echo "class='deactive'"; @endphp></span>
                                                    <span></span>
                                                    <span></span>
                                                </label>
                                            </td>
                                            <td>
                                                <a href="{{route('post_view',$select->slug)}}" class="text-inverse p-r-10" data-toggle="tooltip" title="" data-original-title="view post">
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                                <a href="{{route('post_update_view',$select->slug)}}" class="text-inverse p-r-10" data-toggle="tooltip" title="" data-original-title="Edit">
                                                    <i class="ti-marker-alt"></i>
                                                </a>
                                                <a href="{{route('post_soft_delete',$select->slug)}}" onclick="return confirm('deactive Post!!')" class="text-inverse" title="" data-toggle="tooltip" data-original-title="deactive">
                                                    <i class="ti-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>

@endsection
