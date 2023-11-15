$(document).ready(function () {
    $(".banner").owlCarousel({
        items: 1,
        nav: true,
        autoplay: true,
        loop: true,
        dots: false,
        autoplayHoverPause: true,
        responsive: {
            0: {},
            600: {
                nav: false
            },
            1000: {}
        }
    });

    //this is for banar slide text animation in out on slide
    $(".banner").on('translate.owl.carousel', function () {
        $('.content h3').removeClass('fadeInLeft animated').hide();
        $('.content p').removeClass('fadeInUp animated').hide();
        $('.content a').removeClass('wow fadeInDown animated').hide();
    })

    $(".owl-carousel").on('translated.owl.carousel', function () {
        $('.owl-item.active .content h3').addClass('fadeInLeft animated').show();
        $('.owl-item.active .content p').addClass('fadeInUp animated').show();
        $('.owl-item.active .content a').addClass('wow fadeInDown animated').show();
    })

    $(".lattest-update").owlCarousel({
        items: 4,
        nav: false,
        dots: false,
        autoplay: true,
        loop: true,
        margin: 0,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    });

    $(".advisor").owlCarousel({
        items: 3,
        nav: false,
        dots: false,
        autoplay: true,
        loop: true,
        margin: 20,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 3
            }
        }
    });

    $(".slide1").owlCarousel({
        items: 4,
        nav: true,
        dots: false,
        autoplay: false,
        loop: true,
        margin: 20,
        center:false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    });

    $(".slide2").owlCarousel({
        items: 3,
        nav: true,
        dots: false,
        autoplay: false,
        loop: true,
        margin: 20,
        center:false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    });

    $(".slide3").owlCarousel({
        items: 4,
        nav: true,
        dots: false,
        autoplay: false,
        loop: true,
        margin: 0,
        center:false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    });

    $(".slide5").owlCarousel({
        items: 6,
        nav: true,
        dots: false,
        autoplay: false,
        loop: true,
        margin: 0,
        center:false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 6
            }
        }
    });

    $(".slide4").owlCarousel({
        items: 4,
        nav: true,
        dots: false,
        autoplay: false,
        loop: true,
        margin: 0,
        center:false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    });

    $(".progress-bar").loading();

    $('.venobox').venobox({
        // framewidth: '400px',        // default: ''
        // frameheight: '300px',       // default: ''
        border: '10px',             // default: '0'
        bgcolor: 'rgba(0,0,0,.3)',         // default: '#fff'
        titleattr: 'data-title',    // default: 'title'
        numeratio: true,            // default: false
        infinigall: true
    });

    $(".post-body p").css("text-align", "justify");
    $(".single_category p img").css("height", "auto");
    $(".single_category p img").css("width", "100%");

    var navOffset = $('.active_nav').offset().top + 100;

    $(window).scroll(function () {
        var scrolling = $(this).scrollTop();
        if (scrolling > navOffset) {
            $('#nav2').addClass('sticky-top d-md-block');
        } else {
            $('#nav2').removeClass('sticky-top d-md-block');
        }
    });

    new WOW().init();
});
