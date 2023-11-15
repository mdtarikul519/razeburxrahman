@extends('layouts.admin')
@section('title')
<title>photo gallery</title>
@endsection
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
                    <h3 class="text-themecolor">photo gallery</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">admin</a></li>
                        <li class="breadcrumb-item">category wise post</li>
                        <li class="breadcrumb-item active">photo gallery</li>
                    </ol>
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
                                <form class='form p-t-20' enctype='multipart/form-data' method='POST' action="{{route('post_add_photo')}}">
                                    @csrf
                                    <div class='form-group'>
                                        <div class='input-group'>
                                            <label for='name'>select photo</label>
                                        </div>
                                        <div class='input-group'>
                                            <div class='input-group-addon'><i class='ti ti-camera'></i></div>
                                            <input name='photo' type="file" value='' class='form-control text-lower' id='exampleInputuname' placeholder='input category name'>
                                        </div>
                                    </div>

                                    <button type='submit' class='btn btn-outline-success text-capitalize waves-effect waves-light m-r-10'>Add Photo</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @php
                        $collection = App\Models\gallery::get();
                    @endphp
                    @foreach ($collection as $item)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{route('post_delete_photo',$item->slug)}}" class="btn btn-danger"><i class="fa fa-trash btn-danger"></i></a>
                            </div>
                            <div class="card-body" style="height:300px; overflow:hidden;">
                                <img style="width:100%; height:100%;" src="{{asset('')}}{{$item->photo}}" alt="{{$item->photo}}">
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
