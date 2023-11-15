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
                    <h3 class="text-themecolor">Question section</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">admin</a></li>
                        <li class="breadcrumb-item">question</li>
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

                @php $select=App\Models\ask::where('status',1)->get(); $i=1; @endphp
                <div class="card card-default">
                    <div class="card-header">

                        <div class="card-actions">

                            <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                            <a class="btn-minimize" data-action="expand"><i class="mdi mdi-arrow-expand"></i></a>
                            {{-- <a class="btn-close" data-action="close"><i class="ti-close"></i></a> --}}
                        </div>
                        <h4 class="card-title m-b-0">All active post</h4>
                    </div>
                    <div class="card-body collapse show">
                        <div class="" style="width:100%;overflow-x:scroll;">
                            <table id="category_active" class="table product-overview text-center" >
                                <thead class="sticky-top">
                                    <tr>
                                        <th>ID</th>
                                        <th>name</th>
                                        <th>email</th>
                                        <th>address</th>
                                        <th>message</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($select as $select)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$select->name}}</td>
                                            <td>{{$select->email}}</td>
                                            <td>{{Str::limit($select->address,$limit=50,$end=" ...")}}</td>
                                            <td>{{Str::limit($select->ask,$limit=50,$end=" ...")}}</td>
                                            
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#{{$select->slug}}" class="text-inverse p-r-10" data-toggle="tooltip" title="" data-original-title="view post">
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                                <a href="{{route('admin.questions.delete',$select->slug)}}" onclick="return confirm('delete question!!')" class="text-inverse" title="" data-toggle="tooltip" data-original-title="deactive">
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

                @php $select=App\Models\ask::where('status',1)->get(); $i=1; @endphp
                @foreach ($select as $select)
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="{{$select->slug}}" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Question</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-4">Name :</div>
                                            <div class="col-8">{{$select->name}}</div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-4">email :</div>
                                            <div class="col-8">{{$select->email}}</div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-4">address :</div>
                                            <div class="col-8">{{$select->address}}</div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-4">question :</div>
                                            <div class="col-8">{{$select->ask}}</div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <a href="{{route('admin.questions.delete',$select->slug)}}" type="button" class="btn btn-primary">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>

@endsection
