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
                    <h3 class="text-themecolor">about me in details section</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">admin</a></li>
                        <li class="breadcrumb-item">aboutme_details</li>
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

                <div class="modal fade add-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="row">
                                <div class='col-md-12 m-auto' style="">
                                    <div class='card'>
                                        <div class='card-body'>
                                            <form class='form p-t-20' enctype='multipart/form-data' method='POST' action="{{route('aboutmedetails.store')}}">
                                                @csrf
                                                <div class='form-group'>
                                                    <div class='input-group'>
                                                        <label for='name'>Details</label>
                                                    </div>
                                                    <div class='input-group'>
                                                        <textarea id="my-editor" name="description" class="form-control">{!! old('description', '') !!}</textarea>
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

                                                <div class='form-group'>
                                                    <div class='input-group'>
                                                        <label for='name'> image</label>
                                                    </div>
                                                    <div class='input-group'>
                                                        <div class='input-group-addon'><i class='ti ti-pencil'></i></div>
                                                        <input name='photo' type="file" value='' class='form-control text-lower' id='exampleInputuname' placeholder='input'>
                                                    </div>
                                                </div>

                                                <button type='submit' class='btn btn-outline-success text-capitalize waves-effect waves-light m-r-10'>Add</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- all aboutme_details --}}

                <div class="card card-default">
                    <div class="card-header">
                        <div class="card-actions">
                            <a href="#" data-toggle="modal" data-target=".add-modal" class="btn btn-outline-success">Add</a>
                            <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                            <a class="btn-minimize" data-action="expand"><i class="mdi mdi-arrow-expand"></i></a>
                            {{-- <a class="btn-close" data-action="close"><i class="ti-close"></i></a> --}}
                        </div>
                        <h4 class="card-title m-b-0">aboutme details</h4>
                    </div>
                    <div class="card-body collapse show">
                        <div class="" style="width:100%;">
                            <table id="category_active" class="table product-overview text-center" >
                                <thead class="sticky-top">
                                    <tr>
                                        <th style="text-align:center;">Serial</th>
                                        <th style="text-align:center;">about</th>
                                        <th style="text-align:center;">image</th>
                                        <th style="text-align:center;">created at</th>
                                        <th style="text-align:center;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $select=App\Models\aboutme_details::get();
                                        $i=1;
                                    @endphp
                                    @foreach ($select as $item)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{!! Str::limit($item->description,30,'...') !!}</td>
                                            <td><img style="width: 100px;" src="{{asset('')}}{{$item->photo}}" alt="aboutme_details image"></td>
                                            <td>{{date('h:i:s a m/d/Y', strtotime($item->created_at))}}</td>
                                            <td>
                                                <a href="#" onclick="" class="text-inverse d-inline" data-toggle="modal" data-target="#view{{$item->id}}">
                                                    <i class="ti-zoom-in btn btn-outline-primary"></i>
                                                </a>
                                                <a href="#" onclick="" class="text-inverse d-inline" data-toggle="modal" data-target="#update{{$item->id}}">
                                                    <i class="btn btn-outline-success ti-pencil"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <script type="text/javascript">
                                document.addEventListener("DOMContentLoaded", function() {
                                    app._loading.show($("#dt-ext-responsive"), {
                                        spinner: true
                                    });
                                    $("#category_active1").DataTable({
                                        "responsive": false,
                                        "initComplete": function(settings, json) {
                                            setTimeout(function() {
                                                app._loading.hide($("#dt-ext-responsive"));
                                            }, 1000);
                                        }
                                    });
                                });

                            </script>
                        </div>
                    </div>
                </div>

                {{-- update modals --}}

                @foreach ($select as $item)
                    <div class="modal fade bd-example-modal-lg" id="update{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="row">
                                    <div class='col-md-12 m-auto'>
                                        <div class='card'>
                                            <div class="card-header">
                                                <h2>Update aboutme_details Information</h2>
                                            </div>
                                            <div class='card-body'>
                                                <form class='form p-t-20 d-inline' enctype='multipart/form-data' method='POST' action="{{route('aboutmedetails.update',$item->id)}}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="text" class="d-none" value="{{$item->id}}" name="id">
                            
                                                    <div class='form-group'>
                                                        <div class='input-group'>
                                                            <label for='name'>details</label>
                                                        </div>
                                                        <div class='input-group'>
                                                            <textarea id="up{{ $item->id }}" name="description" class="form-control">{!! $item->description !!}</textarea>
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
                                                            @php
                                                                echo '<script>' .'var id ='. $item->id .';' .'</script>';
                                                            @endphp
                                                            <script>
                                                                CKEDITOR.replace('up'+id, options);
                                                                CKEDITOR.replace('newsphoto', options);
                                                            </script>
                                                        </div>
                                                    </div>

                                                    <div class='form-group'>
                                                        <div class='input-group'>
                                                            <label for='name'>aboutme_details image</label>
                                                        </div>
                                                        <div class='input-group'>
                                                            <div class='input-group-addon'><i class='ti ti-pencil'></i></div>
                                                            <input name='photo' type="file" value='' class='form-control text-lower' id='exampleInputuname' placeholder='input'>
                                                        </div>
                                                        <img src="{{asset('')}}{{$item->photo}}" style="width: 80px;height: 100px;" alt="{{$item->id}}">
                                                    </div>

                                                    <button type='submit' class='btn btn-outline-success text-capitalize waves-effect waves-light m-r-10'>Update information</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- view modal --}}

                @foreach ($select as $item)
                    <div class="modal fade bd-example-modal-lg" id="view{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="row">
                                    <div class='col-md-12 m-auto'>
                                        <div class='card'>
                                            <div class="card-header">
                                                <h3>aboutme_details Details</h3>
                                            </div>
                                            <div class='card-body'>
                                                <img src="{{asset('')}}{{$item->photo}}" style="height: 100px" alt="{{$item->heading}}">
                                                <table class="view-table">
                                                    <tr>
                                                        <td style="width:30%">details</td>
                                                        <td style="width:3px;">:</td>
                                                        <td>{!! $item->description !!}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="card-footer">
                                                <form action="{{route('aboutmedetails.destroy',$item->id)}}" method="POST" class="d-inline">
                                                    @method('DELETE')
                                                    @csrf
                                                    <input type="text" class="d-none" name="id" value="{{$item->id}}">
                                                    <button type="submit" class="btn btn-outline-danger border-0" onclick="return confirm('delete Post!!')"><i class="ti-trash"></i> Delet aboutme_details</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <style>
                    .view-table{
                        padding: 10px 0px;
                    }
                    .view-table td{
                        padding: 10px;
                    }
                </style>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>

@endsection
