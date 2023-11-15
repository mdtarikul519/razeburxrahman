@extends('layouts.website')
@section('content')

    @include('website.nav')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="bread-cumb">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">লেখালেখি </a></li>
                            <li calss="last"><a href="#">{{$item->category}}</a></li>
                        </ul>
                    </div>
                    <div class="post-heading">
                        <h3>{{$item->heading}}</h3>
                        <p>{{$item->created_at}}</p>
                    </div>
                    <div class="post-body">
                        <div class="head-img">
                            {!!$item->post_head_image!!}
                        </div>
                        {!!$item->description!!}
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="widget">
                        <div class="category">
                            <h5>সাম্প্রতিক লেখালেখি</h5>
                        </div>
                        @php
                            $samprotic = App\Models\newspost::where('status',1)->orderBy('total_view','asc')->limit(10)->get();
                        @endphp
                        @foreach ($samprotic as $item)
                        <div class="single-post">
                            <div class="left-img">
                                    <a href="http://"><img class="img-fluid" src="http://www.sirajulislam.info/wp-content/uploads/2019/02/2-47-120x86.jpg" alt="image"></a>
                                </div>
                                <div class="right">
                                    <div class="heading">
                                        <h3>{{$item->heading}}</h3>
                                        <p>{{$item->created_at}}</p>
                                    </div>
                                    {!! \Str::limit($item->description,$limit=100,$end=" ...")!!}
                                </div>
                            </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
