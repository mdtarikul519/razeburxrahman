    <!-- nav section -->

    <nav id="nav2" class="d-sm-block d-md-none navbar navbar-expand-lg navbar-light nav-2 bg-light">
        <div class="container">
        <a style="width:200px;" class="navbar-brand" href="{{route('website_index')}}"><img class="img-fluid" src="{{asset('contents/website/images/logo/logo1.png')}}"/></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('website_index')}}">প্রচ্ছদ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('website_blog_category','ইসলাম')}}">ইসলাম</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('website_blog_category','ইসলামী আন্দোলন')}}">ইসলামী আন্দোলন</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('website_blog_category','বাংলাদেশ')}}">বাংলাদেশ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('website_blog_category','রাজনীতি')}}">রাজনীতি</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('website_blog_category','সমসাময়িক')}}">সমসাময়িক</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('website_blog_category','ইতিহাস')}}">ইতিহাস</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('website_blog_category','বিবিধ')}}">বিবিধ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('website_blog_category','ফটো গ্যালারি')}}">ফটো গ্যালারি</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('website_blog_category','ভিডিও গ্যালারি')}}">ভিডিও গ্যালারি</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0 nav-search d-none">
                    <input class="form-control mr-sm-2 " type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0 nav_search_btn" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </nav>

    <nav id="nav" class="bg3 d-sm-none d-md-block  active_nav">
        <div class="container">
            <div class="body">
                <ul>
                    <li class="one"><a href="{{route('website_blog_category','ইসলাম')}}">ইসলাম</a></li>
                    <li><a href="{{route('website_blog_category','ইসলামী আন্দোলন')}}">ইসলামী আন্দোলন</a></li>
                </ul>
                <ul>
                    <li class="one"><a href="{{route('website_blog_category','বাংলাদেশ')}}">বাংলাদেশ</a></li>
                    <li><a href="{{route('website_blog_category','রাজনীতি')}}">রাজনীতি</a></li>
                </ul>
                <ul>
                    <li class="one"><a href="{{route('website_blog_category','সমসাময়িক')}}">সমসাময়িক</a></li>
                    <li><a href="{{route('website_blog_category','ইতিহাস')}}">ইতিহাস</a></li>
                </ul>
                <ul>
                    <li class="" style="vertical-align: middle;margin-top: 22%;transform:translateY(-50%);"><a href="{{route('website_blog_category','বিবিধ')}}">বিবিধ</a></li>
                </ul>
                <ul class="last">
                    <li class="one"><a href="{{route('website_gallery','ফটো গ্যালারি')}}">ফটো গ্যালারি</a></li>
                    <li><a href="{{route('website_video','ভিডিও গ্যালারি')}}">ভিডিও গ্যালারি</a></li>
                </ul>
            </div>
        </div>
    </nav>
