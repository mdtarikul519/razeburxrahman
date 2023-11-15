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
                    <h3 class="text-themecolor">banner section</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">admin</a></li>
                        <li class="breadcrumb-item">banner</li>
                        <li class="breadcrumb-item active"> </li>
                    </ol>
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

                {{-- all banner --}}

                <div class="card card-default">
                    <div class="card-header">
                        <h3><a href="#" data-toggle="modal" data-target="#add-banner"  class="btn btn-outline-success float-right">Add Banner</a></h3>
                        <div class="modal fade" id="add-banner" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalScrollableTitle">Banner Information</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class='form p-t-20' enctype='multipart/form-data' method='POST' action="{{route('add_banner')}}">
                                        @csrf

                                        <div class='form-group'>
                                            <div class='input-group'>
                                                <label for='name'>banner image</label>
                                            </div>
                                            <div class='input-group'>
                                                <div class='input-group-addon'><i class='ti ti-pencil'></i></div>
                                                <input name='banner_img' type="file" value='' class='form-control text-lower' id='exampleInputuname' placeholder='input'>
                                            </div>
                                        </div>

                                        <button type='submit' class='btn btn-outline-success text-capitalize waves-effect waves-light m-r-10'>Add new Banner</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <div class="card-actions">
                            <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                            <a class="btn-minimize" data-action="expand"><i class="mdi mdi-arrow-expand"></i></a>
                            {{-- <a class="btn-close" data-action="close"><i class="ti-close"></i></a> --}}
                        </div>
                        <h4 class="card-title m-b-0">All active Banners</h4>
                    </div>
                    <div class="card-body collapse show">
                        <div class="" style="width:100%;overflow-x:scroll;">
                            <table id="category_active" class="table product-overview text-center" >
                                <thead class="sticky-top text-center">
                                    <tr>
                                        <th class="text-center">Serial</th>
                                        <th class="text-center">Banner image</th>
                                        <th class="text-center">Created at</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $select=App\Models\banner::where('status',1)->get();
                                        $i=1;
                                    @endphp
                                    @foreach ($select as $select)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td><img style="width: 200px; height:120px;" src="{{asset('')}}{{$select->banner_img}}" alt="banner image"></td>
                                            <td>{{date('h:i:s a m/d/Y', strtotime($select->created_at))}}</td>
                                            <td>
                                                @php $j=$select->status; if($j==1)echo'<span class="label label-success font-weight-100">active</span>';@endphp
                                                @php $j=$select->status; if($j==0)echo'<span class="label label-danger font-weight-100">not active</span>';@endphp
                                            </td>
                                            <td>
                                                <a href="#" class="text-inverse p-r-10" data-target="#{{$select->id}}" data-toggle="modal" title="" data-original-title="view post">
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                                {{-- view modal --}}
                                                <div class="modal fade" id="{{$select->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalScrollableTitle">View Information</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img class="img-fluid" src="{{asset('')}}{{$select->banner_img}}" alt="banner image">
                                                            <br>
                                                            <table class="text-left w-100" style="margin-top: 10px;">

                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <a href="" class="text-inverse p-r-10" data-toggle="modal" data-target="#{{$select->slug}}" title="" data-original-title="Edit">
                                                    <i class="ti-marker-alt"></i>
                                                </a>
                                                {{-- update modal --}}
                                                <div class="modal fade" id="{{$select->slug}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalScrollableTitle">Update Banner Information</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class='form p-t-20' enctype='multipart/form-data' method='POST' action="{{route('update_banner',$select->slug)}}">
                                                                @csrf


                                                                <div class='form-group'>
                                                                    <div class='input-group'>
                                                                        <label for='name'>banner image</label>
                                                                    </div>
                                                                    <div class='input-group'>
                                                                        <div class='input-group-addon'><i class='ti ti-pencil'></i></div>
                                                                        <input name='banner_img' type="file" class='form-control text-lower' id='exampleInputuname' placeholder='input'>
                                                                    </div>
                                                                </div>

                                                                <button type='submit' class='btn btn-outline-success text-capitalize waves-effect waves-light m-r-10'>update Banner</button>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <a href="{{route('soft_delete_banner',$select->slug)}}" onclick="return confirm('deactive!!')" class="text-inverse" title="" data-toggle="tooltip" data-original-title="deactive">
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


                {{-- all deactive banner --}}

                <div class="card card-default">
                        <div class="card-header">
                            <h3><a href="#" data-toggle="modal" data-target="#add-banner"  class="btn btn-outline-success float-right">Add Banner</a></h3>
                            <div class="modal fade" id="add-banner" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalScrollableTitle">Banner Information</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class='form p-t-20' enctype='multipart/form-data' method='POST' action="{{route('add_banner')}}">
                                            @csrf

                                            <div class='form-group'>
                                                <div class='input-group'>
                                                    <label for='name'>banner image</label>
                                                </div>
                                                <div class='input-group'>
                                                    <div class='input-group-addon'><i class='ti ti-pencil'></i></div>
                                                    <input name='banner_img' type="file" value='' class='form-control text-lower' id='exampleInputuname' placeholder='input'>
                                                </div>
                                            </div>

                                            <button type='submit' class='btn btn-outline-success text-capitalize waves-effect waves-light m-r-10'>Add new Banner</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-header">
                            <div class="card-actions">
                                <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                                <a class="btn-minimize" data-action="expand"><i class="mdi mdi-arrow-expand"></i></a>
                                {{-- <a class="btn-close" data-action="close"><i class="ti-close"></i></a> --}}
                            </div>
                            <h4 class="card-title m-b-0">All deactive Banners</h4>
                        </div>
                        <div class="card-body collapse show">
                            <div class="" style="width:100%;overflow-x:scroll;">
                                <table id="category_active" class="table product-overview text-center" >
                                    <thead class="sticky-top text-center">
                                        <tr >
                                            <th class="text-center">Serial</th>
                                            <th class="text-center">Banner image</th>
                                            <th class="text-center">Created at</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $select=App\Models\banner::where('status',0)->get();
                                            $i=1;
                                        @endphp
                                        @foreach ($select as $select)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td><img style="width: 200px; height:120px;" src="{{asset('')}}{{$select->banner_img}}" alt="banner image"></td>
                                                <td>{{date('h:i:s a m/d/Y', strtotime($select->created_at))}}</td>
                                                <td>
                                                    @php $j=$select->status; if($j==1)echo'<span class="label label-success font-weight-100">active</span>';@endphp
                                                    @php $j=$select->status; if($j==0)echo'<span class="label label-danger font-weight-100">not active</span>';@endphp
                                                </td>
                                                <td>
                                                    <a href="#" class="text-inverse p-r-10" data-target="#{{$select->id}}" data-toggle="modal" title="" data-original-title="view post">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                    {{-- view modal --}}
                                                    <div class="modal fade" id="{{$select->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalScrollableTitle">View Information</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img class="img-fluid" src="{{asset('')}}{{$select->banner_img}}" alt="banner image">
                                                                <br>
                                                                <table class="text-left w-100" style="margin-top: 10px;">

                                                                </table>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <a href="{{route('restore_banner',$select->slug)}}" onclick="return confirm('active')" class="text-inverse" title="" data-toggle="tooltip" data-original-title="deactive">
                                                        <i class="mdi mdi-backup-restore"></i>
                                                    </a>
                                                    <a href="{{route('delete_banner',$select->slug)}}" onclick="return confirm('delete!!')" class="text-inverse" title="" data-toggle="tooltip" data-original-title="deactive">
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
