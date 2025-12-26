<!doctype html>
<html class="no-js agntix-light" lang="{{ current_locale() }}">

<head>

  <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{ url('/') }}/">
    <title>{{ __('hotel.meta_title') }}</title>
    
    <meta name="description" content="{{ __('hotel.meta_description') }}">
    <meta name="keywords" content="{{ __('hotel.meta_keywords') }}">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/AIcontrol_imgs/small_logo.png') }}">
    @include('front.partials.ga')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css">
    <!-- Canonical URL -->
 <!-- Canonical (avoid duplicate URLs) -->
    @php
         $path = ltrim(preg_replace('#^(vi|en)(/)?#', '', request()->path()), '/');
    @endphp
    <link rel="canonical" href="@yield('canonical', url()->current())">
    <link rel="alternate" hreflang="vi" href="{{ url('/vi/' . $path) }}">
    <link rel="alternate" hreflang="en" href="{{ url('/en/' . $path) }}">
    <link rel="alternate" hreflang="x-default" href="{{ url('/') }}">


    <!-- Open Graph for Facebook -->
    <!-- Open Graph (Facebook, Zalo, etc.) -->
    <meta property="og:title" content="{{ __('hotel.og_title') }}">
    <meta property="og:description" content="{{ __('hotel.og_description') }}">
    <meta property="og:image" content="{{ url(asset('assets/AIcontrol_imgs/ai_control_logo.png')) }}">

    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="{{ __('hotel.og_image_alt') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="{{ app()->getLocale() === 'vi' ? 'vi_VN' : 'en_US' }}">

    <!-- CSS here -->
    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome-pro.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/atropos.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/shop.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <!-- CSS here -->
    <!-- CSS here -->

</head>

<body class="">

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
                                        <h1 class="crp-hero-title fs-100 tp_fade_anim pb-100">
                                            {{ __('hotel.hero_title') }}
                                        </h1>
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
                        <img class="w-100" data-speed=".8" src="{{ assets('assets/AIcontrol_imgs/hotel/pexels-pixabay-258154.jpg') }}" alt="">
                    </div>
                </div>
                <!-- banner area end -->

                <!-- about area start -->
                <div class="crp-about-area pt-140 pb-160 z-index-1">
                    <div class="container container-1330">
                        <div class="crp-about-wrapper p-relative">
                            <div class="crp-about-shape">
                                
                                <img data-speed="1.2" src="{{ assets('assets/img/home-09/about/ab-shape-1.png') }}" alt="shape">
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4">
                                    <div class="crp-about-left">
                                        <span class="tp-section-subtitle-teko mb-120 tp_fade_anim" data-delay=".3"><span>{{ __('hotel.grms_solution_line_1') }}</span><br>
                                        <i>{{ __('hotel.grms_solution_line_2') }}</i>
                                        </span>
                                        <div class="crp-about-exp tp_fade_anim" data-delay=".5" data-fade-from="top" data-ease="bounce">
                                            <div class="crp-about-exp-item text-center">
                                                <span data-purecounter-duration="1" data-purecounter-end="12" class="purecounter">0</span>
                                                <i>{!! __('hotel.experience_years') !!}</i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-lg-8">
                                    <div class="crp-about-right">
                                        <h4 class="tp-section-title-teko mb-55 tp_fade_anim" style="color: #14293D"  data-delay=".3">
                                            {!! __('hotel.grms_description') !!}
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
                                                    {!! __('hotel.inline_with_savings', [
                                                        'vantage' => route(current_locale() . '.vantage'),
                                                        'legrand' => route(current_locale() . '.legrand'),
                                                        'abb'     => route(current_locale() . '.abb'),
                                                    ]) !!}

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
                {{-- <div class="creative-brand-area pb-80 fix">
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
                </div> --}}
                <!-- brand area end -->

                <!-- service area start -->
                <div class="crp-service-area p-relative pt-80 pb-90">
                    <div class="crp-service-shape-wrap">
                        <img  class="crp-service-shape-1" data-speed="1.1"src="{{ assets('assets/img/home-09/service/service-shape-1.png') }}" alt="shape">
                        <img  class="crp-service-shape-1" data-speed="1.1"src="{{ assets('assets/img/home-09/service/service-shape-2.png') }}" alt="shape">
                        <img  class="crp-service-shape-1" data-speed="1.1"src="{{ assets('assets/img/home-09/service/service-shape-3.png') }}" alt="shape">
                    </div>
                    <div class="container container-1330">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="crp-service-title-box">
                                    <span class="tp-section-subtitle-teko mb-25 tp_fade_anim" data-delay=".2">{!! __('hotel.features_title') !!}</span>
                                    <h4 class="tp-section-title-teko tp_fade_anim" data-delay=".5">{!! __('hotel.features_subtitle') !!}</h4>
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
                                        <h4 class="crp-service-title-sm"><a class="tp-line-white " >{!! __('hotel.feature_lighting_title') !!}</a></h4>
                                        <p>
                                            {!! __('hotel.feature_lighting_desc') !!}
                                        </p>
                                        <a class="crp-service-link">
                                            {{-- <span>
                                                <span class="text-1">View More</span>
                                                <span class="text-2">View More</span>
                                            </span> --}}
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
                                        <h4 class="crp-service-title-sm"><a class="tp-line-white cream" >{!! __('hotel.feature_hvac_title') !!}</a></h4>
                                        <p>
                                            {!! __('hotel.feature_hvac_desc') !!}
                                        </p>
                                        <a class="crp-service-link">
                                            {{-- <span>
                                                <span class="text-1">View More</span>
                                                <span class="text-2">View More</span>
                                            </span> --}}
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
                                        <h4 class="crp-service-title-sm"><a class="tp-line-white cream">{!! __('hotel.feature_control_title') !!}</a></h4>
                                        <p>
                                            {!! __('hotel.feature_control_desc') !!}
                                        </p>
                                        <a class="crp-service-link">
                                            {{-- <span>
                                                <span class="text-1">View More</span>
                                                <span class="text-2">View More</span>
                                            </span> --}}
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
                                        <div class="crp-success-item">
                                            <div class="crp-success-img anim-zoomin-wrap">
                                                <img class="w-100 anim-zoomin" src="assets/AIcontrol_imgs/hotel/ht6.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 mb-10">
                                        <div class="crp-success-item">
                                            <div class="crp-success-img anim-zoomin-wrap">
                                                <img class="w-100 anim-zoomin" src="assets/AIcontrol_imgs/hotel/ht7.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 mb-10">
                                        <div class="crp-success-item about-us">
                                            <div class="crp-success-video anim-zoomin-wrap">
                                                {{-- <video loop="" muted="" autoplay="" playsinline="" src="assets/img/about-us/about-us-3.mp4"></video> --}}
                                                <img class="w-100 anim-zoomin" src="assets/AIcontrol_imgs/hotel/ht5.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 mb-10">
                                        <div class="crp-success-item about-us-img p-relative" data-bg-color="">
                                            <div class="crp-about-us-item-img">
                                                <img src="assets/AIcontrol_imgs/hotel/ht4.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="crp-success-about-us-big-img anim-zoomin-wrap">
                        <img class="w-100 anim-zoomin" src="assets/AIcontrol_imgs/hotel/ht3.jpg" alt="">
                    </div>
                </div>
                <!-- success area end -->

                <!-- blog area start -->
                <div class="ar-blog-area pb-100 pt-120">
                    <div class="container container-1430">
                        <div class="ar-blog-title-wrap ar-title-mlr mb-60">
                            <div class="row align-items-end">
                                <div class="col-xl-8 col-lg-8 col-md-7">
                                    <div class="ar-blog-title-box">
                                        <h3 class="tp-section-title-clash-600 fs-60 mb-0 tp_fade_anim" data-delay=".4">{{ __('abb.blog_title') }}</h3>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-5">
                                    <div class="ar-blog-btn-box d-flex justify-content-md-end justify-content-start mb-15">
                                        <div class="tp-btn-red-circle-box tp_fade_anim" data-delay=".5" data-fade-from="top" data-ease="bounce">
                                            <a class="tp-btn-red-circle-icon" href="{{ route(current_locale() . '.blog.index') }}">
                                                <span>
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 11L11 1M11 1H1M11 1V11" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                            </a>
                                            <a class="tp-btn-red-circle-text" href="{{ route(current_locale() . '.blog.index') }}">{{ __('abb.blog_view_all') }}</a>
                                            <a class="tp-btn-red-circle-icon" href="{{ route(current_locale() . '.blog.index') }}">
                                                <span>
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 11L11 1M11 1H1M11 1V11" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gx-40">
                            @forelse(($NewestBlogs ?? collect()) as $index => $blog)
                                @php
                                    $delay = number_format(0.3 + ($index * 0.1), 1);
                                    $cover = $blog->featured_image ? asset($blog->featured_image) : asset('assets/img/home-08/blog/blog-1.jpg');
                                    $primaryCategoryModel = $blog->blogCategories->first();
                                    $primaryCategory = optional($primaryCategoryModel)->name ?? 'Blog';
                                    $categoryUrl = route(current_locale() . '.blog.show', ['slug' => $blog->slug]);
                                    $publishedDate = $blog->published_at ? $blog->published_at->format('M d, Y') : ($blog->created_at ? $blog->created_at->format('M d, Y') : null);
                                @endphp
                                <div class="col-xl-3 col-lg-6 col-md-6">
                                    <div class="ar-blog-item mb-30 tp_fade_anim" data-delay=".{{ $delay }}">
                                        <div class="ar-blog-thumb p-relative">
                                            <a href="{{ route(current_locale() . '.blog.show', ['slug' => $blog->slug]) }}"><img class="w-100" src="{{ $cover }}" alt="{{ $blog->title }}"></a>
                                            <a class="ar-blog-category" href="{{ $categoryUrl }}">{{ $primaryCategory }}</a>
                                        </div>
                                        <div class="ar-blog-content">
                                            <h3 class="ar-blog-title-sm"><a class="tp-line-black" href="{{ route(current_locale() . '.blog.show', ['slug' => $blog->slug]) }}">{{ \Illuminate\Support\Str::limit($blog->title, 70) }}</a></h3>
                                            @if($publishedDate)
                                                <span class="ar-blog-meta">{{ $publishedDate }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <p class="text-center text-muted">{{ __('abb.blog_no_posts') }}</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <!-- blog area end -->


            </main>
            {{-- footer --}}
            @include('front.includes.footer')
            

        </div>
    </div>



    <!-- JS here -->

    <!-- JS here -->


  <script src="{{ asset('assets/js/vendor/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-bundle.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.js') }}"></script>
    <script src="{{ asset('assets/js/plugin.js') }}"></script>
    <script src="{{ asset('assets/js/three.js') }}"></script>
    <script src="{{ asset('assets/js/slick.js') }}"></script>
    <script src="{{ asset('assets/js/scroll-magic.js') }}"></script>
    <script src="{{ asset('assets/js/hover-effect.umd.js') }}"></script>
    <script src="{{ asset('assets/js/magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/js/parallax-slider.js') }}"></script>
    <script src="{{ asset('assets/js/nice-select.js') }}"></script>
    <script src="{{ asset('assets/js/purecounter.js') }}"></script>
    <script src="{{ asset('assets/js/isotope-pkgd.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded-pkgd.js') }}"></script>
    <script src="{{ asset('assets/js/ajax-form.js') }}"></script>
    <script src="{{ asset('assets/js/Observer.min.js') }}"></script>
    <script src="{{ asset('assets/js/splitting.min.js') }}"></script>
    <script src="{{ asset('assets/js/webgl.js') }}"></script>
    <script src="{{ asset('assets/js/parallax-scroll.js') }}"></script>
    <script src="{{ asset('assets/js/atropos.js') }}"></script>
    <script src="{{ asset('assets/js/slider-active.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/popup.js') }}"></script>
    <script src="{{ asset('assets/js/header-search.js') }}"></script>
    <script src="{{ asset('assets/js/tp-cursor.js') }}"></script>
    <script src="{{ asset('assets/js/portfolio-slider-1.js') }}"></script>
    <script type="module" src="{{ asset('assets/js/distortion-img.js') }}"></script>
    <script type="module" src="{{ asset('assets/js/skew-slider/index.js') }}"></script>
    <script type="module" src="{{ asset('assets/js/img-revel/index.js') }}"></script>
    <script src="{{ asset('assets/js/popup.js') }}"></script>


    <!-- JS here -->
    <!-- JS here -->

</body>

</html>