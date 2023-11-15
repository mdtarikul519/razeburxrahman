<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<title> Razebur rahman </title>
	<meta name="keywords" content="HTML5 Template">
	<meta name="author" content="itembridge.com">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Favicon -->
	{{-- <link rel="shortcut icon" href="{{asset('contents/blog')}}/images/favicon.ico"> --}}

	<!-- Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Engagement' rel='stylesheet' type='text/css'>

	<!-- Icon Fonts -->
	<link rel="stylesheet" href="{{asset('contents/blog')}}/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{asset('contents/blog')}}/css/themify-icons.css">

	<!-- Theme CSS -->
	<link rel="stylesheet" href="{{asset('contents/blog')}}/style.css">
	<link rel="stylesheet" href="{{asset('contents/blog')}}/css/grid.css">
	<link rel="stylesheet" href="{{asset('contents/blog')}}/css/ui.css">
	<link rel="stylesheet" href="{{asset('contents/blog')}}/css/magnific-popup.css">

	<link rel="stylesheet" type="text/css" href="{{asset('contents/blog')}}/css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="{{asset('contents/blog')}}/css/owl.theme.css">
	<link rel="stylesheet" type="text/css" href="{{asset('contents/blog')}}/css/owl.transitions.css">

	<!-- REVOLUTION STYLE SHEETS -->
	<link rel="stylesheet" type="text/css" href="{{asset('contents/blog')}}/js/rs-plugin/css/settings.css">
	<!-- REVOLUTION LAYERS STYLES -->
	<link rel="stylesheet" type="text/css" href="{{asset('contents/blog')}}/js/rs-plugin/css/layers.css">
	<!-- REVOLUTION NAVIGATION STYLES -->
	<link rel="stylesheet" type="text/css" href="{{asset('contents/blog')}}/js/rs-plugin/css/navigation.css">
	<link rel="stylesheet" type="text/css" href="{{asset('contents/blog')}}/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="{{asset('contents/blog')}}/css/custom.css">
    <link rel="stylesheet" type="text/css" href="{{asset('contents/website')}}/css/venobox.css">

	<!--[if lt IE 9]>
		<script src="js/html5shiv.min.js"></script>
		<script src="js/respond.min.js"></script>
    <![endif]-->

    <style>
        .widget h2.widget-title span:before, .widget h2.widget-title span:after{
            top:12px;
        }
        .widget .widget-container{
            display: inline-flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        
        .widget.widget_author .author-thumb img {
             border-radius: unset; 
            max-width: unset;
        }
        .widget.widget_author .author-thumb {
            margin-bottom: 25px;
            border: 1px solid white;
            /* height: 195px; */
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0px 0px 5px #0000005e;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #00b6ec;
        }
        .widget.widget_author .author-thumb img {
            /* border-radius: 50%; */
            max-width: unset;
            width: unset;
            width: 100%;
            /* width: 180px; */
            transform: scale(.8);
            /* height: 180px; */
            margin-top: 26px;
        }
    </style>

</head>

<body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v4.0"></script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v4.0&appId=429698594299209&autoLogAppEvents=1"></script>


<!-- *** THEME CONTAINER STARTS *** -->
<div class="artigo-navigation-holder" id="nav2" style="position:fixed;top:0;left:0;z-index:99999;display:none;">
    <div class="artigo-container">

        <!-- *** MAIN NAVIGATION STARTS *** -->
        <div id="artigo-responsive-menu-trigger" style="width: 150px;">
                        <img src="{{asset('contents/website/images/logo/logo1.png')}}" alt="Dr.Salahuddin Ayubi">
                    </div>
        <nav class="main-nav">
            <ul>
                <li >
                    <a href="{{route('website_index')}}">প্রচ্ছদ</a>
                </li>
                <li >
                    <a href="{{route('website_blog_category','ইসলাম')}}">ইসলাম</a>
                </li>
                <li >
                    <a href="{{route('website_blog_category','ইসলামী আন্দোলন')}}">ইসলামী আন্দোলন</a>
                </li>
                <li >
                    <a href="{{route('website_blog_category','বাংলাদেশ')}}">বাংলাদেশ</a>
                </li>
                <li >
                    <a href="{{route('website_blog_category','কবিতা')}}">কবিতা</a>
                </li>
                <li >
                    <a href="{{route('website_blog_category','রাজনীতি')}}">রাজনীতি</a>
                </li>
                <li >
                    <a href="{{route('website_blog_category','সমসাময়িক')}}">সমসাময়িক</a>
                </li>
                <li >
                    <a href="{{route('website_blog_category','ইতিহাস')}}">ইতিহাস</a>
                </li>
                <li >
                    <a href="{{route('website_blog_category','বিবিধ')}}">বিবিধ</a>
                </li>
                <li >
                    <a href="{{route('website_gallery','ফটো গ্যালারি')}}">ফটো গ্যালারি</a>
                </li>
                <li >
                    <a href="{{route('website_video','ভিডিও গ্যালারি')}}">ভিডিও গ্যালারি</a>
                </li>
            </ul>
        </nav>
        <!-- *** MAIN NAVIGATION END *** -->

        <div class="nav-inner-right">
                        <a href="#" class="search-button2"> <i class="ti-search"></i> </a>
                    </div>
                    <form class=" search-form2" style="opacity:0;" action="{{route('single_category_post_search')}}" method="GET">
                        @csrf
                        <input type="text" placeholder=" সার্চ করুন" name="search" value="{{request('search') ?? ''}}">
                        <i class="fa fa-close"></i>
                    </form>

    </div>
</div>

<div class="artigo-theme-container">

	<!-- *** HEADER STARTS *** -->
	<header id="artigo-masthead" class="artigo-std-header" id="navbar1">
		<div class="header-main">
			<div class="artigo-container">
				<div id="logo">
					<h1 class="site-title"><a href="{{route('website_index')}}" rel="home"> Razebur rahman </a></h1>
				</div>
			</div>

			<div class="artigo-navigation-holder" >
				<div class="artigo-container">

					<!-- *** MAIN NAVIGATION STARTS *** -->
					<div id="artigo-responsive-menu-trigger" style="width: 150px;">
                        <img src="{{asset('contents/website/images/logo/logo1.png')}}" alt="Dr.Mobarak Hossain">
                    </div>
					<nav class="main-nav">
						<ul>
                            <li >
                                <a href="{{route('website_index')}}">প্রচ্ছদ</a>
                            </li>
                            <li >
                                <a href="{{route('website_blog_category','ইসলাম')}}">ইসলাম</a>
                            </li>
                            <li >
                                <a href="{{route('website_blog_category','ইসলামী আন্দোলন')}}">ইসলামী আন্দোলন</a>
                            </li>
                            <li >
                                <a href="{{route('website_blog_category','বাংলাদেশ')}}">বাংলাদেশ</a>
                            </li>
                            <li >
                                <a href="{{route('website_blog_category','কবিতা')}}">কবিতা</a>
                            </li>
                            <li >
                                <a href="{{route('website_blog_category','রাজনীতি')}}">রাজনীতি</a>
                            </li>
                            <li >
                                <a href="{{route('website_blog_category','সমসাময়িক')}}">সমসাময়িক</a>
                            </li>
                            <li >
                                <a href="{{route('website_blog_category','ইতিহাস')}}">ইতিহাস</a>
                            </li>
                            <li >
                                <a href="{{route('website_blog_category','বিবিধ')}}">বিবিধ</a>
                            </li>
                            <li >
                                <a href="{{route('website_gallery','ফটো গ্যালারি')}}">ফটো গ্যালারি</a>
                            </li>
                            <li >
                                <a href="{{route('website_video','ভিডিও গ্যালারি')}}">ভিডিও গ্যালারি</a>
                            </li>
						</ul>
					</nav>
					<!-- *** MAIN NAVIGATION END *** -->

					<div class="nav-inner-right">
                        <a href="#" class="search-button"> <i class="ti-search"></i> </a>
                    </div>
                    <form class="search-form" style="opacity:0;" action="{{route('single_category_post_search')}}" method="GET">
                        @csrf
                        <input type="text" placeholder=" সার্চ করুন" name="search" value="{{request('search') ?? ''}}">
                        <i class="fa fa-close"></i>
                    </form>

				</div>
			</div>

		</div>

    </header>



    <!-- *** HEADER ENDS *** -->

    @yield('content')



</div>

</div>
<!-- *** CONTENT WRAP ENDS *** -->

<!-- *** FOOTER STARTS *** -->
<footer id="artigo-footer" style="background:#e3f1e2;">


<div class="artigo-container" >
    <div id="artigo-goto-top" class="artigo-top"> <a href="javascript:void(0);"> <i class="ti-upload"> </i> Back to top  </a> </div>
</div>



<div class="artigo-copyrights" style="background:#3f4551;">
    <div class="artigo-container">
        <div class="col-12 blog-footer-links" style="text-align:center">
            <ul>
                @php $link = App\Models\personalinfo::where('icon','fa fa-facebook')->firstOrFail(); @endphp
                        <li><a href="{{$link->link}}"><img src="{{asset('contents/website')}}/images/icons/fb.png" alt="facebook"></a></li>
                        @php $link = App\Models\personalinfo::where('icon','fa fa-twitter')->firstOrFail(); @endphp
                        <li><a href="{{$link->link}}"><img src="{{asset('contents/website')}}/images/icons/twitter.png" alt="twitter"></a></li>
                        @php $link = App\Models\personalinfo::where('icon','fa fa-youtube')->firstOrFail(); @endphp
                        <li><a href="{{$link->link}}"><img src="{{asset('contents/website')}}/images/icons/youtube.png" alt="youtube"></a></li>
                        @php $link = App\Models\personalinfo::where('icon','fa fa-instagram')->firstOrFail(); @endphp
                        <li><a href="{{$link->link}}"><img src="{{asset('contents/website')}}/images/icons/intstagram.png" alt="instagram"></a></li>
                        @php $link = App\Models\personalinfo::where('icon','fa fa-envelope')->firstOrFail(); @endphp
                        <li><a href="{{$link->link}}"><img src="{{asset('contents/website')}}/images/icons/email.png" alt="gmail"></a></li>
            </ul>
        </div>
        <p>write@razeburrahman.info</p>
        <p> 2019 &copy; Copyright <a href="/" title=""> Razebur rahman</a></p>
    </div>
</div>

</footer>
<!-- *** FOOTER ENDS *** -->

</div>
<!-- *** THEME CONTAINER ENDS *** -->


<!-- JQUERY INCLUDES -->
<script src="{{asset('contents/blog')}}/js/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="{{asset('contents/blog')}}/js/jquery.migrate.min.js"></script>

<script src="{{asset('contents/blog')}}/js/plugins.js"></script>
<script src="{{asset('contents/blog')}}/js/functions.js"></script>

<!-- REVOLUTION JS FILES -->
<script src="{{asset('contents/blog')}}/js/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script src="{{asset('contents/blog')}}/js/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

<!-- SLICEY ADD-ON FILES -->
<script src='{{asset('contents/blog')}}/js/rs-plugin/js/revolution.addon.slicey.min.js?ver=1.0.0'></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script src="{{asset('contents/blog')}}/js/rs-plugin/js/extensions/revolution.extension.actions.min.js"></script>
<script src="{{asset('contents/blog')}}/js/rs-plugin/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="{{asset('contents/blog')}}/js/rs-plugin/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="{{asset('contents/blog')}}/js/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="{{asset('contents/blog')}}/js/rs-plugin/js/extensions/revolution.extension.migration.min.js"></script>
<script src="{{asset('contents/blog')}}/js/rs-plugin/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="{{asset('contents/blog')}}/js/rs-plugin/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="{{asset('contents/blog')}}/js/rs-plugin/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="{{asset('contents/blog')}}/js/rs-plugin/js/extensions/revolution.extension.video.min.js"></script>
<script src="{{asset('contents/blog')}}/js/rs-plugin/js/revolution-script-demo.js"></script>
<script src="{{asset('contents/blog')}}/js/rs-plugin/js/revolution-fullwidth-slider-demo.js"></script>
<script src="{{asset('contents/website')}}/js/venobox.min.js"></script>
<script>
    $(document).ready(function () {
        $(".post-tmb2 p img").css('height','196px');
        $(".post-tmb2 p img").css('width','100%');
        $(".side-thumb p img").css('height','86px');
        $(".side-thumb p img").css('width','120px');
        $(".side-thumb p").css('text-align','center');
        $('.venobox').venobox({
            // framewidth: '400px',        // default: ''
            // frameheight: '300px',       // default: ''
            border: '10px',             // default: '0'
            bgcolor: 'white',         // default: '#fff'
            titleattr: 'data-title',    // default: 'title'
            numeratio: true,            // default: false
            infinigall: true
        });

        $('.pagination ul li').addClass('page-numbers');
        $('.pagination ul .disabled').addClass('prev');
        $('.pagination ul li').last().addClass('next');
        // $('.pagination ul li').last().children('i');
        // $('.pagination .page-item .prev').addClass('prev');
        $('.pagination .active').addClass('current');

        var navOffset = $('.main-nav').offset().top+100;

        $(window).scroll(function () {
            var scrolling = $(this).scrollTop();
            if (scrolling > navOffset) {
                $('#nav2').css('display','block');
            } else {
                $('#nav2').css('display','none');
            }
        });
        $('.search-button').click(function(){
            $('.search-form').css('opacity','1');
        });

        $('.search-form i').click(function(){
            $('.search-form').css('opacity','0');
        });
        
        $('.search-button2').click(function(){
            $('.search-form2').css('opacity','1');
        });

        $('.search-form2 i').click(function(){
            $('.search-form2').css('opacity','0');
        });
    });


</script>
<style>
    .artigo-content-wrap{
        margin-bottom: 0;
        background: #e3f1e2;
    }
    body,h2,h3,h4,h5,h6,p,input{
        font-family: bangla;
    }
    #logo h1, #footer-logo h1 a{
        font-family: 'Engagement', cursive;
    }

    .search-form i,
    .search-form2 i{
        position: absolute;
        right: 13px;
        top: 50%;
        transform: translateY(-50%);
        color: black;
        font-size: 20px;
        cursor: pointer;
    }
    .search-form,
    .search-form2{
        z-index: 99999;
        position: absolute;
        top: 68px;
        width: 100%;
        left:0;
        background: #fcb040;
    }
    .search-form input,
    .search-form2 input{
        margin-bottom: 0;
        color: black;
        font-size: 16px;
    }
    .search-form input:focus,
    .search-form2 input:focus{
        border: 1px solid black;
    }
    .search-form input::placeholder,
    .search-form2 input::placeholder{
        color: black;
    }

    .artigo-blog-item .entry-header h4 a:hover,
    .widget.widget_recent_entries ul li a:hover,
    .artigo-col-4 .artigo-blog-item .entry-header h4 a:hover,
    .artigo-col-6 .artigo-blog-item .entry-header h4 a:hover{
        color: #95191b;
    }
    .widget.widget_recent_entries ul li a{
        display: block;
        text-align: center;
    }
    .widget.widget_recent_entries ul li:first-child p{
        text-align: justify;
        margin-top: 10px;
    }
    
    .blog-footer-links{}
    .blog-footer-links ul{
        margin:0;
        display:inline-block;
    }
    .blog-footer-links ul li{
        float:left;
        list-style-type:none;
    }
    .blog-footer-links ul li a{
        display:inline-block;
        margin: 0px 4px;
    }
    .blog-footer-links ul li a img{
        width:40px;
    }
</style>
</body>
</html>
