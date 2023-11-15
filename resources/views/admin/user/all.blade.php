@extends('layouts.admin')
@section('contents')

<style>
        .top{
            background: url('http://mdshefat.com/contents/admin/assets/images/header-back-ground.png');
            background-size:cover;
            background-position:center center;
            position:relative;
            z-index:1;
        }
        .top::before{
            position: absolute;
            top: 0;
            left: 0;
            content: '';
            height: 100%;
            width: 100%;
            /* background: rgba(0,0,0,.5); */
        }
        .top h1{
            text-align: center;
            text-transform: uppercase;
            padding: 20px 0px;
            color: white;
            position: relative;
            z-index: 99;
        }
        .top img{
            width: 200px;
            height: 200px;
            overflow: hidden;
            border: 1px solid white;
            position: relative;
            z-index: 99;
            margin-left: 50%;
            transform: translateX(-50%);
            border-radius: 50%;
            margin-bottom: 20px;
        }
        .card-body{
                padding: 5px;
            }
            .top{
                position: relative;
                height: 165px;
                background-size:cover;
                background-position: bottom center;
                background-repeat: no-repeat;
            }
            .top h1{
                position: absolute;
                top: 40%;
                left: 50%;
                transform: translate(-50%,-50%);
                font-size: 20px;
            }
            .top img{
                width: 100%;
                height: 100%;
            }
            .top .profile-pic{
                position: absolute;
                bottom: -50px;
                overflow: hidden;
                height: 100px;
                width: 100px;
                left: 20%;
                transform: translateX(-50%);
            }
            .top-info{
                padding-left: 0px;
            }
            .top-info li{
                list-style-type: none;
                font-size: 14px;
                width: 100%;
            }
            .top-info li i{
                height: 10px;
                width: 22px;
                display: inline-block;
            }
            ul{
                padding: 0;
            }
            ul li{
                list-style: none;
            }
            .d-info td{
                padding: 8px 0px;
            }
            .operation a{
                margin: 0px 2px;
            }

        @media (min-width: 576px) and (max-width: 767.98px)
        {
            .top{
                height: 225px;
            }
            table{
                margin: 0 auto;
            }
        }

        @media (min-width: 768px) and (max-width: 991.98px) {
            .top{
                height: 230px;
            }
            .top .profile-pic{
                height: 150px;
                width: 150px;
                bottom: -50px;
            }
            table{
                margin: 0 auto;
            }
        }

        @media (min-width: 992px) and (max-width: 1199.98px) {
            .top{
                height: 230px;
            }
            .top .profile-pic{
                height: 150px;
                width: 150px;
                bottom: -50px;
            }
            table{
                margin: 0 auto;
            }
        }
        @media (min-width: 1200px) {
            .top{
                height: 300px;
            }
            .top .profile-pic{
                height: 150px;
                width: 150px;
                bottom: -50px;
            }
            table{
                margin: 0 auto;
            }

        }
    </style>
<div class="page-wrapper">
    @if(Session::has('success'))
       <script>
             swal({title: "Success!", text: "Successfully done !", icon: "success",timer:5000});
       </script>
    @endif
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">All User</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
                <li class="breadcrumb-item active">All User</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">


{{-- edit part start --}}

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body all-user" style="overflow-x:scroll;">
                    <table id="dt-example-responsive" class="table table-bordered"  cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>mail</th>
                                <th>role</th>
                                <th>creator</th>
                                <th>photo</th>
                                <th>manage</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            @php $i=1 @endphp
                            @foreach ($all as $data)
                            @php $check=$data->role_serial; $check= (int)$check; @endphp
                            @php $role=App\Models\user_role::where('role_serial',$check)->select('role_name')->firstOrFail();  @endphp
                            <tr>
                                <td style="vertical-align:middle;">{{$i++}}</td>
                                <td style="vertical-align:middle;">{{$data->name}}</td>
                                <td style="vertical-align:middle;">{{$data->email}}</td>
                                @if ($data->rolename)
                                <td style="vertical-align:middle;">{{$data->rolename->role_name}}</td>  
                                @endif          
                                <td style="vertical-align:middle;">{{$data->creator}}</td>
                                <td style="vertical-align:middle;">
                                    <div class="div" style="height:70px; width:70px; overflow:hidden; border-radius:50%;padding:2px; border:1px solid gray;">
                                        <img style="height:100%;width:100%;border-radius:50%;" id="profile-pic" src="{{asset('')}}{{$data->photo}}" alt="profile pic">
                                    </div>
                                </td>
                                <td style="vertical-align:middle;">
                                    {{-- <a href="{{route('user_view',$data->slug)}}"title="view user"><i class="fa fa-plus"></i></a> --}}
                                    <a href="#" class="view-modal" id="viewData"
                                    data-id="{{route('user_viewm',$data->slug)}}"
                                    data-name="{{$data->name}}"
                                    data-photo="{{asset('')}}{{$data->photo}}"
                                    data-creator="{{$data->creator}}"
                                    @if($data->rolename)
                                    data-role="{{$data->rolename->role_name}}" 
                                    @endif
                                
                                    data-email="{{$data->email}}" data-toggle="modal" data-target="#viwModal"
                                    title="view user"><i class="fa fa-vcard-o"></i></a>

                                    <a href="#" id="update-modal"
                                    data-id="{{route('user_update',$data->slug)}}"
                                    data-name="{{$data->name}}"
                                    data-roles="{{$data->role_serial}}"
                                    @if($data->rolename)
                                    data-role="{{$data->rolename->role_name}}" 
                                    @endif
                                    data-email="{{$data->email}}" class="update-modal" data-toggle="modal" data-target="#updateModal" title="edit user information"><i class="fa fa-pencil"></i></a>

                                    <a href="#" class="delete-modal" id="deleteData"
                                    data-btn="Deactivate user"
                                    data-id="{{route('user_soft_delete',$data->slug)}}"
                                    data-name="{{$data->name}}"
                                    data-photo="{{asset('')}}{{$data->photo}}"
                                    data-creator="{{$data->creator}}"
                                    @if($data->rolename)
                                    data-role="{{$data->rolename->role_name}}" 
                                    @endif
                                    data-email="{{$data->email}}" data-toggle="modal" data-target="#deleteModal"
                                    title="delete user information"><i class="fa fa-power-off"></i></a>
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
                            $("#dt-example-responsive").DataTable({
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

        <div class='col-md-4'>
            <div class='card'>
                <div class='card-body'>
                    <form class='form p-t-20' novalidate enctype='multipart/form-data' method='POST' action="{{route('user_add')}}">
                    @csrf
                        <div class='form-group'>
                            <div class='input-group'>
                                <label for='name'>Name</label>
                            </div>
                            <div class='input-group'>
                                <div class='input-group-addon'><i class='ti ti-user'></i></div>
                                <input name='name' value='' required data-validation-required-message="This field is required" class='form-control text-lower' id='exampleInputuname' placeholder='name'>
                            </div>
                        </div>
                        <div class='form-group'>
                            <div class='input-group'>
                                <label for='name'>email</label>
                            </div>
                            <div class='input-group'>
                                <div class='input-group-addon'><i class='ti ti-envelope'></i></div>
                                <input name='email' type="email" value='' required data-validation-required-message="This field is required" class='form-control text-lower' id='exampleInputuname' placeholder='email'>
                            </div>
                        </div>
                        <div class='form-group'>
                            <div class='input-group'>
                                <label for='name'>user role</label>
                            </div>
                            <div class='input-group'>
                                <div class='input-group-addon'><i class='ti ti-pencil'></i></div>
                                {{-- <input name='name' value='' class='form-control text-lower' id='exampleInputuname' placeholder='input'> --}}
                                <select name="user_role" id="" class='form-control text-lower' required data-validation-required-message="This field is required">
                                    <option value="">select role</option>
                                    @php
                                        $select=App\Models\user_role::where('status',1)->get();
                                    @endphp
                                    @foreach ($select as $item)
                                        <option value="{{$item->role_serial}}">{{$item->role_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class='form-group'>
                            <div class='input-group'>
                                <label for='name'>password</label>
                            </div>
                                <div class="controls">
                                    <input type="password" name='password' required data-validation-required-message="This field is required" value='' class='form-control text-lower' id='exampleInputuname' placeholder='password'>
                                </div>
                        </div>
                        <div class='form-group'>
                            <div class='input-group'>
                                <label for='name'>retype password</label>
                            </div>
                                <div class="controls">
                                    <input name='repass' type="password" value=''required data-validation-match-match="password" class='form-control text-lower' id='exampleInputuname' placeholder='re type password'>
                                </div>
                        </div>

                        <div class='form-group'>
                            <div class='input-group'>
                                <label for='name'>Add Photo</label>
                            </div>
                            <div class='input-group'>
                                <div class='input-group-addon'><i class='ti ti-gallery'></i></div>
                                <input type="file" name='photo' required data-validation-required-message="This field is required" value='' class='form-control text-lower' id='exampleInputuname' placeholder='input'>
                            </div>
                        </div>
                        <button type='submit' class='btn btn-outline-success text-capitalize waves-effect waves-light m-r-10'>Add user</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <img class="loading" style="display:none;position:absolute;top:30%;left:50%;translate: transform(-50%,-50%);z-index:9999;" src="{{asset('loader.gif')}}" alt="">

    {{-- view modal --}}
    <div class="modal fade" id="viwModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalScrollableTitle">User Information</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                    <div class="top">
                            <h1 id="name"></h1>
                            <div class="profile-pic" id="pro-pic">
                                <img style="" src="" id="photo" alt="user">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5"></div>
                            <div class="col-7 p-0">
                                <ul class="top-info">
                                    {{-- <li><i class="ti-location-pin" id="role"></i></li> --}}
                                    {{-- <li><i class="ti-user"></i>23 yr</li> --}}
                                    <li id="role"><i class="ti-heart"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row" style="padding-top:13px;">
                            <div class="col-12">
                                <ul style="display:flex; justify-content:center;">
                                    <li>
                                        <a href="#" target="_blank" class="btn btn-circle btn-outline-primary"><i class="ti-facebook"></i></a>
                                        <a href="#" target="_blank" class="btn btn-circle btn-outline-primary"><i class="ti-twitter"></i></a>
                                        <a href="#" target="_blank" class="btn btn-circle btn-outline-primary"><i class="ti-skype"></i></a>
                                        <a href="#" target="_blank" class="btn btn-circle btn-outline-primary"><i class="ti-linkedin"></i></a>
                                        <a href="#" target="_blank" class="btn btn-circle btn-outline-primary"><i class="ti-world"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row" style="padding-top:7px;">
                            <div class="col-12">
                                <table class="d-info" style="width:auto">
                                    <tr>
                                        <td class="one" style="color:black;font-weight:500;font-size:14px;"> <i class="ti-user" style="padding:0px 10px;"></i>Name</td>
                                        <td style="width:10%;text-align:center;">:</td>
                                        <td style="width:50%" id="name2"></td>
                                    </tr>
                                    <tr>
                                        <td class="one" style="color:black;font-weight:500;font-size:14px;"> <i class="ti-crown" style="padding:0px 10px;"></i>Email</td>
                                        <td style="width:10%;text-align:center;">:</td>
                                        <td style="width:50%" id="email"></td>
                                    </tr>
                                    <tr>
                                        <td class="one" style="color:black;font-weight:500;font-size:14px;"> <i class="ti-heart" style="color:red;padding:0px 10px;"></i>Role</td>
                                        <td style="width:10%;text-align:center;">:</td>
                                        <td style="width:50%;color:red;" id="role2"></td>
                                    </tr>
                                    <tr>
                                        <td class="one" style="color:black;font-weight:500;font-size:14px;"> <i class="ti-mobile" style="padding:0px 10px;"></i>Creator</td>
                                        <td style="width:10%;text-align:center;">:</td>
                                        <td style="width:50%" id="creator"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
          </div>
        </div>
    </div>

      {{-- update modal --}}
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Update Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-material" enctype='multipart/form-data' id="loginform" method="POST" action="">
                        @csrf
                        <div class="form-group m-t-40">
                            <div class="col-xs-12">
                                <input style="color:gray;padding:5px;" id="update_name" type="name" placeholder="name" class="form-control " name="name" value=""  autofocus>
                            </div>
                        </div>
                        <div class="form-group m-t-40">
                            <div class="col-xs-12">
                                <input style="color:gray;padding:5px;" id="update_email" type="email" placeholder="email" class="form-control " name="email" value=""  autofocus>
                            </div>
                        </div>
                        <div class="form-group m-t-40">
                            <div class="col-xs-12">
                                <select style="color:gray;padding:5px;" name="role" type="text" placeholder="role" class="form-control" value=""  autofocus>
                                    <option value="" id="update_role"></option>
                                    @php $role=App\Models\user_role::where('status',1)->get(); @endphp
                                    @foreach ($role as $item)
                                        <option value="{{$item->role_serial}}">{{$item->role_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group m-t-40">
                            <div class="col-xs-12">
                                <input style="color:gray;padding:5px;" type="file" name='photo' class="from-control"  autofocus>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                    <button type="submit" id="submit_btn" class="btn btn-outline-primary">Update Information</button>
                </div>
            </div>
        </div>
    </div>

    {{-- delete modal --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalScrollableTitle">User Information</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="top">
                    <h1 id="name3"></h1>
                    <div class="profile-pic" id="pro-pic">
                        <img style="" src="" id="photo2" alt="user">
                    </div>
                </div>
                <div class="row">
                    <div class="col-5"></div>
                    <div class="col-7 p-0">
                        <ul class="top-info">
                            {{-- <li><i class="ti-location-pin" id="role"></i></li> --}}
                            {{-- <li><i class="ti-user"></i>23 yr</li> --}}
                            <li id="role3"><i class="ti-heart"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="row" style="padding-top:13px;">
                    <div class="col-12">
                        <ul style="display:flex; justify-content:center;">
                            <li>
                                <a href="#" target="_blank" class="btn btn-circle btn-outline-primary"><i class="ti-facebook"></i></a>
                                <a href="#" target="_blank" class="btn btn-circle btn-outline-primary"><i class="ti-twitter"></i></a>
                                <a href="#" target="_blank" class="btn btn-circle btn-outline-primary"><i class="ti-skype"></i></a>
                                <a href="#" target="_blank" class="btn btn-circle btn-outline-primary"><i class="ti-linkedin"></i></a>
                                <a href="#" target="_blank" class="btn btn-circle btn-outline-primary"><i class="ti-world"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row" style="padding-top:7px;">
                    <div class="col-12">
                        <table class="d-info" style="width:auto">
                            <tr>
                                <td class="one" style="color:black;font-weight:500;font-size:14px;"> <i class="ti-user" style="padding:0px 10px;"></i>Name</td>
                                <td style="width:10%;text-align:center;">:</td>
                                <td style="width:50%" id="name4"></td>
                            </tr>
                            <tr>
                                <td class="one" style="color:black;font-weight:500;font-size:14px;"> <i class="ti-crown" style="padding:0px 10px;"></i>Email</td>
                                <td style="width:10%;text-align:center;">:</td>
                                <td style="width:50%" id="email2"></td>
                            </tr>
                            <tr>
                                <td class="one" style="color:black;font-weight:500;font-size:14px;"> <i class="ti-heart" style="color:red;padding:0px 10px;"></i>Role</td>
                                <td style="width:10%;text-align:center;">:</td>
                                <td style="width:50%;color:red;" id="role4"></td>
                            </tr>
                            <tr>
                                <td class="one" style="color:black;font-weight:500;font-size:14px;"> <i class="ti-mobile" style="padding:0px 10px;"></i>Creator</td>
                                <td style="width:10%;text-align:center;">:</td>
                                <td style="width:50%" id="creator2"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <a href="" id='deletelink' class="btn btn-primary">Delete User</a>
            </div>
          </div>
        </div>
    </div>

    {{-- hard delete modal --}}
    <div class="modal fade" id="harddeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalScrollableTitle">User Information</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="top">
                        <h1 id="name3"></h1>
                        <div class="profile-pic" id="pro-pic">
                            <img style="" src="" id="photo2" alt="user">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5"></div>
                        <div class="col-7 p-0">
                            <ul class="top-info">
                                {{-- <li><i class="ti-location-pin" id="role"></i></li> --}}
                                {{-- <li><i class="ti-user"></i>23 yr</li> --}}
                                <li id="role3"><i class="ti-heart"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row" style="padding-top:13px;">
                        <div class="col-12">
                            <ul style="display:flex; justify-content:center;">
                                <li>
                                    <a href="#" target="_blank" class="btn btn-circle btn-outline-primary"><i class="ti-facebook"></i></a>
                                    <a href="#" target="_blank" class="btn btn-circle btn-outline-primary"><i class="ti-twitter"></i></a>
                                    <a href="#" target="_blank" class="btn btn-circle btn-outline-primary"><i class="ti-skype"></i></a>
                                    <a href="#" target="_blank" class="btn btn-circle btn-outline-primary"><i class="ti-linkedin"></i></a>
                                    <a href="#" target="_blank" class="btn btn-circle btn-outline-primary"><i class="ti-world"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row" style="padding-top:7px;">
                        <div class="col-12">
                            <table class="d-info" style="width:auto">
                                <tr>
                                    <td class="one" style="color:black;font-weight:500;font-size:14px;"> <i class="ti-user" style="padding:0px 10px;"></i>Name</td>
                                    <td style="width:10%;text-align:center;">:</td>
                                    <td style="width:50%" id="name4"></td>
                                </tr>
                                <tr>
                                    <td class="one" style="color:black;font-weight:500;font-size:14px;"> <i class="ti-crown" style="padding:0px 10px;"></i>Email</td>
                                    <td style="width:10%;text-align:center;">:</td>
                                    <td style="width:50%" id="email2"></td>
                                </tr>
                                <tr>
                                    <td class="one" style="color:black;font-weight:500;font-size:14px;"> <i class="ti-heart" style="color:red;padding:0px 10px;"></i>Role</td>
                                    <td style="width:10%;text-align:center;">:</td>
                                    <td style="width:50%;color:red;" id="role4"></td>
                                </tr>
                                <tr>
                                    <td class="one" style="color:black;font-weight:500;font-size:14px;"> <i class="ti-mobile" style="padding:0px 10px;"></i>Creator</td>
                                    <td style="width:10%;text-align:center;">:</td>
                                    <td style="width:50%" id="creator2"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <a href="" id='deletelink' class="btn btn-primary">Delete User</a>
                </div>
              </div>
            </div>
        </div>

</div>

{{-- all deactive user --}}
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body all-user" style="overflow-x:scroll;">
                        <h3>All Deactive User</h3>
                    <table id="dt-example-responsive2" class="table table-bordered"  cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>mail</th>
                                <th>role</th>
                                <th>creator</th>
                                <th>photo</th>
                                <th>manage</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            @php $i=1 @endphp
                            @foreach ($deactive as $data)
                            @php $check=$data->role_serial; $check= (int)$check; @endphp
                            @php $role=App\Models\user_role::where('role_serial',$check)->select('role_name')->firstOrFail();  @endphp
                            <tr>
                                <td style="vertical-align:middle;">{{$i++}}</td>
                                <td style="vertical-align:middle;">{{$data->name}}</td>
                                <td style="vertical-align:middle;">{{$data->email}}</td>
                                <td style="vertical-align:middle;">{{$data->rolename->role_name}}</td>
                                <td style="vertical-align:middle;">{{$data->creator}}</td>
                                <td style="vertical-align:middle;">
                                    <div class="div" style="height:70px; width:70px; overflow:hidden; border-radius:50%;padding:2px; border:1px solid gray;">
                                        <img style="height:100%;width:100%;border-radius:50%;" id="profile-pic" src="{{asset('')}}{{$data->photo}}" alt="profile pic">
                                    </div>
                                </td>
                                <td style="vertical-align:middle;">
                                    {{-- <a href="{{route('user_view',$data->slug)}}"title="view user"><i class="fa fa-plus"></i></a> --}}
                                    <a href="#" class="view-modal" id="viewData"
                                    data-id="{{route('user_viewm',$data->slug)}}"
                                    data-name="{{$data->name}}"
                                    data-photo="{{asset('')}}{{$data->photo}}"
                                    data-creator="{{$data->creator}}"
                                    data-role="{{$data->rolename->role_name}}"
                                    data-email="{{$data->email}}" data-toggle="modal"
                                    data-target="#viwModal" title="view user"><i class="fa fa-vcard-o"></i></a>

                                    <a href="#" id="update-modal"
                                    data-id="{{route('user_update',$data->slug)}}"
                                    data-name="{{$data->name}}"
                                    data-roles="{{$data->role_serial}}"
                                    data-role="{{$data->rolename->role_name}}"
                                    data-email="{{$data->email}}" class="update-modal" data-toggle="modal" data-target="#updateModal" title="edit user information"><i class="fa fa-pencil"></i></a>

                                    <a href="#" class="delete-modal" id="deleteData"
                                    data-id="{{route('user_hard_delete',$data->slug)}}"
                                    data-btn="Delete User Permanently"
                                    data-name="{{$data->name}}"
                                    data-photo="{{asset('')}}{{$data->photo}}"
                                    data-creator="{{$data->creator}}"
                                    data-role="{{$data->rolename->role_name}}"
                                    data-email="{{$data->email}}" data-toggle="modal" data-target="#deleteModal" title="delete user information"><i class="fa fa-trash"></i></a>
                                    <a href="{{route('user_restore',$data->slug)}}"><i class="fa fa-spin fa-refresh"></i></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <script type="text/javascript">
                        document.addEventListener("DOMContentLoaded", function() {
                            app._loading.show($("#dt-ext-responsive2"), {
                                spinner: true
                            });
                            $("#dt-example-responsive2").DataTable({
                                "responsive": false,
                                "initComplete": function(settings, json) {
                                    setTimeout(function() {
                                        app._loading.hide($("#dt-ext-responsive2"));
                                    }, 1000);
                                }
                            });
                        });

                    </script>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
