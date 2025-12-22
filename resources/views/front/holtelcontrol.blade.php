<!doctype html>
<html class="no-js agntix-light" lang="zxx">

<head>

  <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <base href="{{ url('/') }}/">
    <title>Giải pháp điều khiển phòng khách sạn | GRMS | AIControl Việt Nam</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Giải pháp điều khiển phòng khách sạn (GRMS) – giúp tối ưu trải nghiệm khách lưu trú, tiết kiệm năng lượng và vận hành hiệu quả. AIControl Việt Nam cung cấp hệ thống điều khiển ánh sáng, HVAC, thẻ từ, cảm biến và tự động hóa phòng khách sạn hiện đại.">
    <meta name="keywords" content="GRMS, điều khiển phòng khách sạn, Guest Room Management System, hotel control, HVAC khách sạn, tiết kiệm năng lượng, thẻ từ khách sạn, điều khiển ánh sáng hotel, AIControl, hotel automation">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/AIcontrol_imgs/small_logo.png') }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="https://aicontrol.vn/grms">

    <!-- Open Graph for Facebook -->
    <meta property="og:title" content="Giải pháp điều khiển phòng khách sạn | GRMS | AIControl Việt Nam">
    <meta property="og:description" content="AIControl Việt Nam cung cấp hệ thống GRMS: điều khiển ánh sáng, HVAC, cảm biến hiện diện, thẻ từ và tự động hóa phòng khách sạn giúp nâng cao trải nghiệm và tiết kiệm năng lượng.">
    <meta property="og:url" content="https://aicontrol.vn/grms">
    <meta property="og:site_name" content="AIControl Việt Nam">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://aicontrol.vn/assets/img/seo/grms-room-control.jpg">

    <!-- CSS here -->
    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome-pro.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/atropos.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/shop.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <!-- CSS here -->
    <!-- CSS here -->

</head>

<body class="tp-magic-cursor">

    <!-- Begin magic cursor -->
    <div id="magic-cursor">
        <div id="ball"></div>
    </div>
    <!-- End magic cursor -->

    <!-- preloader -->

    <!-- preloader -->
    <div id="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- preloader end  -->
    <!-- preloader end  -->

    <!-- back to top start -->
    <!-- back to top start -->
    <div class="back-to-top-wrapper">
        <button id="back_to_top" type="button" class="back-to-top-btn">
            <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
    </div>
    <!-- back to top end -->
    <!-- back to top end -->

    <!-- offcanvas-->
    @include('front.includes.offcanvas')

    <!-- header-->
    @include('front.includes.header')

    <!-- pop up contact -->
    @include('front.includes.popup')

    <div id="smooth-wrapper">
        <div id="smooth-content">

            <main>

                <!-- hero area start -->
                <div class="crp-about-3-hero-ptb" style="background: linear-gradient(135deg, #1a2332 0%, #34679A 100%);">
                    <div class="container container-1750">
                        <div class="row">
                            <div class="col-xl-2">
                                <div class="crp-hero-subtitle">
                                    <span class="tp-section-subtitle-teko mb-50 tp_fade_anim" data-delay=".3">GRMS Solution</span>
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-8 col-md-6">
                                <div class="crp-hero-ptb-3">
                                    <div class="crp-hero-title-box mb-35">
                                        <h2 class="crp-hero-title fs-100 tp_fade_anim pb-100">
                                            {{ __('hotel.hero_title') }}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="crp-about-3-funfact">
                                    <div class="crp-hero-funfact-wrap z-index-1 p-relative tp_fade_anim" data-delay=".5" style="background: #ffffff; border-radius: 20px; padding: 30px;">
                                        <div class="crp-hero-funfact-top-content">
                                            <h4 style="color: #34679A;">GRMS AIControl</h4>
                                            <p style="color: #16304b;">{{ __('hotel.hero_subtitle') }}</p>
                                        </div>
                                        <div class="crp-hero-funfact-item">
                                            <h4 style="color: #34679A;"><span data-purecounter-duration="1" data-purecounter-end="50" class="purecounter">0</span>+</h4>
                                            <div class="crp-hero-funfact-more-details d-flex justify-content-between">
                                                <p style="color: #16304b;">{{ __('hotel.stat_hotels') }}</p>
                                                <a href="{{ route(app()->getLocale() . '.projects.index') }}
">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M2 16L16 2M16 2V16M16 2L2 2" stroke="#2A4C3A" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="crp-hero-funfact-item">
                                            <h4 style="color: #34679A;"><span data-purecounter-duration="1" data-purecounter-end="40" class="purecounter">0</span>%</h4>
                                            <div class="crp-hero-funfact-more-details d-flex justify-content-between">
                                                <p style="color: #16304b;">{{ __('hotel.stat_energy_saving') }}</p>
                                                {{-- <a href="{{ route('contact') }}">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M2 16L16 2M16 2V16M16 2L2 2" stroke="#2A4C3A" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </a> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- hero area end -->

                <!-- banner area start -->
                <div class="crp-banner-area">
                    <div class="crp-banner-wrap">
                        <img class="w-100" data-speed=".8" src="assets/AIcontrol_imgs/hotel/pexels-pixabay-258154.jpg" alt="">
                    </div>
                </div>
                <!-- banner area end -->

                <!-- about area start -->
                <div class="crp-about-area pt-140 pb-160 z-index-1">
                    <div class="container container-1330">
                        <div class="crp-about-wrapper p-relative">
                            <div class="crp-about-shape">
                                <img data-speed="1.2" src="assets/img/home-09/about/ab-shape-1.png" alt="">
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4">
                                    <div class="crp-about-left">
                                        <span class="tp-section-subtitle-teko mb-120 tp_fade_anim" data-delay=".3">Giải pháp <br> <i>GRMS</i> AIControl</span>
                                        <div class="crp-about-exp tp_fade_anim" data-delay=".5" data-fade-from="top" data-ease="bounce">
                                            <div class="crp-about-exp-item text-center">
                                                <span data-purecounter-duration="1" data-purecounter-end="12" class="purecounter">0</span>
                                                <i>Năm Kinh <br> Nghiệm</i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-lg-8">
                                    <div class="crp-about-right">
                                        <h4 class="tp-section-title-teko mb-55 tp_fade_anim" style="color: #14293D"  data-delay=".3">
                                            GRMS (Guest Room Management System) là hệ thống
                                            quản lý và điều khiển <span style="color: #34679A">thông minh toàn bộ</span>
                                            thiết bị trong phòng khách sạn, mang lại trải nghiệm
                                            tuyệt vời cho khách và tối ưu vận hành.
                                        </h4>
                                        <div class="crp-about-bottom-wrap d-flex">
                                            <div class="crp-about-btn-box tp_fade_anim" data-delay=".5">
                                                {{-- <a class="tp-btn-yellow-green lg" href="{{ route('contact') }}">
                                                    <span>
                                                        <span class="text-1">Tư Vấn GRMS</span>
                                                        <span class="text-2">Tư Vấn GRMS</span>
                                                    </span>
                                                </a> --}}
                                            </div>
                                            <div class="crp-about-text tp_fade_anim" data-delay=".7">
                                                <p>
                                                    AIControl cung cấp giải pháp GRMS tích hợp hoàn chỉnh với
                                                    <a href="{{  route(current_locale() . '.vantage') }}">Vantage</a>, 
                                                    <a href="{{ route(current_locale() . '.legrand') }}">Legrand</a>, và 
                                                    <a href="{{ route(current_locale() . '.abb') }}">ABB</a>, 
                                                    giúp khách sạn nâng cao chất lượng dịch vụ và giảm 40% chi phí vận hành.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- about area end -->

                <!-- brand area start -->
                <div class="creative-brand-area pb-80 fix">
                    <div class="creative-brand-wrapper">
                        <div class="swiper-container creative-brand-active">
                            <div class="swiper-wrapper slider-transtion">
                                <div class="swiper-slide">
                                    <div class="creative-brand-item">
                                        <img src="assets/img/home-04/brand/brand-1.png" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="creative-brand-item">
                                        <img src="assets/img/home-04/brand/brand-6.png" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="creative-brand-item">
                                        <img src="assets/img/home-04/brand/brand-3.png" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="creative-brand-item">
                                        <img src="assets/img/home-04/brand/brand-4.png" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="creative-brand-item">
                                        <img src="assets/img/home-04/brand/brand-5.png" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="creative-brand-item">
                                        <img src="assets/img/home-04/brand/brand-6.png" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="creative-brand-item">
                                        <img src="assets/img/home-04/brand/brand-1.png" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="creative-brand-item">
                                        <img src="assets/img/home-04/brand/brand-3.png" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="creative-brand-item">
                                        <img src="assets/img/home-04/brand/brand-5.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- brand area end -->

                <!-- service area start -->
                <div class="crp-service-area p-relative pt-80 pb-90">
                    <div class="crp-service-shape-wrap">
                        <img class="crp-service-shape-1" data-speed="1.1" src="assets/img/home-09/service/service-shape-1.png" alt="">
                        <img class="crp-service-shape-2" data-speed="1.1" src="assets/img/home-09/service/service-shape-2.png" alt="">
                        <img class="crp-service-shape-3" data-speed="1.1" src="assets/img/home-09/service/service-shape-3.png" alt="">
                    </div>
                    <div class="container container-1330">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="crp-service-title-box">
                                    <span class="tp-section-subtitle-teko mb-25 tp_fade_anim" data-delay=".3">Creative approach</span>
                                    <h4 class="tp-section-title-teko tp_fade_anim" data-delay=".5">Smart <span>Business</span> <br> Solutions</h4>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="crp-service-item mt-50 pb-65 d-flex tp_fade_anim" data-delay=".3">
                                    <div class="crp-service-icon">
                                        <span>
                                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.9994 4.25453e-08C15.9996 2.10111 15.5858 4.18169 14.7818 6.12289C13.9779 8.0641 12.7994 9.82793 11.3136 11.3136C9.82793 12.7994 8.0641 13.9779 6.12289 14.7818C4.18169 15.5858 2.10111 15.9996 4.25443e-08 15.9994C0.000309438 11.7562 1.68606 7.68687 4.68647 4.68647C7.68687 1.68606 11.7562 0.000309438 15.9994 4.25453e-08ZM15.9994 32C18.1007 32.0002 20.1814 31.5864 22.1228 30.7823C24.0642 29.9783 25.828 28.7997 27.3139 27.3139C28.7997 25.828 29.9783 24.0642 30.7823 22.1228C31.5864 20.1814 32.0002 18.1007 32 15.9994C27.7565 15.9997 23.6868 17.6856 20.6863 20.6863C17.6856 23.6868 15.9997 27.7565 15.9994 32ZM4.25443e-08 15.9994C-0.000153182 18.1005 0.41357 20.1812 1.21755 22.1224C2.02153 24.0638 3.20002 25.8277 4.6857 27.3134C6.17141 28.7993 7.93522 29.9779 9.87644 30.7821C11.8177 31.5861 13.8982 32 15.9994 32C15.9994 27.7565 14.3138 23.687 11.3134 20.6863C8.31292 17.6856 4.24341 15.9997 4.25443e-08 15.9994ZM15.9994 4.25453e-08C15.9997 4.24341 17.6856 8.31292 20.6863 11.3134C23.687 14.3138 27.7565 15.9994 32 15.9994C32 13.8982 31.5861 11.8177 30.7821 9.87644C29.9779 7.93522 28.7993 6.17141 27.3134 4.6857C25.8277 3.20002 24.0638 2.02153 22.1224 1.21755C20.1812 0.41357 18.1005 -0.000153182 15.9994 4.25453e-08Z" fill="#e9ff48" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="crp-service-content">
                                        <h4 class="crp-service-title-sm"><a class="tp-line-white cream" href="service-details-2-light.html">Business Consultation</a></h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, conse ctetur
                                            sadipiscing elit, sed dominus eiusmc od tempor
                                            omincid idu nt ut labore et dolore <br>
                                            magna aliqua.
                                        </p>
                                        <a class="crp-service-link" href="service-details-2-light.html">
                                            <span>
                                                <span class="text-1">View More</span>
                                                <span class="text-2">View More</span>
                                            </span>
                                            <i>
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 11L11 1M11 1V11M11 1H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 11L11 1M11 1V11M11 1H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="crp-service-item mt-50 pb-65 d-flex tp_fade_anim" data-delay=".5">
                                    <div class="crp-service-icon">
                                        <span>
                                            <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M34 13.6615V14.1329C34 22.644 28.6701 30.3065 20.5342 33.4779C15.6984 35.3635 10.4303 31.9094 10.4303 26.8438C18.3722 23.7411 23.5698 16.2671 23.5698 7.96178V7.15609L23.8963 7.02753C28.7318 5.1419 34 8.60461 34 13.6615ZM23.5698 7.15609C23.5698 2.09061 18.3016 -1.36353 13.4659 0.5221C5.32987 3.6934 0 11.3559 0 19.867V20.3299C0 25.3954 5.2681 28.8495 10.1038 26.9639L10.4303 26.8353V26.0296C10.4303 17.7328 15.6278 10.2588 23.5698 7.15609Z" fill="#e9ff48" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="crp-service-content">
                                        <h4 class="crp-service-title-sm"><a class="tp-line-white cream" href="service-details-2-light.html">Professional Business</a></h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, conse ctetur
                                            sadipiscing elit, sed dominus eiusmc od tempor
                                            omincid idu nt ut labore et dolore <br>
                                            magna aliqua.
                                        </p>
                                        <a class="crp-service-link" href="service-details-2-light.html">
                                            <span>
                                                <span class="text-1">View More</span>
                                                <span class="text-2">View More</span>
                                            </span>
                                            <i>
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 11L11 1M11 1V11M11 1H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 11L11 1M11 1V11M11 1H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="crp-service-item mt-50 pb-65 d-flex tp_fade_anim" data-delay=".7">
                                    <div class="crp-service-icon">
                                        <span>
                                            <svg width="27" height="32" viewBox="0 0 27 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M26.4002 5.09777V24.7863L8.09429 32V23.708L18.2976 19.6885V8.2839L26.4002 5.09777ZM18.2976 8.2839V0L0 7.20551V26.8941L8.09429 23.708V12.3033L18.2976 8.2839Z" fill="#e9ff48" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="crp-service-content">
                                        <h4 class="crp-service-title-sm"><a class="tp-line-white cream" href="service-details-2-light.html">Business Growth</a></h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, conse ctetur
                                            sadipiscing elit, sed dominus eiusmc od tempor
                                            omincid idu nt ut labore et dolore <br>
                                            magna aliqua.
                                        </p>
                                        <a class="crp-service-link" href="service-details-2-light.html">
                                            <span>
                                                <span class="text-1">View More</span>
                                                <span class="text-2">View More</span>
                                            </span>
                                            <i>
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 11L11 1M11 1V11M11 1H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 11L11 1M11 1V11M11 1H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- service area end -->

                <!-- success area start -->
                <div class="crp-success-area mb-100 p-relative">
                    <div class="container-fluid p-0">
                        <div class="row gx-10">
                            <div class="col-xl-6">
                                <div class="row gx-10">
                                    <div class="col-xl-6 col-lg-6 col-md-6 mb-10">
                                        <div class="crp-success-item about-us p-relative" data-bg-color="#45653C" data-background="assets/img/about-us/about-us-thumb-3.png">
                                            <div class="crp-about-us-item-wrap">
                                                <div class="crp-about-us-item-icon">
                                                    <span><svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15" fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.92553 9.27506C3.84549 12.2016 7.45199 12.9209 9.77481 12.1958L11.1295 14.6676C11.254 14.874 11.4734 14.9996 11.7096 14.9996H16.3166C16.8157 14.9996 17.146 14.4669 16.9354 14.0017L10.7799 0.405605C10.6642 0.150088 10.4111 -0.00947846 10.1371 0.000435603L3.62801 0.235985C3.60506 0.236815 3.58251 0.23875 3.56042 0.241728C2.93431 0.265385 2.34927 0.444713 1.84298 0.795815C-0.839236 2.65588 -0.40367 6.27712 1.92553 9.27506ZM8.64298 9.90472C10.153 8.85757 10.2 6.40865 9.18555 4.35178C7.22576 1.36455 4.15183 0.316804 2.43995 1.31967C0.0418452 2.72455 1.09979 6.85172 2.77513 8.95691C4.45046 11.0621 6.86831 11.1354 8.64298 9.90472Z" fill="#F9F4E8" />
                                                            <path d="M4.54315 4.32617C4.73732 3.90234 5.2732 3.78941 5.61389 4.10054L7.25538 5.59958C7.48022 5.80491 7.54785 6.13735 7.4219 6.41812L4.06045 14.5922C3.94893 14.8408 3.70695 15 3.44066 15L1.02887 15C0.528456 15 0.198165 14.4647 0.411397 13.9992L4.54315 4.32617Z" fill="#F9F4E8" />
                                                        </svg></span>
                                                </div>
                                                <h4 class="crp-about-us-item-title">Unique and <br>
                                                    New Business Tips</h4>
                                                <div class="crp-about-us-item-btn-box">
                                                    <span>42k people</span>
                                                    <a href="#"><span>Explore <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                                                                <path d="M1 8.99994L9 0.999939" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M1 0.999939H9V8.99994" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 mb-10">
                                        <div class="crp-success-item">
                                            <div class="crp-success-img anim-zoomin-wrap">
                                                <img class="w-100 anim-zoomin" src="assets/img/about-us/about-us-thumb-2.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 mb-10">
                                        <div class="crp-success-item about-us">
                                            <div class="crp-success-video anim-zoomin-wrap">
                                                <video loop="" muted="" autoplay="" playsinline="" src="assets/img/about-us/about-us-3.mp4"></video>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 mb-10">
                                        <div class="crp-success-item about-us-img p-relative" data-bg-color="#45653C">
                                            <div class="crp-about-us-item-img">
                                                <img src="assets/img/about-us/about-us-thumb-4.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="crp-success-about-us-big-img anim-zoomin-wrap">
                        <img class="w-100 anim-zoomin" src="assets/img/about-us/about-us-thumb-1.jpg" alt="">
                    </div>
                </div>
                <!-- success area end -->

                <!-- team area start -->
                <div class="des-team-area pb-180">
                    <div class="container container-1750">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="des-team-wrap des-team-inner-style">
                                    <div class="des-team-item-box active hover-reveal-item p-relative">
                                        <a href="team-details-light.html">
                                            <div class="des-team-item d-flex align-items-center justify-content-between">
                                                <span>Since 2010</span>
                                                <h4 class="des-team-title">Logan Dang</h4>
                                                <span>Web Designer</span>
                                            </div>
                                        </a>
                                        <div class="des-team-reveal-img" data-background="assets/img/home-02/team/team-1.jpg"></div>
                                    </div>
                                    <div class="des-team-item-box active hover-reveal-item p-relative">
                                        <a href="team-details-light.html">
                                            <div class="des-team-item d-flex align-items-center justify-content-between">
                                                <span>Since 2010</span>
                                                <h4 class="des-team-title">Rahat Chowhury</h4>
                                                <span>Web Designer</span>
                                            </div>
                                        </a>
                                        <div class="des-team-reveal-img" data-background="assets/img/home-02/team/team-2.jpg"></div>
                                    </div>
                                    <div class="des-team-item-box active hover-reveal-item p-relative">
                                        <a href="team-details-light.html">
                                            <div class="des-team-item d-flex align-items-center justify-content-between">
                                                <span>Since 2010</span>
                                                <h4 class="des-team-title">Thomas Finlan</h4>
                                                <span>Web Designer</span>
                                            </div>
                                        </a>
                                        <div class="des-team-reveal-img" data-background="assets/img/home-02/team/team-3.jpg"></div>
                                    </div>
                                    <div class="des-team-item-box active hover-reveal-item p-relative">
                                        <a href="team-details-light.html">
                                            <div class="des-team-item d-flex align-items-center justify-content-between">
                                                <span>Since 2010</span>
                                                <h4 class="des-team-title">Farhan Firoz</h4>
                                                <span>Web Designer</span>
                                            </div>
                                        </a>
                                        <div class="des-team-reveal-img" data-background="assets/img/home-02/team/team-4.jpg"></div>
                                    </div>
                                    <div class="des-team-item-box active hover-reveal-item p-relative">
                                        <a href="team-details-light.html">
                                            <div class="des-team-item d-flex align-items-center justify-content-between">
                                                <span>Since 2010</span>
                                                <h4 class="des-team-title">Billy Craft</h4>
                                                <span>Web Designer</span>
                                            </div>
                                        </a>
                                        <div class="des-team-reveal-img" data-background="assets/img/home-02/team/team-5.jpg"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- team area end -->

                <!-- price area start -->
                <div class="crp-price-area crp-inner-style fix p-relative z-index-1 pt-120 pb-140" data-bg-color="#edf2ef">
                    <div class="crp-price-shape-2 d-none d-xl-block">
                        <img src="assets/img/home-09/price/shape-2.png" alt="">
                    </div>
                    <div class="container container-1330">
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="pp-award-left tp_fade_anim" data-delay=".3">
                                    <span class="tp-section-subtitle-clash clash-subtitle-pos body-ff">
                                        Award
                                        <i>
                                            <svg width="102" height="9" viewBox="0 0 102 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M98 8L101.5 4.5L98 1M1 4H101V5H1V4Z" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-10">
                                <div class="pp-about-heading pb-55">
                                    <h3 class="tp-section-title-teko fs-120 tp_fade_anim" data-delay=".5">Awards & <br> Recognitions</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="pp-award-wrapper">
                                    <div class="tp-award-item-wrap p-relative">
                                        <div class="tp-award-item pp-award-header p-relative mb-5 tp_fade_anim">
                                            <div class="row align-items-center">
                                                <div class="col-lg-8 col-md-6">
                                                    <div class="tp-award-box-left z-index-3">
                                                        <span class="tp-award-year tp-award-text-2">year</span>
                                                        <span class="tp-award-text tp-award-text-2">Recognition</span>
                                                        <span class="tp-award-text-2">platform</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="tp-award-box-right z-index-3 d-flex justify-content-between align-items-center">
                                                        <span class="tp-award-text-2">Project</span>
                                                        <span class="tp-award-icon tp-award-text-2">
                                                            Link
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tp-award-item hover-reveal-item p-relative tp_fade_anim">
                                            <div class="row align-items-center">
                                                <div class="col-lg-8 col-md-6">
                                                    <div class="tp-award-box-left z-index-3">
                                                        <span class="tp-award-year">2025</span>
                                                        <span class="tp-award-text">Honors</span>
                                                        <span class="tp-award-year">AWWWARDS</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="tp-award-box-right z-index-3 d-flex justify-content-between align-items-center">
                                                        <span class="tp-award-position">Agntix</span>
                                                        <span class="tp-award-link">
                                                            Link
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tp-award-reveal-img" data-background="assets/img/home-01/award/award-1.jpg"></div>
                                        </div>
                                        <div class="tp-award-item hover-reveal-item p-relative tp_fade_anim">
                                            <div class="row align-items-center">
                                                <div class="col-lg-8 col-md-6">
                                                    <div class="tp-award-box-left z-index-3">
                                                        <span class="tp-award-year">2025</span>
                                                        <span class="tp-award-text">Site of the Day</span>
                                                        <span class="tp-award-year">Mindsparkle Mag</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="tp-award-box-right z-index-3 d-flex justify-content-between align-items-center">
                                                        <span class="tp-award-position">Personal Portfolio</span>
                                                        <span class="tp-award-link">
                                                            Link
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tp-award-reveal-img" data-background="assets/img/home-01/award/award-2.jpg"></div>
                                        </div>
                                        <div class="tp-award-item hover-reveal-item p-relative tp_fade_anim">
                                            <div class="row align-items-center">
                                                <div class="col-lg-8 col-md-6">
                                                    <div class="tp-award-box-left z-index-3">
                                                        <span class="tp-award-year">2023</span>
                                                        <span class="tp-award-text">Best Innovation</span>
                                                        <span class="tp-award-year">MUSE Awards</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="tp-award-box-right z-index-3 d-flex justify-content-between align-items-center">
                                                        <span class="tp-award-position">Thom Evans Fitness</span>
                                                        <span class="tp-award-link">
                                                            Link
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tp-award-reveal-img" data-background="assets/img/home-01/award/award-3.jpg"></div>
                                        </div>
                                        <div class="tp-award-item hover-reveal-item p-relative tp_fade_anim">
                                            <div class="row align-items-center">
                                                <div class="col-lg-8 col-md-6">
                                                    <div class="tp-award-box-left z-index-3">
                                                        <span class="tp-award-year">2022</span>
                                                        <span class="tp-award-text">Mobile Excellence</span>
                                                        <span class="tp-award-year">Mindsparkle Mag</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="tp-award-box-right z-index-3 d-flex justify-content-between align-items-center">
                                                        <span class="tp-award-position">Pixel Forged</span>
                                                        <span class="tp-award-link">
                                                            Link
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tp-award-reveal-img" data-background="assets/img/home-01/award/award-4.jpg"></div>
                                        </div>
                                        <div class="tp-award-item hover-reveal-item p-relative tp_fade_anim">
                                            <div class="row align-items-center">
                                                <div class="col-lg-8 col-md-6">
                                                    <div class="tp-award-box-left z-index-3">
                                                        <span class="tp-award-year">2021</span>
                                                        <span class="tp-award-text">Site of the Day</span>
                                                        <span class="tp-award-year">CSS Awards</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="tp-award-box-right z-index-3 d-flex justify-content-between align-items-center">
                                                        <span class="tp-award-position">Portfolio</span>
                                                        <span class="tp-award-link">
                                                            Link
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tp-award-reveal-img" data-background="assets/img/home-01/award/award-5.jpg"></div>
                                        </div>
                                        <div class="tp-award-item hover-reveal-item p-relative tp_fade_anim">
                                            <div class="row align-items-center">
                                                <div class="col-lg-8 col-md-6">
                                                    <div class="tp-award-box-left z-index-3">
                                                        <span class="tp-award-year">2020</span>
                                                        <span class="tp-award-text">Honors</span>
                                                        <span class="tp-award-year">AWWWARDS</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="tp-award-box-right z-index-3 d-flex justify-content-between align-items-center">
                                                        <span class="tp-award-position">Agntix Studio</span>
                                                        <span class="tp-award-link">
                                                            Link
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tp-award-reveal-img" data-background="assets/img/home-01/award/award-6.jpg"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- price area end -->

                <!-- project area start -->
                <div class="crp-project-area tp-panel-pin-area pt-140 mb-150">
                    <div class="container container-1330">
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="crp-project-title-box tp-panel-pin">
                                    <h4 class="tp-section-title-teko fs-150 mb-50 tp_fade_anim" data-delay=".3">Our recent <span>projects</span></h4>
                                    <div class="tp_fade_anim" data-delay=".5" data-fade-from="top" data-ease="bounce">
                                        <a class="tp-btn-yellow-border" href="portfolio-col-3-light.html">
                                            <span>
                                                <span class="text-1">See All Projects</span>
                                                <span class="text-2">See All Projects</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7">
                                <div class="crp-project-right">
                                    <div class="tp-work-item about-us-3-bg tp-panel-pin mb-15">
                                        <div class="tp-work-number p-relative">
                                            <span></span>
                                            <i>01</i>
                                        </div>
                                        <div class="tp-work-content">
                                            <h4 class="tp-work-title">User Research</h4>
                                            <p>We listen stories of user to understand pain points and give a rough <br> estimate about cost and time-frame</p>
                                        </div>
                                    </div>
                                    <div class="tp-work-item about-us-3-bg tp-panel-pin mb-15">
                                        <div class="tp-work-number p-relative">
                                            <span></span>
                                            <i>02</i>
                                        </div>
                                        <div class="tp-work-content">
                                            <h4 class="tp-work-title">Define Problems</h4>
                                            <p>We listen stories of user to understand pain points and give a rough <br> estimate about cost and time-frame</p>
                                        </div>
                                    </div>
                                    <div class="tp-work-item about-us-3-bg tp-panel-pin mb-15">
                                        <div class="tp-work-number p-relative">
                                            <span></span>
                                            <i>03</i>
                                        </div>
                                        <div class="tp-work-content">
                                            <h4 class="tp-work-title">Design & Prototype</h4>
                                            <p>We listen stories of user to understand pain points and give a rough <br> estimate about cost and time-frame</p>
                                        </div>
                                    </div>
                                    <div class="tp-work-item about-us-3-bg tp-panel-pin mb-15">
                                        <div class="tp-work-number p-relative">
                                            <span></span>
                                            <i>04</i>
                                        </div>
                                        <div class="tp-work-content">
                                            <h4 class="tp-work-title">Evaluation & Testing</h4>
                                            <p>We listen stories of user to understand pain points and give a rough <br> estimate about cost and time-frame</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- project area end -->


            </main>
            {{-- footer --}}
            @include('front.includes.footer')
            

        </div>
    </div>



    <!-- JS here -->

    <!-- JS here -->


    <script src="assets/js/vendor/jquery.js"></script>
    <script src="assets/js/bootstrap-bundle.js"></script>
    <script src="assets/js/swiper-bundle.js"></script>
    <script src="assets/js/plugin.js"></script>
    <script src="assets/js/three.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/scroll-magic.js"></script>
    <script src="assets/js/hover-effect.umd.js"></script>
    <script src="assets/js/magnific-popup.js"></script>
    <script src="assets/js/parallax-slider.js"></script>
    <script src="assets/js/nice-select.js"></script>
    <script src="assets/js/purecounter.js"></script>
    <script src="assets/js/isotope-pkgd.js"></script>
    <script src="assets/js/imagesloaded-pkgd.js"></script>
    <script src="assets/js/ajax-form.js"></script>
    <script src="assets/js/Observer.min.js"></script>
    <script src="assets/js/splitting.min.js"></script>
    <script src="assets/js/webgl.js"></script>
    <script src="assets/js/parallax-scroll.js"></script>
    <script src="assets/js/atropos.js"></script>
    <script src="{{ asset('assets/js/slider-active.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/header-search.js') }}"></script>
    <script src="{{ asset('assets/js/tp-cursor.js') }}"></script>
    <script src="assets/js/portfolio-slider-1.js"></script>
    <script type="module" src="assets/js/distortion-img.js"></script>
    <script type="module" src="assets/js/skew-slider/index.js"></script>
    <script type="module" src="assets/js/img-revel/index.js"></script>


    <!-- JS here -->
    <!-- JS here -->

</body>

</html>