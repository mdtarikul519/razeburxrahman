
    @extends('layouts.blog')
    @section('content')
    <!-- *** BREADCRUMB STARTS *** -->
    <!-- *** BREADCRUMB STARTS *** -->
	<div class="artigo-title-holder artigo-title-bg">
            <div class="artigo-container">
                <h1> CATEGORY PAGE </h1>
            </div>
        </div>
        <!-- *** BREADCRUMB END *** -->

        <!-- *** CONTENT WRAP STARTS *** -->
        <div class="artigo-content-wrap">

            <div class="artigo-container">

                <div class="artigo-content-holder">

                    <article class="artigo-blog-item format-standard artigo-list-style">
                        <div class="entry-thumbnail">
                            <a class="post-thumbnail" href="blog-detail.html"> <img src="{{asset('contents/blog')}}/images/blog/grid-thumb-1.jpg" alt="" title=""> </a>
                            <div class="posted-on"> <p> Posted on <span> 17, Feb 2018 </span> </p> </div>
                        </div>

                        <div class="entry-item-details">
                            <header class="entry-header">
                                <p class="entry-cat-links"> <a href="category-page.html"> Fashion </a></p>
                                <h4> <a href="blog-detail.html" title=""> young woman enjoying sunset in tyle </a> </h4>
                            </header>

                            <div class="entry-meta-data">
                                <p class="post-author"> <a href="author-detail.html" title=""> <i class="ti-user"> </i> Smashing Themes </a> </p>
                                <a href="blog-detail.html" title="" class="post-comments"> <i class="ti-comment"> </i> 5 Comments </a>
                            </div>

                            <div class="entry-content">
                                <p>
                                     Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tincidunt lectus aliquet quam pretium...
                                </p>
                            </div>

                            <footer class="entry-footer">
                                <div class="entry-readmore">
                                    <a href="blog-detail.html" title=""> Continue Reading
                                        <svg class="arrow-icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                            <g fill="none" stroke="#000000" stroke-width="1.5" stroke-linejoin="round" stroke-miterlimit="10">
                                                <circle class="arrow-icon--circle" cx="16" cy="16" r="15.12"></circle>
                                                <path class="arrow-icon--arrow" d="M16.14 9.93L22.21 16l-6.07 6.07M8.23 16h13.98"></path>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </footer>
                        </div>
                    </article>

                    <article class="artigo-blog-item format-standard artigo-list-style thumb-right-align">
                        <div class="entry-thumbnail">
                            <a class="post-thumbnail" href="blog-detail.html"> <img src="{{asset('contents/blog')}}/images/blog/grid-thumb-1.jpg" alt="" title=""> </a>
                            <div class="posted-on"> <p> Posted on <span> 17, Feb 2018 </span> </p> </div>
                        </div>

                        <div class="entry-item-details">
                            <header class="entry-header">
                                <p class="entry-cat-links"> <a href="category-page.html"> Travel </a></p>
                                <h4> <a href="blog-detail.html" title=""> young woman enjoying sunset in tyle </a> </h4>
                            </header>

                            <div class="entry-meta-data">
                                <p class="post-author"> <a href="author-detail.html" title=""> <i class="ti-user"> </i> Smashing Themes </a> </p>
                                <a href="blog-detail.html" title="" class="post-comments"> <i class="ti-comment"> </i> 5 Comments </a>
                            </div>

                            <div class="entry-content">
                                <p>
                                     Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tincidunt lectus aliquet quam pretium...
                                </p>
                            </div>

                            <footer class="entry-footer">
                                <div class="entry-readmore">
                                    <a href="blog-detail.html" title=""> Continue Reading
                                        <svg class="arrow-icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                            <g fill="none" stroke="#000000" stroke-width="1.5" stroke-linejoin="round" stroke-miterlimit="10">
                                                <circle class="arrow-icon--circle" cx="16" cy="16" r="15.12"></circle>
                                                <path class="arrow-icon--arrow" d="M16.14 9.93L22.21 16l-6.07 6.07M8.23 16h13.98"></path>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </footer>
                        </div>
                    </article>


                    <nav class="paging-navigation">
                        <div class="pagination">
                            <a href="" class="prev page-numbers"> <i class="ti-arrow-left"></i> </a>
                            <a href="" class="page-numbers"> 1 </a>
                            <span class="page-numbers current"> 2 </span>
                            <a href="" class="page-numbers"> 3 </a>
                            <a href="" class="page-numbers"> 4 </a>
                            <a href="" class="page-numbers"> 5 </a>
                            <a href="" class="page-numbers"> 6 </a>
                            <a href="" class="next page-numbers"> <i class="ti-arrow-right"> </i> </a>
                        </div>
                    </nav>

                </div>
@endsection
