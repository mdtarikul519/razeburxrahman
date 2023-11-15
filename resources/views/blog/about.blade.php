
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

		<div class="artigo-container" style="padding:0px 0px 60px ; ">

			<div class="artigo-content-holder" style="width: 100%;">
                <script>
                    // $(".post-tmb2 p img").css('height','196px');
                </script>
				<div class="artigo-row">
                    @foreach ($select as $item)
                        <div class="artigo-col-4">
                            <div style="padding: 15px; background: #dddddd;">
                                <img class="" style="width:100%;" src="{{ asset('') }}{{ $item->photo }}" alt="">
                            </div>
                        </div>
                        <div class="artigo-col-8" style="">
                            <div style="padding:15px;">
                                {!! $item->description !!}
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
            <div style="padding:30px 0px;"></div>
            <style>
                .artigo-top{
                    display: none;
                }
                p{
                    margin-bottom: 0;
                }
            </style>
            


@endsection
