@extends('layouts.website')
@section('content')

    <!-- banner part start -->

    <section id="banner">
        <div class="container-out">
            <div class="row banner m-0 owl-carousel ">
                @php
                    $banner = App\Models\banner::where('status',1)->latest()->get();
                @endphp
                @foreach ($banner as $item)
                    <div class="col-md-12 p-0">
                        <div class="slider-body"style="background: url('{{asset('')}}{{$item->banner_img}}');background-size: cover;background-position:center center; background-repeat: no-repeat;"></div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- social icons -->

    <section id="social-icon" class="bg1">
        <div class="container">
            <div class="row">
                <div class="col-md-7 text-center">
                    <ul class="d-inline-block">
                        @php $link = App\Models\personalinfo::where('icon','fa fa-facebook')->firstOrFail(); @endphp
                        <li><a href="{{$link->link}}"><img src="{{asset('contents/website')}}/images/icons/fb.png" alt="facebook"></a></li>
                        @php $link = App\Models\personalinfo::where('icon','fa fa-twitter')->firstOrFail(); @endphp
                        <li><a href="{{$link->link}}"><img src="{{asset('contents/website')}}/images/icons/twitter.png" alt="twitter"></a></li>
                        @php $link = App\Models\personalinfo::where('icon','fa fa-youtube')->firstOrFail(); @endphp
                        <li><a href="{{$link->link}}"><img src="{{asset('contents/website')}}/images/icons/youtube.png" alt="youtube"></a></li>
                        @php $link = App\Models\personalinfo::where('icon','fa fa-instagram')->firstOrFail(); @endphp
                        <li><a href="{{$link->link}}"><img src="{{asset('contents/website')}}/images/icons/intstagram.png" alt="instagram"></a></li>
                        @php $link = App\Models\personalinfo::where('icon','fa fa-envelope')->firstOrFail(); @endphp
                        <li><a href="mailto:{{$link->link}}"><img src="{{asset('contents/website')}}/images/icons/email.png" alt="gmail"></a></li>
                    </ul>
                </div>
                <div class="col-md-5 search-body">
                    <form class="" action="{{route('single_category_post_search')}}" method="GET">
                        <input type="text" name="search" value="{{request('search') ?? ''}}" placeholder=" সার্চ করুন">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- about me part -->
    @php
        $aboutme = App\Models\aboutme::where('id',1)->firstOrFail();
    @endphp
    <section id="about-me" class="bg2">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="left w-100 float-md-right float-sm-none text-sm-center">
                        <img src="{{asset('')}}{{$aboutme->image}}" alt="central-presedent">
                    </div>
                </div>
                <div class="col-md-6">
                    <a style="color:black;display:block;" class="aboutme-link" href="{{ route('blog_about') }}">
                        <div class="right">
                            <h2>সংক্ষিপ্ত পরিচিতি</h2>
                            {!!$aboutme->details!!}
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <style>
        .aboutme-link:hover h2{
            color:brown;
        }
    </style>

    <!-- nav section -->

    @include('website.nav')

    <!-- samprotic likha -->

    <section class="bg4 common-heading">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>সাম্প্রতিক লিখা</h2>
                </div>
            </div>
        </div>
    </section>

    <section id="samprotik" class="bg4" style="overflow: hidden;padding-bottom:50px;">
        <div class="container">
            <div class=" slide1 owl-carousel owl-theme" style="">
                @php
                    $samprotic = App\Models\newsPost::where('status',1)->orderBy('id','desc')->limit(10)->get();
                @endphp
                @foreach($samprotic as $item)
                    <div class="col-md-12">
                        <a style="color:black;height: 289px; overflow:hidden;" class="blog-list-body" href="{{route('website_blog_view',[$item->category,$item->slug])}}">
                            <div class="blog-s-body" style="width: 100%;padding-bottom:40px;">
                                <h3>{{$item->heading}}</h3>
                                {{-- {!!str_limit($item->description,$limit=400,$end=" ...")!!} --}}
                                
                                {{-- {{str_limit($item->description,$limit=400,$end=" ...")}} --}}
                                {!! \Str::limit(strip_tags($item->description),$limit=200,$end=" ...") !!}
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- odhik pothito -->

    <section class="bg5 common-heading">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>বহুল পঠিত </h2>
                </div>
            </div>
        </div>
    </section>

    <section id="samprotik" class="bg5" style="overflow:hidden;padding-bottom:50px;">
        <div class="container">
            <div class="row slide2 owl-carousel owl-theme">
                @php
                    $samprotic = App\Models\newsPost::where('status',1)->orderBy('total_view','asc')->limit(10)->get();
                @endphp
                @foreach ($samprotic as $item)
                    <div class="col-md-12">
                        <a style="color:black;overflow:hidden; height: 289px;" class="blog-list-body" href="{{route('website_blog_view',[$item->category,$item->slug])}}">
                            <div class="blog-s-body" style="width: 100%;padding-bottom:40px;">
                                <h3>{{$item->heading}}</h3>
                                {{-- {!!str_limit($item->description,$limit=400,$end=" ...")!!} --}}
                                {{-- {{str_limit($item->description,$limit=400,$end=" ...")}} --}}
                                {!! \Str::limit(strip_tags($item->description),$limit=200,$end=" ...") !!}
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- gallry -->

    <section id="gallery">
        <div class="container-fluid">
            <div class="row slide3 owl-carousel owl-theme">
                @php
                    $samprotic = App\Models\gallery::limit(10)->get();
                @endphp
                @foreach ($samprotic as $item)
                    <div class="col-md-12">
                        <a class="venobox" data-gall="myGallery" title="this click to view" href="{{asset('')}}{{$item->photo}}">
                            <img style="width:100%" src="{{asset('')}}{{$item->photo}}" alt="gallery image">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- questions -->

    <section class="bg6 common-heading qus">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('website_ask','জিজ্ঞাসা')}}"><h2><i class="mdi mdi-chat-processing"></i>জিজ্ঞাসা</h2></a>
                </div>
            </div>
        </div>
    </section>

    <section id="video">
        <div class="container-fluid">
            <div class="row slide4 owl-carousel owl-theme">
                @php
                    $samprotic = App\Models\video::limit(10)->get();
                @endphp
                @foreach ($samprotic as $item)
                    <div class="col-md-12">
                        <a class="venobox" data-vbtype="iframe" data-gall="myGallery" title="click to view" href="{{$item->link}}">

                            <img style="width:100%" src="{{asset('')}}{{$item->thumb}}" alt="video thumb">
                            <div class="video-icon">
                                <i class="fa fa-youtube-play"></i>
                            </div>
                        </a>
                        <h3 class="pt-3">{{$item->heading}}</h3>
                    </div>
                @endforeach
                <div class="col-md-12">

                </div>
            </div>
        </div>
    </section>

    <!-- books -->

    <section class="bg4 common-heading d-none">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>পুস্তক </h2>
                </div>
            </div>
        </div>
    </section>

    <section id="gallery" class="bg4 gallery2 d-none">
        <div class="container-fluid">
            <div class="row slide5 owl-carousel owl-theme">
                <div class="col-md-12">
                    <img class="img-fluid" src="http://shivagallery.org/wp-content/uploads/2015/01/img_0789-370x247.jpg"
                        alt="">
                </div>
                <div class="col-md-12">
                    <img class="img-fluid" src="http://shivagallery.org/wp-content/uploads/2015/01/img_0789-370x247.jpg"
                        alt="">
                </div>
                <div class="col-md-12">
                    <img class="img-fluid" src="http://shivagallery.org/wp-content/uploads/2015/01/img_0789-370x247.jpg"
                        alt="">
                </div>
                <div class="col-md-12">
                    <img class="img-fluid" src="http://shivagallery.org/wp-content/uploads/2015/01/img_0789-370x247.jpg"
                        alt="">
                </div>
                <div class="col-md-12">
                    <img class="img-fluid" src="http://shivagallery.org/wp-content/uploads/2015/01/img_0789-370x247.jpg"
                        alt="">
                </div>
                <div class="col-md-12">
                    <img class="img-fluid" src="http://shivagallery.org/wp-content/uploads/2015/01/img_0789-370x247.jpg"
                        alt="">
                </div>
            </div>
        </div>
    </section>

@endsection
