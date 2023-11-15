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
                    <h3 class="text-themecolor"> section</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">admin</a></li>
                        <li class="breadcrumb-item"> </li>
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

                <div class='row'>
                    <div class='col-md-8 m-auto'>
                        <div class='card'>
                            <div class='card-body'>
                                <form class='form p-t-20' enctype='multipart/form-data' method='POST' action="">
                                    @csrf

                                    <div class='form-group'>
                                        <div class='input-group'>
                                            <textarea id="my-editor" name="content" class="form-control">{!! old('content', '') !!}</textarea>
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
                                                CKEDITOR.replace('newsphoto', options);
                                            </script>
                                        </div>
                                    </div>

                                    <button type='submit' class='btn btn-outline-success text-capitalize waves-effect waves-light m-r-10'>Add Post</button>
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
