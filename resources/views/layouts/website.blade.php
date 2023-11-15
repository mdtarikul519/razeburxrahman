<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Razebur rahman</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700,800,900">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,600,700,800,900">
    <!-- bootstrap frame work -->
    <script src="{{asset('contents/website')}}/js/jquery-3.2.1.min.js"></script>
    <script src="{{asset('contents/website')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('contents/website')}}/js/popper.min.js"></script>
    <script src="{{asset('contents/website')}}/js/bootstrap-better-nav.min.js"></script>
    <!-- website css -->
    <link rel="stylesheet" href="{{asset('contents/website')}}/css/theme.css">
    
    <meta property="og:title" content="Razebur rahman" />
    <meta property="og:description" content="সেক্রেটারি জেনারেল, বাংলাদেশ ইসলামী ছাত্রশিবির">
    <meta property="og:type" content="article" />
    <meta property="og:image" content="https://razeburrahman.info/uploads/cp-profile/image/0NHszZD8Syyi1EDuB9tto2FmPIzBUkxAod5fC1Xu.png" />
    <meta property="og:image:width" content="600" />
    <meta property="og:image:height" content="315" />
    
    <meta name="twitter:title" content="Razebur rahman" />
    <meta name="twitter:description" content="সেক্রেটারি জেনারেল, বাংলাদেশ ইসলামী ছাত্রশিবির">
    <meta name="twitter:image" content="https://razeburrahman.info/uploads/cp-profile/image/0NHszZD8Syyi1EDuB9tto2FmPIzBUkxAod5fC1Xu.png">
    <meta name="twitter:card" content="https://razeburrahman.info/uploads/cp-profile/image/0NHszZD8Syyi1EDuB9tto2FmPIzBUkxAod5fC1Xu.png">
    
</head>

<body>

    @yield('content')


    <footer class="bg1">
        <div class="container">
            <div class="row">
                <div class="col-12">
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
                <div class="col-12">
                    <a href="mailto:write@mrashedulislam.info.info">write@razeburrahman.info</a>
                    <p style="color:#adadad;">Copyright &COPY; 2021 Razeburrahman</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{asset('contents/website')}}/js/owl.carousel.min.js"></script>
    <script src="{{asset('contents/website')}}/js/progressbar.js"></script>
    <script src="{{asset('contents/website')}}/js/wow.min.js"></script>
    <script src="{{asset('contents/website')}}/js/venobox.min.js"></script>
    <script src="{{asset('contents/website')}}/js/custom.js"></script>
</body>

</html>
