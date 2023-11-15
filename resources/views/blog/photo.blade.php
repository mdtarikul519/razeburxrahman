
	@extends('layouts.blog')
    @section('content')
	<!-- *** CONTENT WRAP STARTS *** -->
	<div class="artigo-content-wrap">

	<!-- *** CONTENT WRAP STARTS *** -->
	<div class="artigo-content-wrap">

        <!-- *** SLIDER WRAP END *** -->

        <div class="artigo-title-holder artigo-title-bg" style="background: url(https://i.ytimg.com/vi/GsxuLjyQSC4/maxresdefault.jpg);background-size: cover;background-position: top center;">
            <div class="artigo-container">
                <h1> ফটো গ্যালারি </h1>
            </div>
        </div>

		<div class="artigo-container">

			<div class="artigo-content-holder" style="padding-right: 30px;">
                <script>
                    $(".post-tmb2 p img").css('height','196px');
                </script>
				<div class="artigo-row">
                    @foreach ($select as $item)
                        <div class="artigo-col-6">
                            <article class="artigo-blog-item format-standard">
                                <div class="entry-thumbnail" >
                                    {{-- <a class="post-thumbnail post-tmb2" style="height:196px; overflow:hidden;" href="">
                                        {!!$item->post_head_image!!}
                                    </a> --}}
                                    <a class="venobox post-thumbnail post-tmb2" data-gall="myGallery" style="height:100%;" title="this is image" href="{{asset('')}}{{$item->photo}}">
                                        <img style="width:100%;" src="{{asset('')}}{{$item->photo}}" alt="gallery image">
                                    </a>
                                    {{-- <div class="posted-on"> <p> Posted on <span> {{$item->created_at}} </span> </p> </div> --}}
                                </div>

                            </article>
                        </div>
                    @endforeach
                </div>

                <style>
                    .artigo-blog-item .entry-thumbnail{
                        height: 250px;
                        overflow: hidden;
                    }
                    .artigo-blog-item{
                        padding: 0;
                        margin: 0;
                    }
                    .venobox img{
                        height: 100%;
                    }
                </style>

				<nav class="paging-navigation">
                    <div class="paging pagination" style="display: inline-block;float: right;margin-right: 139px;">
                        {{ $select->links() }}
                    </div>
				</nav>

            </div>

            <div class="artigo-sidebar-holder right-sidebar" style="background:#dcdcdc8f;">
                @include('layouts.author')
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
