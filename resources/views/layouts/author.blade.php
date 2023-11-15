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