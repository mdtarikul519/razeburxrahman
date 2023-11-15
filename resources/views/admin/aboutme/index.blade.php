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
                    <h3 class="text-themecolor">about me section</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">admin</a></li>
                        <li class="breadcrumb-item">about me</li>
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
                @php
                    $select=App\Models\aboutme::where("id",1)->firstOrFail();
                @endphp
                <div class="row">
                    <div class="col-md-8 m-auto">
                        <div class="card">
                            <div class="card-body">
                                <form class='form p-t-20' enctype='multipart/form-data' method='POST' action="{{route('aboutme_update',$select->slug)}}">
                                    @csrf

                                    <div class='form-group'>
                                        <div class='input-group'>
                                            <label for='name'>aboutme image</label>
                                        </div>
                                        <div class='input-group'>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class='form-group'>
                                        <div class='input-group'>
                                            <label for='name'>My post</label>
                                        </div>
                                        <div class='input-group'>
                                            <input type="text" name="post" value="{{$select->post}}" class="form-control">
                                        </div>
                                    </div>

                                    <div class='form-group'>
                                        <div class='input-group'>
                                            <label for='name'>aboutme details</label>
                                        </div>
                                        <div class='input-group'>
                                            <textarea id="my-editor2" name="details" class="form-control">{!! $select->details !!}</textarea>
                                        </div>
                                    </div>

                                    <button type='submit' class='btn btn-outline-success text-capitalize waves-effect waves-light m-r-10'>update contents</button>
                                </form>
                                {{-- <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script> --}}
                                {{-- <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script> --}}
                                <script src="{{asset('contents/admin')}}/js/ckeditor/ckeditor.js"></script>
                                <script>
                                    var options = {
                                        filebrowserImageBrowseUrl: '{{asset('')}}laravel-filemanager?type=Images',
                                        filebrowserImageUploadUrl: '{{asset('')}}laravel-filemanager/upload?type=Images&_token=',
                                        filebrowserBrowseUrl: '{{asset('')}}laravel-filemanager?type=Files',
                                        filebrowserUploadUrl: '{{asset('')}}laravel-filemanager/upload?type=Files&_token=',
                                        width: "100%",
                                    };
                                </script>
                                <script>
                                    CKEDITOR.replace('my-editor', options);
                                    CKEDITOR.replace('my-editor2', options);
                                    CKEDITOR.replace('newsphoto', options);
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>

@endsection
