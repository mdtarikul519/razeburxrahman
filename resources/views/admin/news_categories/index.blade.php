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
                    <h3 class="text-themecolor"> News Categories</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">admin</a></li>
                        <li class="breadcrumb-item">news</li>
                        <li class="breadcrumb-item active">categories</li>
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

                <div class='row'>
                    <div class='col-md-4'>
                        <div class='card'>
                            <div class='card-body'>
                                <form class='form p-t-20' enctype='multipart/form-data' method='POST' action="{{route('news_category_add')}}">
                                    @csrf
                                    <div class='form-group'>
                                        <div class='input-group'>
                                            <label for='name'>Category Name</label>
                                        </div>
                                        <div class='input-group'>
                                            <div class='input-group-addon'><i class='ti ti-pencil'></i></div>
                                            <input name='name' value='' class='form-control text-lower' id='exampleInputuname' placeholder='input category name'>
                                        </div>
                                    </div>

                                    <button type='submit' class='btn btn-outline-success text-capitalize waves-effect waves-light m-r-10'>Add Category</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- all categories --}}

                <div class="card card-default">
                    <div class="card-header">
                        <div class="card-actions">
                            <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                            <a class="btn-minimize" data-action="expand"><i class="mdi mdi-arrow-expand"></i></a>
                            {{-- <a class="btn-close" data-action="close"><i class="ti-close"></i></a> --}}
                        </div>
                        <h4 class="card-title m-b-0">All active Categories</h4>
                    </div>
                    <div class="card-body collapse show">
                        <div class="table-responsive">
                            <table class="table product-overview">
                                <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Name</th>
                                        {{-- <td>Link</td> --}}
                                        <th>Created by</th>
                                        <th>Created at</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($select as $select)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$select->name}}</td>
                                            {{-- <td>{{$select->link}}</td> --}}
                                            <td>{{$select->created_by}}</td>
                                            <td>{{$select->created_at}}</td>
                                            <td>
                                                @php $j=$select->status; if($j==1)echo'<span class="label label-success font-weight-100">active</span>';@endphp
                                                @php $j=$select->status; if($j==0)echo'<span class="label label-danger font-weight-100">not active</span>';@endphp
                                            </td>
                                            <td>
                                                <a href="javascript:void(0)" data-toggle="modal" data-target="#{{$select->slug}}" class="text-inverse p-r-10" data-toggle="tooltip" title="" data-original-title="Edit">
                                                    <i class="ti-marker-alt"></i>
                                                </a>
                                                <a href="{{route('news_category_soft',$select->slug)}}" onclick="return confirm('deactive category')" class="text-inverse" title="" data-toggle="tooltip" data-original-title="deactive">
                                                    <i class="ti-trash"></i>
                                                </a>
                                            </td>

                                            {{-- update modal --}}
                                            <div class="modal fade" id="{{$select->slug}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalScrollableTitle">Update Information</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class='form p-t-20' enctype='multipart/form-data' method='POST' action="{{route('news_category_update',$select->slug)}}">
                                                                @csrf
                                                                <div class='form-group'>
                                                                    <div class='input-group'>
                                                                        <label for='name'>Category Name</label>
                                                                    </div>
                                                                    <div class='input-group'>
                                                                        <div class='input-group-addon'><i class='ti ti-pencil'></i></div>
                                                                        <input name='name' value='{{$select->name}}' class='form-control text-lower' id='exampleInputuname' placeholder='input category name'>
                                                                    </div>
                                                                </div>
                                                                <button type='submit' class='btn btn-outline-success text-capitalize waves-effect waves-light m-r-10'>Update Category</button>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                                                            {{-- <button type="submit" id="submit_btn" class="btn btn-outline-primary">Update Information</button> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card card-default">
                    <div class="card-header">
                        <div class="card-actions">
                            <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                            <a class="btn-minimize" data-action="expand"><i class="mdi mdi-arrow-expand"></i></a>
                            {{-- <a class="btn-close" data-action="close"><i class="ti-close"></i></a> --}}
                        </div>
                        <h4 class="card-title m-b-0">All deactive Categories</h4>
                    </div>
                    <div class="card-body collapse show">
                        <div class="table-responsive">
                            <table class="table product-overview">
                                <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Name</th>
                                        <th>Created by</th>
                                        <th>Created at</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($deactive as $select)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$select->name}}</td>
                                            <td>{{$select->created_by}}</td>
                                            <td>{{$select->created_at}}</td>
                                            <td>
                                                @php $j=$select->status; if($j==1)echo'<span class="label label-success font-weight-100">active</span>';@endphp
                                                @php $j=$select->status; if($j==0)echo'<span class="label label-danger font-weight-100">not active</span>';@endphp
                                            </td>
                                            <td>
                                                <a href="javascript:void(0)" data-toggle="modal" data-target="#{{$select->slug}}" class="text-inverse p-r-10" data-toggle="tooltip" title="" data-original-title="Edit">
                                                    <i class="ti-marker-alt"></i>
                                                </a>
                                                <a href="{{route('news_category_hard',$select->slug)}}" onclick="return confirm('delete category')" class="text-inverse" title="" data-toggle="tooltip" data-original-title="delete permanent">
                                                    <i class="ti-trash"></i>
                                                </a>
                                                <a href="{{route('news_category_restore',$select->slug)}}" onclick="return confirm('restore category')" class="text-inverse" title="" data-toggle="tooltip" data-original-title="restore">
                                                    <i class="mdi mdi-backup-restore"></i>
                                                </a>
                                            </td>

                                            {{-- update modal --}}
                                            <div class="modal fade" id="{{$select->slug}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalScrollableTitle">Update Information</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class='form p-t-20' enctype='multipart/form-data' method='POST' action="{{route('news_category_update',$select->slug)}}">
                                                                @csrf
                                                                <div class='form-group'>
                                                                    <div class='input-group'>
                                                                        <label for='name'>Category Name</label>
                                                                    </div>
                                                                    <div class='input-group'>
                                                                        <div class='input-group-addon'><i class='ti ti-pencil'></i></div>
                                                                        <input name='name' value='{{$select->name}}' class='form-control text-lower' id='exampleInputuname' placeholder='input category name'>
                                                                    </div>
                                                                </div>
                                                                <button type='submit' class='btn btn-outline-success text-capitalize waves-effect waves-light m-r-10'>Update Category</button>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                                                            {{-- <button type="submit" id="submit_btn" class="btn btn-outline-primary">Update Information</button> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
