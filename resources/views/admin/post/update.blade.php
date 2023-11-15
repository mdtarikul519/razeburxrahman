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
                    <h3 class="text-themecolor">Update Post</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">admin</a></li>
                        <li class="breadcrumb-item"> news </li>
                        <li class="breadcrumb-item active"> Update post</li>
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
                    <div class='col-md-8 m-auto'>
                        <div class='card'>
                            <div class='card-body'>
                                <form class='form p-t-20' enctype='multipart/form-data' method='POST' action="{{route('post_update',$select->slug)}}">
                                    @csrf
                                    <div class='form-group'>
                                        <div class='input-group'>
                                            <label for='name'>Heading</label>
                                        </div>
                                        <div class='input-group'>
                                            <div class='input-group-addon'><i class='ti ti-pencil'></i></div>
                                            <input name='heading' value='{{$select->heading}}' class='form-control text-lower' id='exampleInputuname' placeholder='input heading'>
                                        </div>
                                    </div>

                                    <div class='form-group'>
                                        <div class='input-group'>
                                            <label for='name'>post feature image</label>
                                        </div>
                                        <div class='input-group'>
                                            <input type="file" onchange="readURL(this);" name='post_head_image' value='' class='form-control text-lower' id='' placeholder='input heading'>
                                        </div>
                                    </div>

                                    {{-- image preview --}}
                                    <div class='form-group'>
                                        <div class='input-group'>
                                            <img id="blah" class="img" src="{{asset('')}}{{$select->post_head_image}}" alt="use image size 936*576" />
                                            <style>
                                                .img{
                                                    max-width:180px;
                                                }
                                            </style>
                                            <script>
                                                    function readURL(input) {
                                                    if (input.files && input.files[0]) {
                                                        var reader = new FileReader();

                                                        reader.onload = function (e) {
                                                            $('#blah')
                                                                .attr('src', e.target.result);
                                                        };

                                                        reader.readAsDataURL(input.files[0]);
                                                    }
                                                }
                                            </script>
                                        </div>
                                    </div>

                                    <div class='form-group'>
                                        <div class='input-group'>
                                            <label for='name'>Post description</label>
                                        </div>
                                    </div>

                                    <div class='form-group'>
                                        <div class='input-group'>
                                            <textarea id="my-editor" class='my-editor' name="content" class="form-control">{{$select->description}}</textarea>
                                            {{-- <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script> --}}
                                            {{-- <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script> --}}
                                            {{-- <script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script> --}}
                                            <script src="{{asset('contents/admin')}}/js/ckeditor/ckeditor.js"></script>
                                            <script>
                                                var options = {
                                                    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                                                    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                                                    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                                                    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
                                                    width: "100%",
                                                };
                                            </script>
                                            <script>
                                                CKEDITOR.replace('my-editor', options);
                                                CKEDITOR.replace('newsphoto', options);
                                            </script>

                                        </div>
                                    </div>
                                    <div class='form-group'>
                                        <div class='input-group'>
                                            <label for='name'>Video link</label>
                                        </div>
                                        <div class='input-group'>
                                            <div class='input-group-addon'><i class='ti ti-pencil'></i></div>
                                            <input name='video_link' value='{{$select->video_link}}' class='form-control text-lower' id='exampleInputuname' placeholder='input link'>
                                        </div>
                                    </div>

                                    <div class='form-group'>
                                        <div class='input-group'>
                                            <label for='name'>Category</label>
                                        </div>
                                        <div class='input-group'>
                                            <div class='input-group-addon'><i class='ti ti-pencil'></i></div>
                                            <select name='category' value='' class='form-control text-lower' id='exampleInputuname' placeholder='input'>
                                                @php $cat = App\Models\newsCategory::where('status',1)->get(); @endphp
                                                @foreach ($cat as $item)
                                                    {{-- <option>{{$select->category}}</option> --}}
                                                    <option {{ $item->name == $select->category ? 'selected' : '' }}>{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class='form-group d-none'>
                                        <div class='input-group'>
                                            <label for='name'>Second Category</label>
                                        </div>
                                        <div class='input-group'>
                                            <div class='input-group-addon'><i class='ti ti-pencil'></i></div>
                                            <select name='category2' value='' class='form-control text-lower' id='exampleInputuname' placeholder='input'>
                                                <option>{{$select->category2}}</option>
                                                @php $select2 = App\Models\newsCategory::where('status',1)->get(); @endphp
                                                @foreach ($select2 as $item)

                                                    <option>{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class='form-group d-none'>
                                        <div class='input-group'>
                                            <label for='name'>Third Category</label>
                                        </div>
                                        <div class='input-group'>
                                            <div class='input-group-addon'><i class='ti ti-pencil'></i></div>
                                            <select name='category3' value='' class='form-control text-lower' id='exampleInputuname' placeholder='input'>
                                                <option>{{$select->category3}}</option>
                                                @php $select3 = App\Models\newsCategory::where('status',1)->get(); @endphp
                                                @foreach ($select3 as $item)
                                                    <option>{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <button type='submit' class='btn btn-outline-success text-capitalize waves-effect waves-light m-r-10'>Update Post</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
{{--
            @php $select=App\newsPost::get(); @endphp
            @foreach ($select as $item)
                {!!$item->description!!}
            @endforeach --}}
@endsection
