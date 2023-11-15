
	@extends('layouts.blog')
    @section('content')
	<!-- *** CONTENT WRAP STARTS *** -->
	<div class="artigo-content-wrap">

	<!-- *** CONTENT WRAP STARTS *** -->
	<div class="artigo-content-wrap">

        <!-- *** SLIDER WRAP END *** -->

        <div class="artigo-title-holder artigo-title-bg" style="background: url(https://i.ytimg.com/vi/GsxuLjyQSC4/maxresdefault.jpg);background-size: cover;background-position: top center;">
            <div class="artigo-container">
                <h1> {{$slug}} </h1>
            </div>
        </div>

		<div class="artigo-container">

			<div class="artigo-content-holder">
                <script>
                    // $(".post-tmb2 p img").css('height','196px');
                </script>
				<div class="artigo-row">
                    @foreach ($select as $item)
                        <div class="artigo-col-6" style="height:490px;">
                            <article class="artigo-blog-item format-standard">
                                <div class="entry-thumbnail" >
                                    <a class="post-thumbnail post-tmb2" style=" overflow:hidden;" href="{{route('website_blog_view',[$item->category,$item->slug])}}">
                                        <img src="{{asset('')}}{{$item->post_head_image}}" alt="{{$item->heading}}">
                                    </a>

                                </div>

                                <div class="entry-item-details">
                                    <header class="entry-header">
                                        <p class="entry-cat-links"> <a href="#">  {{$slug}}  </a></p>
                                        <h4> <a href="{{route('website_blog_view',[$item->category,$item->slug])}}" title=""> {{$item->heading}} </a> </h4>
                                    </header>

                                    <div class="entry-content">
                                        <a href="{{route('website_blog_view',[$item->category,$item->slug])}}">
                                            <p style="text-align:justify;">
                                                {!! \Illuminate\Support\Str::limit(strip_tags($item->description),$limit=220,$end=" ...")!!}
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>


				<nav class="paging-navigation">
                    <div class="paging pagination" style="display: inline-block;float: right;margin-right: 139px;">
                        {{ $select->links() }}
                    </div>
				</nav>

            </div>

            <div class="artigo-sidebar-holder right-sidebar" style="background:#dcdcdc8f;">
                <aside class="widget widget_author">
                    <h2 class="widget-title"> <span> </span> </h2>
                    <div class="widget-container">
                        <div class="author-thumb">
                            <img src="/{{App\Models\aboutme::first()->image}}" alt="" title="">
                        </div>
                        <ul class="artigo-social-links">
                            <!--<li><a style="border:0" href="" title="facebook"><img src="{{asset('contents/blog/images/fb.png')}}" alt="facebook"></a></li>-->
                            <!--<li><a style="border:0" href="" title="twitter"><img src="{{asset('contents/blog/images/twitter.png')}}" alt="facebook"></a></li>-->
                            <!--<li><a style="border:0" href="" title="instagram"><img src="{{asset('contents/blog/images/inst.png')}}" alt="facebook"></a></li>-->
                            <!--<li><a style="border:0" href="" title="dribble"><img src="{{asset('contents/blog/images/dribble.png')}}" alt="facebook"></a></li>-->
                            <!--<li><a style="border:0" href="" title="youtube"><img src="{{asset('contents/blog/images/youtube.png')}}" alt="facebook"></a></li>-->
                            
                        @php $link = App\Models\personalinfo::where('icon','fa fa-facebook')->firstOrFail(); @endphp
                        <li><a href="{{$link->link}}"><img src="{{asset('contents/blog/images/fb.png')}}" alt="facebook"></a></li>
                        @php $link = App\Models\personalinfo::where('icon','fa fa-twitter')->firstOrFail(); @endphp
                        <li><a href="{{$link->link}}"><img src="{{asset('contents/blog/images/twitter.png')}}" alt="facebook"></a></li>
                        @php $link = App\Models\personalinfo::where('icon','fa fa-youtube')->firstOrFail(); @endphp
                        <li><a href="{{$link->link}}"><img src="{{asset('contents/blog/images/youtube.png')}}" alt="facebook"></a></li>
                        @php $link = App\Models\personalinfo::where('icon','fa fa-instagram')->firstOrFail(); @endphp
                        <li><a href="{{$link->link}}"><img src="{{asset('contents/blog/images/inst.png')}}" alt="facebook"></a></li>
                        </ul>
                        <p>@php $bio=App\Models\aboutme::where('id',1)->firstOrFail(); @endphp {{$bio->post}}</p>
                    </div>
                </aside>
                <aside class="widget widget_recent_entries">
                    <h2 class="widget-title"> <span> সাম্প্রতিক লিখা     </span> </h2>
                    <div class="widget-container widget-container2">
                        <ul>
                            @php
                                $collection = App\Models\newsPost::where('status',1)->orderBy('id','desc')->inRandomOrder()->limit(4)->get();
                                $i=1;
                            @endphp
                            @foreach ($collection as $item)
                                <li @php
                                        if($i==1)echo"display:none";$i++;
                                    @endphp>
                                    <div class="side-thumb">
                                        <img src="{{asset('')}}{{$item->post_head_image}}" alt="{{$item->heading}}" title="{{$item->heading}}" class="" style="width:100%;">
                                        {{-- {!!!!} --}}
                                    </div>
                                    <a href="{{route('website_blog_view',[$item->category,$item->slug])}}" style="text-align:center; display:block; font-family:bangla;" title=""> {{$item->heading}} </a>
                                    {{-- <span class="post-date" style=""> <i class="ti-calendar"> </i> {{$item->created_at}} </span> --}}
                                    <p style="text-align:justify;"> {!!\Illuminate\Support\Str::limit(strip_tags($item->description),$limit=80,$end=" ...")!!}</p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
            </div>


@endsection
