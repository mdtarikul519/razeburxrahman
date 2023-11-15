
    @extends('layouts.blog')
    @section('content')
    <!-- *** BREADCRUMB STARTS *** -->
    <div class="artigo-title-holder artigo-title-bg" style="display:none">
		<div class="artigo-container">
			{{-- <h1> {{$slug}} </h1> --}}
		</div>
	</div>
	<!-- *** BREADCRUMB END *** -->

	<!-- *** CONTENT WRAP STARTS *** -->
	<div class="artigo-content-wrap">

		<div class="artigo-container">

			<div class="artigo-content-holder" style="padding-right: 20px;">

				<article class="artigo-blog-item format-standard artigo-blog-details blog-grid-img-display">
					<div class="entry-thumbnail">
						<div class="artigo-row">
							<div class="artigo-col-12">
                                {{-- <a class="post-thumbnail" href="">{!!$item->post_head_image!!}</a> --}}
								<a class="post-thumbnail" href="#"> <img src="{{asset('')}}{{$item->post_head_image}}" alt="{{$item->heading}}" title="{{$item->heading}}"> </a>
							</div>
							{{-- <div class="artigo-col-6">
								<a class="post-thumbnail" href=""> <img src="{{asset('contents/blog')}}/images/blog/blog-entry-col2.jpg" alt="" title=""> </a>
								<div class="artigo-topmargin-10"> </div>
								<a class="post-thumbnail" href=""> <img src="{{asset('contents/blog')}}/images/blog/blog-entry-col3.jpg" alt="" title=""> </a>
							</div> --}}
						</div>
					</div>

					<div class="entry-item-details">
						<header class="entry-header">
							{{-- <a class="entry-cat-links"> <a href=""> {{$item->category}} </a></a> --}}
							<h4> <a href="" title=""> {{$item->heading}} </a> </h4>
						</header>

						<div class="entry-content" style="padding-right: 20px; text-align:justify;">
							{!!$item->description!!}
						</div>

					</div>

				</article>

                <div class="artigo-topmargin-50"> </div>

                <div class="share">
                    <ul class="share_link" style="margin-left:0;">
                        <li><a style="background:#202a4a;margin-left:0;" href="#">Share :</a></li>
                        <li><a style="background:#48559c" target="_balnk" href="https://www.facebook.com/sharer.php?u={{url()->current()}}"><i class="fa fa-facebook-f"></i>Facebook</a></li>
                        <li><a style="background:#48b3e5" target="_balnk" href="https://twitter.com/intent/tweet?text={{url()->current()}}"><i class="fa fa-twitter"></i>Twitter</a></li>
                        <li><a style="background:#0f6b0b" target="_balnk" href="whatsapp://send?{{ url()->current() }}"><i class="fa fa-whatsapp"></i>Whatsapp</a></li>
                        <li><a style="background:#4e5eb1" target="_balnk" href="#"><i class="fa fa-bolt"></i>Messanger</a></li>
                    </ul>
                    <style>
                        .share_link{
                            display:inline-block;
                        }
                        .share_link li{
                            float: left;
                            text-decoration: none;
                            list-style-type: none;
                        }
                        .share_link li a{
                            display: inline-block;
                            font-size: 14px;
                            padding: 10px 20px;
                            margin: 05px 10px;
                            color: white;
                        }
                        .share_link li a i{
                            padding-right: 10px;
                        }
                    </style>
                </div>

                <div class="comment" style="padding-top: 30px">
                    <h3 class="block-title"><span>মন্তব্য</span></h3>
                    <div class="fb-comments" data-href="{{Request::url()}}" data-width="" data-numposts="5"></div>
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
                    <h2 class="widget-title"> <span> সম্পর্কিত লিখা </span> </h2>
                    <div class="widget-container widget-container2">
                        <ul>
                            @php
                                $collection = App\Models\newsPost::where('status',1)->where('category',$item->category)->orderBy('id','desc')->inRandomOrder()->limit(4)->get();
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
                                    <a href="{{route('website_blog_view',[$item->category,$item->slug])}}" style="font-family:bangla" title="{{$item->heading}}"> {{$item->heading}} </a>
                                    {{-- <span class="post-date" style=""> <i class="ti-calendar"> </i> {{$item->created_at}} </span> --}}
                                    <p> {!!\Str::limit($item->description,$limit=80,$end=" ...")!!}</p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
            </div>
@endsection
