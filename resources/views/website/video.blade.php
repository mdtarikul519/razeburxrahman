@extends('layouts.website')
@section('content')

    @include('website.nav')

    <style>
        #nav{
            margin-bottom: 0;
        }
        #gallerypage{
            padding-bottom: 40px;
        }
    </style>
    <section class="bg4 common-heading qus ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>ভিডিও গ্যালারি </h2>
                </div>
            </div>
        </div>
    </section>

    <section class="bg4" id="gallerypage">
        <div class="container-fluid">
            <div class="row myGallery">
                <div class="col-md-3 p-0 " >
                    <div class="img w-100 overflow-hidden" style="height:300px;">
                        <a class="venobox" data-vbtype="iframe" data-gall="myGallery" title="this is image" href="https://www.youtube.com/embed/rK4xFP4r8GY">
                            <img style="width:100%" src="https://s2982.pcdn.co/wp-content/uploads/2018/03/Oceanic-by-Aimee-Nezhukumatathil.jpg" alt="gallery image">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
