<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Razebur rahman</title>
    {{-- <link rel="icon" type="image/png" sizes="16x16" href="{{asset('contents/admin/assets')}}/images/favicon.png"> --}}
    <link href="{{asset('contents/admin/assets')}}/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('contents/admin/assets')}}/plugins/morrisjs/morris.css" rel="stylesheet">
    <link href="{{asset('contents/admin/assets')}}/plugins/html5-editor/bootstrap-wysihtml5.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('contents/admin/assets')}}/plugins/dropify/dist/css/dropify.min.css">
    {{-- <link href="{{asset('contents/admin')}}/css/style-dark.css" rel="stylesheet"> --}}
    <link href="{{asset('contents/admin')}}/css/style.css" rel="stylesheet">
    {{-- <link href="{{asset('contents/admin')}}/css/colors/blue-dark.css" id="theme" rel="stylesheet"> --}}
    <link href="{{asset('contents/admin')}}/css/colors/blue.css" id="theme" rel="stylesheet">
    <link href="{{asset('contents/admin')}}/css/own-style.css" id="theme" rel="stylesheet">
    <script src="{{asset('contents/admin')}}/js/sweetalert.min.js"></script>

</head>

<body class="fix-header fix-sidebar card-no-border">
    {{-- <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div> --}}
    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" style="background:#1976d2; border-right:1px solid gray;">
                    <a class="navbar-brand" href="{{route('admin_index')}}" >
                        <b>
                            @php
                                // $logo=App\Models\frontlogo::where('id',1)->firstOrFail();
                            @endphp
                            {{-- <img src="{{asset('uploads')}}/{{$logo->name}}" alt="homepage" class="dark-logo" /> --}}
                            {{-- <img src="{{asset('contents/admin/assets')}}/images/logo-light-icon.png" alt="homepage" class="light-logo" /> --}}
                        </b>
                        <span>
                         <img style="width:90%" src="{{asset('contents/website/images/logo/logo1.png')}}" alt="homepage" class="dark-logo" />
                         {{-- <img src="{{asset('contents/admin/assets')}}/images/logo-light-text.png" class="light-logo" alt="homepage" /> --}}
                       </span>
                    </a>
                </div>
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="#"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-message"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu mailbox animated slideInUp">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <a href="index.html#">
                                                <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                                <div class="mail-contnet">
                                                <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span> </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-email"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu mailbox animated slideInUp" aria-labelledby="2">
                                <ul>
                                    <li>
                                        @php
                                            $count=App\Models\contact_message::where('status',1)->count();
                                        @endphp
                                        <div class="drop-title">You have {{$count}} new messages</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            @php
                                                $select=App\Models\contact_message::where('status',1)->get();
                                            @endphp
                                            @foreach ($select as $item)
                                            <a href="{{route('message_view',$item->slug)}}">
                                                    <div class="user-img">
                                                        <img src="{{asset('contents/admin/assets')}}/images/users/1.jpg" alt="user" class="img-circle">
                                                        <span class="profile-status online pull-right"></span>
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h5>{{$item->name}}</h5>
                                                        <span class="mail-desc">{{$item->message}}</span>
                                                        <span class="time">{{$item->created_at}}</span>
                                                    </div>
                                                </a>
                                            @endforeach

                                        </div>
                                    </li>

                                    <li>
                                        <a class="nav-link text-center" href="{{route("message_index")}}"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="flag-icon flag-icon-bd"></i></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('')}}{{ Auth::user()->photo }}" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="{{asset('')}}{{ Auth::user()->photo }}" alt="user"></div>
                                            <div class="u-text">
                                                <h4>{{ Auth::user()->name }}</h4>
                                                <p class="text-muted">{{ Auth::user()->email }}</p><a href="{{route('user_profile',Auth::user()->slug)}}" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{route('user_profile',Auth::user()->slug)}}"><i class="ti-user"></i> My Profile</a></li>
                                    {{-- <li><a href="index.html#"><i class="ti-wallet"></i> My Balance</a></li> --}}
                                    <li><a href="{{route('message_index')}}"><i class="ti-email"></i> Inbox</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{route('user_settings',Auth::user()->slug)}}"><i class="ti-settings"></i> Account Setting</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Logout</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar">
            <div class="scroll-sidebar">
                <div class="user-profile">
                    <div class="profile-img"> <img class="img-fluid" src="{{asset('')}}{{Auth::user()->photo}}" alt="user" />
                        <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </div>
                    <div class="profile-text">
                        <h5>{{ Auth::user()->name }} </h5>
                        <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="mdi mdi-settings"></i></a>
                        <a href="{{route('message_index')}}" class="" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
                        <a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <div class="dropdown-menu animated flipInY">
                            <a href="{{route('user_profile',Auth::user()->slug)}}" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                            <a href="{{route('message_index')}}" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{route('user_settings',Auth::user()->slug)}}" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-small-cap">MAIN NAVIGATION</li>
                        <li class="nav-devider"></li>

                        <li> <a href="{{url('admin')}}">
                            <i class="mdi mdi-gauge"></i>
                            <span class="hide-menu">Dashboard </span>
                            </a>
                        </li>
                        @php global $permission; if(Auth::user()->role_serial != 1)$permission="style=display:none;"@endphp
                        <li {{$permission}}> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-user-circle"></i><span class="hide-menu">User</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('admin/user')}}">All User </a></li>
                                <li><a href="{{route('user_role_index')}}">User Role </a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="{{route('admin.questions')}}">
                                <i class="fa fa-comments"></i>
                                <span class="hide-menu">Questions</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('post_add_view')}}">
                                <i class="fa fa-book"></i>
                                <span class="hide-menu">Add New Blog</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('post_add_photo_view')}}">
                                <i class="fa fa-image"></i>
                                <span class="hide-menu">Add photos</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('post_add_video_view')}}">
                                <i class="fa fa-youtube-play"></i>
                                <span class="hide-menu">Add video</span>
                            </a>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-user-circle"></i><span class="hide-menu">Website</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('banner')}}">All Banner </a></li>
                                <li><a href="{{route('aboutme')}}">about me short</a></li>
                {{-- <li><a href="{{route('aboutmedetails.index')}}">about me details</a></li> --}}
                                <li><a href="{{route('social_link')}}">social media links</span>
                            </a>
                        </li>
                            </ul>
                        </li>

                    <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">News Sections</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('news_category')}}">News Categories</a></li>
                                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-book-open-page-variant"></i> <span class="hide-menu">News Post</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{route('post')}}">All news</a></li>
                                        <li><a href="{{route('post_add_view')}}">Add news</a></li>
                                    </ul>
                                </li>
                                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-book-open-page-variant"></i> <span class="hide-menu">Category wise Post</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{route('post_category_wise_view','ইসলাম')}}">ইসলাম</a></li>
                                        <li><a href="{{route('post_category_wise_view','ইসলামী আন্দোলন')}}">ইসলামী আন্দোলন</a></li>
                                        <li><a href="{{route('post_category_wise_view','বাংলাদেশ')}}">বাংলাদেশ</a></li>
                                        <li><a href="{{route('post_category_wise_view','রাজনীতি')}}">রাজনীতি</a></li>
                                        <li><a href="{{route('post_category_wise_view','সমসাময়িক')}}">সমসাময়িক</a></li>
                                        <li><a href="{{route('post_category_wise_view','ইতিহাস')}}">ইতিহাস</a></li>
                                        <li><a href="{{route('post_category_wise_view','বিবিধ')}}">বিবিধ</a></li>
                                        <li><a href="{{route('post_category_wise_view','ফটো গ্যালারি')}}">ফটো গ্যালারি</a></li>
                                        <li><a href="{{route('post_category_wise_view','ভিডিও গ্যালারি')}}">ভিডিও গ্যালারি</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li> 

                        <li> 
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                                <i class="ti ti-book"></i>
                                <span class="hide-menu">Blog Management</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('post_add_view')}}"><i class="ti ti-comments"></i> Add Blog</a></li>
                                <li><a href="{{route('news_category')}}"><i class="ti ti-package"></i> Blog Categories</a></li>
                                <li><a href="{{route('postTag')}}"><i class="ti ti-notepad"></i> Blog Tags</a></li>
                                <li> 
                                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                                        <i class="ti ti-receipt"></i> 
                                        <span class="hide-menu">Category wise Blog</span>
                                    </a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{route('post')}}">All Blogs</a></li>
                                        <li><a href="{{route('post_category_wise_view','ইসলাম')}}">ইসলাম</a></li>
                                        <li><a href="{{route('post_category_wise_view','ইসলামী আন্দোলন')}}">ইসলামী আন্দোলন</a></li>
                                        <li><a href="{{route('post_category_wise_view','বাংলাদেশ')}}">বাংলাদেশ</a></li>
                                        <li><a href="{{route('post_category_wise_view','রাজনীতি')}}">রাজনীতি</a></li>
                                        <li><a href="{{route('post_category_wise_view','সমসাময়িক')}}">সমসাময়িক</a></li>
                                        <li><a href="{{route('post_category_wise_view','ইতিহাস')}}">ইতিহাস</a></li>
                                        <li><a href="{{route('post_category_wise_view','বিবিধ')}}">বিবিধ</a></li>
                                        <li><a href="{{route('post_category_wise_view','ফটো গ্যালারি')}}">ফটো গ্যালারি</a></li>
                                        <li><a href="{{route('post_category_wise_view','ভিডিও গ্যালারি')}}">ভিডিও গ্যালারি</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        {{-- <li>
                            <a href="{{route('chat_home')}}">
                                <i class="fa fa-comments"></i>
                                <span class="hide-menu">Chat</span>
                            </a>
                        </li> --}}
                        <li> <a href="{{url('/')}}" target="_blank"><i class="fa fa-globe"></i><span class="hide-menu">Visit Site</span></a></li>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i><span class="hide-menu">Logout </span></a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </nav>
            </div>
        </aside>

            @yield('contents')

        </div>
            <footer class="footer"> © 2019 admin panel. Developed by Md Shefat. </footer>
        </div>
    </div>
    <script src="{{asset('contents/admin/assets')}}/plugins/bootstrap/js/slim.min.js"></script>
    <script src="{{asset('contents/admin/assets')}}/plugins/jquery/jquery.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.1.1.min.js"> --}}
    <script src="{{asset('contents/admin/assets')}}/plugins/bootstrap/js/popper.min.js"></script>
    <script src="{{asset('contents/admin/assets')}}/plugins/bootstrap/js/feather.min.js"></script>
    <script src="{{asset('contents/admin/assets')}}/plugins/bootstrap/js/eva.min.js"></script>
    <script src="{{asset('contents/admin/assets')}}/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{asset('contents/admin')}}/js/jquery.slimscroll.js"></script>
    <script src="{{asset('contents/admin')}}/js/waves.js"></script>
    <script src="{{asset('contents/admin')}}/js/sidebarmenu.js"></script>
    <script src="{{asset('contents/admin/assets')}}/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="{{asset('contents/admin')}}/js/custom.min.js"></script>
    <script src="{{asset('contents/admin')}}/js/dashboard1.js"></script>

    <script src="{{asset('contents/admin')}}/js/app.js"></script>
    <script src="{{asset('contents/admin')}}/js/datatables.min.js"></script>
    <script src="{{asset('contents/admin/assets')}}/plugins/html5-editor/wysihtml5-0.3.0.js"></script>
    <script src="{{asset('contents/admin/assets')}}/plugins/html5-editor/bootstrap-wysihtml5.js"></script>
    <script src="{{asset('contents/admin/assets')}}/plugins/dropify/dist/js/dropify.min.js"></script>
    <script src="{{asset('contents/admin')}}/js/validation.js"></script>
    <script src="{{asset('contents/admin')}}/js/ajax.js"></script>
    <script src="{{asset('contents/admin/assets')}}/plugins/raphael/raphael-min.js"></script>
    {{-- <script src="{{asset('contents/admin/assets')}}/plugins/morrisjs/morris.min.js"></script> --}}
    <script src="{{asset('contents/admin/assets')}}/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="{{asset('contents/admin')}}/js/dashboard4.js"></script>
    <script src="{{asset('contents/admin/assets')}}/plugins/styleswitcher/jQuery.style.switcher.js"></script>

    <script>
        $(document).ready(function() {
            $('.textarea_editor').wysihtml5();

            $('.dropify').dropify();

            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'Désolé, le fichier trop volumineux'
                }
            });

            // Used events
            var drEvent = $('#input-file-events').dropify();

            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });

            drEvent.on('dropify.errors', function(event, element) {
                console.log('Has Errors');
            });

            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            });
        });

        ! function(window, document, $) {
            "use strict";
            $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(), $(".skin-square input").iCheck({
                checkboxClass: "icheckbox_square-green",
                radioClass: "iradio_square-green"
            }), $(".touchspin").TouchSpin(), $(".switchBootstrap").bootstrapSwitch();
        }(window, document, jQuery);
    </script>

<script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        window.onload = function () {
            var objDiv = document.getElementById("scroll");
            objDiv.scrollTop = objDiv.scrollHeight
        }
        $(document).ready(function () {
            clicked = !0;
            $(".mode").click(function () {
                if (clicked) {
                    $('head').append(
                        '<link href="dist/css/dark.min.css" id="dark" type="text/css" rel="stylesheet">'
                        );
                    clicked = !1
                } else {
                    $('#dark').remove();
                    clicked = !0
                }
            })
        });
        $(function () {
            'use strict'
            $('[data-chat="open"]').on('click', function () {
                $('.chat').toggleClass('open')
            })
        })
        $(function () {
            'use strict'
            $('[data-utility="open"]').on('click', function () {
                $('.utility').toggleClass('open')
            })
        })
        $(document).ready(function () {
            var valueOnLoad = "direct";
            $(".filter").not('.' + valueOnLoad).hide('3000');
            $(".filter").not('.' + valueOnLoad).hide('3000');
            $(".filter-btn").click(function () {
                var value = $(this).attr('data-filter');
                $(".filter").not('.' + value).hide('3000')
                $('.filter').filter('.' + value).show('3000')
            })
        });
        eva.replace()

    </script>
</body>

</html>
