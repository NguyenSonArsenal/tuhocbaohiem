<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="vi-VN" dir="LTR" xmlns:fb="">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="{{ config('custom.seo_author') }}">
    <meta property="fb:app_id" content="{{ config('custom.facebook_appid') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" href="{{ asset('frontend/assets/images/home/logo.png?'.config('custom.version')) }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <title>Tự học bảo hiểm</title>
    <link rel="stylesheet" href="{{ asset('frontend/assets/lib/bootstrap-4.3.1-dist/css/bootstrap.min.css')  }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/lib/swiper/css/swiper.min.css') }}">
    <link type="text/css" href="{{ asset('frontend/assets/css/styles.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link type="text/css" href="{{ asset('frontend/assets/css/common.css') }}" rel="stylesheet" />
    @stack('styles')
    {!! config('custom.embed_header') !!}
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400,400i,600,600i,700" rel="stylesheet">
    @yield('header')
<script>


</script>
</head>

<body class="">
<div id="menu-main" class="block-main-menu">
        <div class="navbar-top fix">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="navbar-callus text-left sm-text-center">
                            <ul class="list-inline">
                                <li><a href="#"><i class="fa fa-phone"></i> Hotlines: 1900.988.965 / 0906.060.784</a></li>
                                <li><a href="#"><i class="fa fa-envelope-o"></i> Contact us: contact@vics-corp.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="right-sub">
                            <div class="user-action">
                                <div class="sign-inup">
                                    @auth
                                       <a href="">
                                            {{\Illuminate\Support\Facades\Auth::user()->name}}
                                       </a>
                                        <a href="" class="btn btn-default sign ">Logout</a>
                                    @else
                                        <a href="" class="btn btn-default sign ">Đăng nhập</a>
                                    @endauth
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main-menu -->
        <div class="main-menu-ctn">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    <nav class="navbar navbar-expand-md navbar-light">

                    <a class="navbar-brand" href="{{ url('/') }}" target="_blank">
                        <img src="{{ asset('frontend/assets/images/home/logo.png') }}" alt=""></a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto py-4 py-md-0">
                        <li @if(request()->is('/')) class="active" @endif >
                                        <a class="nav-link" href="{{ url('/') }}">Trang chủ</a>
                                    </li>
                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                <a class="nav-link" href="{{ url('/about-us') }}" role="button" aria-haspopup="true" aria-expanded="false">Giới thiệu</a>
                            </li>
                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                <a class="nav-link" href="{{ url('/courses') }}">Khóa học</a>
                            </li>
                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                <a class="nav-link "  href="{{ url('/calendar') }}" role="button" aria-haspopup="true" aria-expanded="false">Lịch thi</a>
                            </li>
                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                <a class="nav-link" href="{{ url('/teacher') }}">Giảng viên</a>
                            </li>
                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                <a class="nav-link" href="{{ url('/contact') }}">Trợ giúp</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                    </div>
                </div>
            </div>
        </div>
    <!-- /.Menu -->
</div>
<!-- Menu -->
<div class="body-page">
    <div class="page-wrapper">
{{--        @include('frontend/pages/section1')--}}
        @yield('content')
    </div>
    <!-- Back to top -->
    <a class="scrollup"></a>
</div>
<footer>
    <div class="footer-ctn">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mt-5">
                    <div class="foot-title">
                        <h5>CÔNG TY CỔ PHẦN TƯ VẤN DỊCH VỤ BẢO HIỂM VIỆT NAM</h5>
                    </div>

                    <div class="footer-content">
                        <ul class="footer-nav">
                            <li>
                                MST : 0108560536</span>
                            </li>

                            <li>
                            Số 5A/579 Lạc Long Quân, P. Xuân La, Q. Tây Hồ, TP. Hà Nội
                            </li>
                            <li>
                                Hotline <a href="tel:0906060784">1900.988.965</a><span> | <a href="tel:0906060784">0906.060.784</a></span>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 mt-5">
                    <div class="foot-title second-part-title">
                        <h5>Về Vics Corp</h5>
                    </div>
                    <div class="footer-content">
                        <ul class="footer-nav">
                            <li>
                                <a href="#">Điều khoản sử dụng</a>
                            </li>
                            <li>
                                <a href="#">Quy chế hoạt động</a>
                            </li>
                            <li>
                                <a href="#">Chính sách bảo mật </a>
                            </li>
                            <li>
                                <a href="#">Trung tâm chăm sóc khách hàng </a>
                            </li>
                            <li>
                                <a href="#">Chính sách hoàn tiền</a>
                            </li>
                            <ul class="ft-social">
                                <li><a href="" target="_blank"><img src="{{ asset('frontend/assets/images/home/fb.png?'.config('custom.version')) }}" alt=""></a></li>
                                <li><a href="" target="_blank"><img src="{{ asset('frontend/assets/images/home/insta.png?'.config('custom.version')) }}" alt=""></a></li>
                                <li><a href="" target="_blank"><img src="{{ asset('frontend/assets/images/home/twitter.png?'.config('custom.version')) }}" alt=""></a></li>
                            </ul>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 mt-5 footer-text-right">
                    <div class="foot-slogan">
                        <img src="{{ asset('frontend/assets/images/home/logo.png?'.config('custom.version')) }}" alt="">
                        <div class="slogan">
                            Tải ngay App Vics corp Học tốt hơn - thoải mái hơn
                        </div>
                    </div>
                    <div class="footer-content">
                        <div class="app-download">
                            <a href="#"><img src="{{ asset('frontend/assets/images/home/ch-play1.png?'.config('custom.version')) }}" alt=""></a>
                            <a href="#"><img src="{{ asset('frontend/assets/images/home/app-store.png?'.config('custom.version')) }}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- modal collection -->

@include('layouts.frontend.structures._modal')

<div id="add-type" class="modal">
        <div class="modal-wrapper modal-transition">
            <div class="modal-header">
                <h2 class="modal-heading"></h2>
            </div>
            <div class="modal-body">
                <div class="modal-content">
                    <form class="form-horizontal form-create-theloai" role="form" method="post" action="">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name-subject">Tên thể loại:</label>
                                <input type="text" class="form-control" id="name-subject" placeholder="" name="name-subject" value="">
                            </div>
                            <div class="form-group">
                                <label class="name-select">Thuộc khóa học</label>
                                <div class="select">
                                    <select name="slct" id="slct" class="form-control">
                                        <option selected disabled>Chọn loại hình</option>
                                        <option value="1">Khóa 1</option>
                                        <option value="2">Khóa 2</option>
                                        <option value="3">Khóa 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="button-control-conf">
                                <a href="#" class="btn btn-default ">Hủy bỏ</a>
                                <a href="#" class="btn btn-default "> + Tạo mới</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="add-question" class="modal">
        <div class="modal-wrapper modal-transition">
            <div class="modal-header">
                <h2 class="modal-heading"></h2>
            </div>
            <div class="modal-body">
                <div class="modal-content">
                    <h1>huuhuuhuhuh</h1>
                </div>
            </div>
        </div>
    </div>
    <div id="add-post" class="modal">
        <div class="modal-wrapper modal-transition">
            <div class="modal-header">
                <h2 class="modal-heading"></h2>
            </div>
            <div class="modal-body">
                <div class="modal-content">
                <div>
                    <textarea class="tiny" id="tiny"></textarea>
                </div>
                </div>
            </div>
        </div>
    </div>
<a class="scrollup"><img src="{{asset('frontend/assets/images/icon/bottom-to-top.png')}}" alt=""></a>

{!! config('custom.embed_footer') !!}

<!-- @yield('footer') -->

<script src="{{ asset('frontend/assets/js/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('frontend/assets/lib/popper/js/popper.min.js?'.config('custom.version')) }}"></script>
<script src="{{ asset('frontend/assets/lib/bootstrap-4.3.1-dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/assets/lib/swiper/js/swiper.min.js?'.config('custom.version')) }}"></script>
<script src="{{ asset('frontend/assets/lib/tinymce/js/tinymce/tinymce.min.js?'.config('custom.version')) }}" referrerpolicy="origin"></script>
<script src="{{ asset('frontend/assets/lib/jqueryModal/js/jquery.modal.min.js?'.config('custom.version')) }}"></script>

<script>
    (function($) { "use strict";
    $(function() {
        var header = $(".start-style");
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();

            if (scroll >= 10) {
                header.removeClass('start-style').addClass("scroll-on");
            } else {
                header.removeClass("scroll-on").addClass('start-style');
            }
        });
    });

    //Animation

    $(document).ready(function() {
        $('body.hero-anime').removeClass('hero-anime');
    });

    //Menu On Hover

    $('body').on('mouseenter mouseleave','.nav-item',function(e){
            if ($(window).width() > 750) {
                var _d=$(e.target).closest('.nav-item');_d.addClass('show');
                setTimeout(function(){
                _d[_d.is(':hover')?'addClass':'removeClass']('show');
                },1);
            }
    });

    //Switch light/dark

    $("#switch").on('click', function () {
        if ($("body").hasClass("dark")) {
            $("body").removeClass("dark");
            $("#switch").removeClass("switched");
        }
        else {
            $("body").addClass("dark");
            $("#switch").addClass("switched");
        }
    });

    })(jQuery);

</script>
<script>
    $(document).ready(function(){
        // $.ui.menu.init();
        $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();

        } else {
            $('.scrollup').fadeOut();

        }
        });
        $(window).scroll(function () {
            if ($(this).scrollTop() > 600) {
                $('.contact-floating').fadeIn();
                $('.download-floating').fadeIn();
            } else {
                $('.contact-floating').fadeOut();
                $('.download-floating').fadeOut();
            }
        });
        $('.scrollup').click(function () {
            $("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });
        $('.parent .item').on("click", function() {
            $('.child').slideToggle( 500, function() {
                $('.child .detail-content').show( 100 );
            });
        });
        $('.parent2 .item').on("click", function() {
            $('.child2').slideToggle( 500, function() {
                $('.child2 .detail-content').show( 100 );
            });
        });
        $('.parent3 .item').on("click", function() {
            $('.child3').slideToggle( 500, function() {
                $('.child3 .detail-content').show( 100 );
            });
        });
    });
</script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script src='https://foliotek.github.io/Croppie/croppie.js'></script>
<script src='https://isotope.metafizzy.co/isotope.pkgd.min.js'></script>
<script>
    tinymce.init({
        selector:   "textarea.tiny",
        width:      '100%',
        height:     270,
        plugins:    "link",
        statusbar:  false,
        toolbar:    "link"
    });

    // Prevent bootstrap dialog from blocking focusin
    $(document).on('focusin', function(e) {
        if ($(e.target).closest(".tox-tinymce-aux, .moxman-window, .tam-assetmanager-root").length) {
            e.stopImmediatePropagation();
        }
    });

// $('#open').click(function() {
// 	$("#dialog").modal({
// 		width: 800
// 	});
// });
</script>
<script>
    AOS.init();
</script>

<script src="{{ asset('frontend/assets/lib/mask/jquery.inputmask.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/assets/lib/mask/mask.init.js') }}"></script>
<script src="{{ asset('frontend/assets/js/vendors/loadingoverlay/loadingoverlay.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/pages/common.js') }}"></script>

@stack('script')

</body>
</html>
