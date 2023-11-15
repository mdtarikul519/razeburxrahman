
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
				<div class="artigo-row">
                    <div class="artigo-col-10 " style="font-family:bangla;background:#dfe5de85; padding-top:30px; padding-bottom:30px;">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form class="artigo-contact-form" method="POST" action="{{route('website_ask_post','জিজ্ঞাসা')}}" >
                            @csrf
                            <div class="artigo-contact-form-result"></div>
							<div class="artigo-form-process"></div>
				        	<div class="artigo-row">
				        		<div class="artigo-col-3">
				        			<h3 style="font-family:bangla"> নাম :  </h3>
				        		</div>
				        		<div class="artigo-col-9">
				        			<input type="text" value="" name="name" id="email" placeholder="আপনার নাম.." class="artigo-form-control">
				        		</div>
                            </div>

				        	<div class="artigo-row">
				        		<div class="artigo-col-3">
				        			<h3 style="font-family:bangla"> ইমেইল :  </h3>
				        		</div>
				        		<div class="artigo-col-9">
				        			<input type="email" value="" name="email" id="email" placeholder="আপনার ইমেইল.." class="artigo-form-control" >
				        		</div>
                            </div>

				        	<div class="artigo-row">
				        		<div class="artigo-col-3">
				        			<h3 style="font-family:bangla"> ঠিকানা :  </h3>
				        		</div>
				        		<div class="artigo-col-9">
				        			<input type="text" value="" name="address" id="email" placeholder="আপনার ঠিকানা.." class="artigo-form-control ">
				        		</div>
                            </div>

				        	<div class="artigo-row">
				        		<div class="artigo-col-3">
				        			<h3 style="font-family:bangla"> আপনার জিজ্ঞাসা :  </h3>
				        		</div>
				        		<div class="artigo-col-9">
				        			<textarea rows="5" cols="2" name="ask" id="comment" class="artigo-form-control" placeholder="আপনার জিজ্ঞাসা.."></textarea>
				        		</div>
                            </div>

				        	<div class="artigo-row">
				        		<div class="artigo-col-3">
				        		</div>
				        		<div class="artigo-col-9">
				        			<button type="submit" style="font-family:bangla;" value="পাঠিয়ে দিন" class="submit" id="submit" name="submit">পাঠিয়ে দিন</button>
				        		</div>
                            </div>

				        </form>
					</div>
                </div>
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
                                    <a href="blog-detail.html" style="text-align:center; display:block; font-family:bangla;" title=""> {{$item->heading}} </a>
                                    {{-- <span class="post-date" style=""> <i class="ti-calendar"> </i> {{$item->created_at}} </span> --}}
                                    <p style="text-align:justify;"> {!!\Str::limit($item->description,$limit=80,$end=" ...")!!}</p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
            </div>


@endsection
