<!doctype html>
<html class="no-js" lang="{{ current_locale() }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{ url(current_locale()) }}/">
    <title>{{ __('lighting.meta_title') }}</title>
    <meta name="description" content="{{ __('lighting.meta_description') }}">
    

    <!-- ✅ Từ khóa (SEO Keywords) -->
    <meta name="keywords" content="{{ __('lighting.meta_keywords') }}">


    <!-- ✅ Canonical URL -->
 <!-- Canonical (avoid duplicate URLs) -->
    @php
         $path = ltrim(preg_replace('#^(vi|en)(/)?#', '', request()->path()), '/');
    @endphp
    <link rel="canonical" href="@yield('canonical', url()->current())">
    <link rel="alternate" hreflang="vi" href="{{ url('/vi/' . $path) }}">
    <link rel="alternate" hreflang="en" href="{{ url('/en/' . $path) }}">
    <link rel="alternate" hreflang="x-default" href="{{ url('/') }}">


    <!-- ✅ Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/AIcontrol_imgs/small_logo.png') }}">
    @include('front.partials.ga')

    <!-- ✅ Open Graph (mạng xã hội, Zalo, Facebook, LinkedIn) -->
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
   
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome-pro.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/atropos.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/shop.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <!-- CSS here -->
    <!-- CSS here -->

</head>

<!-- class="tp-magic-cursor" data-bg-color="#fff" -->
<body>

    <!-- Begin magic cursor -->
    <div id="magic-cursor" class="cursor-bg-red-2">
        <div id="ball"></div>
    </div>
    <!-- End magic cursor -->

    <!-- preloader -->
    <div id="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- preloader end  -->

    <!-- back to top start -->
    <div class="back-to-top-wrapper">
        <button id="back_to_top" type="button" class="back-to-top-btn">
            <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
    </div>
    <!-- back to top end -->


    <!-- offcanvas start -->
    @include('front.includes.offcanvas')
    <!-- offcanvas end -->

    <!-- header area start -->
    @include('front.includes.header')
    <!-- header area end -->

    @include('front.includes.popup')






    <div id="smooth-wrapper">
        <div id="smooth-content">
            <main>
                <!-- hero area start -->
                <div class="ar-hero-area p-relative" >
                    <div class="ar-about-us-4-shape">
                        <img src="{{ asset('assets/AIcontrol_imgs/Lighting_control_solution/headinglogo.svg') }}" alt="">
                    </div>
                    <div class="container container-1230">
                        <div class="ar-about-us-4-hero-ptb">
                            <div class="row justify-content-center">
                                <div class="col-xl-12">
                                    <div class="ar-hero-title-box tp_fade_anim" data-delay=".3">
                                        <h1 class="heading-h1">
                                            {!! __('lighting.hero_content') !!}
                                        </h1>
                                        <div class="heading-h1-box d-flex justify-content-end">
                                            <span class="tp-section-subtitle pre">{{ __('lighting.hero_subtitle') }}</span>
                                            <div class="ar-about-us-4-icon pd-10">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="9" viewBox="0 0 81 9" fill="none">
                                                    <rect y="4" width="80" height="1" fill="#34679A" />
                                                    <path d="M77 7.96366L80.5 4.48183L77 1" stroke="#34679A" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <p>{!! __('lighting.hero_description') !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- hero area end -->
                <!-- banner area start -->
                <div class="ar-banner-area">
                    <div class="ar-banner-wrap ar-about-us-4">
                        <img class="w-100" src="{{ asset('assets/AIcontrol_imgs/Lighting_control_solution/Banner.png') }}" alt="giải pháp điều khiển chiếu sáng Banner" data-speed=".8">
                    </div>
                </div>
                <!-- banner area end -->

                <!-- service solution area start -->
                <section class="tp-service-4-solution-area pt-135 pb-140">
                    <div class="container container-1320">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tp-benefit-heading mb-85">
                                    <div class="ar-about-us-4-title-box tp_fade_anim d-flex align-items-center mb-15">
                                        <span class="tp-section-subtitle pre">{{ __('lighting.types_subtitle') }}</span>
                                        <div class="ar-about-us-4-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="81" height="9" viewBox="0 0 81 9" fill="none">
                                                <rect y="4" width="80" height="1" fill="#111013" />
                                                <path d="M77 7.96366L80.5 4.48183L77 1" stroke="#111013" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </div>
                                    <h2 class="tp-section-title lts tp_fade_anim">{!! __('lighting.types_title') !!}</h2>
                                </div>
                            </div>
                        </div>  
                        <div class="row tp-service-4-solution-grid">
                            <!-- lighting control solution 1 -->
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="tp-service-4-solution-item mb-30">
                                    <div class="tp-service-4-solution-item-icon">
                                        <img class="icon-gp" src="{{ asset('assets/AIcontrol_imgs/Lighting_control_solution/phuong_thuc/onoff.jpg') }}" alt="Điều khiển bật tắt">
                                    </div>
                                    <div class="tp-service-4-solution-item-content">
                                        <h3 class="tp-service-4-solution-item-title">
                                            <a class="tp-line-black">{{ __('lighting.type1_title') }}</a>
                                        </h3>
                                        <p>
                                            {{ __('lighting.type1_desc') }}
                                        </p>
                                    </div>
                                    {{-- <div class="tp-service-4-solution-item-btn">
                                        <a class="tp-line-black" href="service-details-light.html">
                                            XEM CHI TIẾT
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.41379 3.30208C5.97452 3.05821 10.6092 1.55558 14 0C12.4438 3.39014 10.9406 8.02425 10.6973 11.585L8.35796 6.59396L1.14867 13.8038C1.02249 13.9296 0.851498 14.0003 0.673273 14.0001C0.540303 14.0001 0.410328 13.9606 0.299776 13.8867C0.189224 13.8129 0.103059 13.7079 0.0521774 13.585C0.00129604 13.4622 -0.0120192 13.327 0.0139141 13.1966C0.0398474 13.0661 0.103867 12.9463 0.197876 12.8523L7.40747 5.64271L2.41379 3.30208Z" fill="#030303" />
                                                </svg>
                                            </span>
                                        </a>
                                    </div> --}}
                                </div>
                            </div>
                            <!-- end lighting control solution 1 -->
                            <!-- lighting control solution 2 -->
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="tp-service-4-solution-item mb-30">
                                    <div class="tp-service-4-solution-item-icon">
                                        <img class="icon-gp" src="{{ asset('assets/AIcontrol_imgs/Lighting_control_solution/phuong_thuc/0-10v.jpg') }}" alt="Dim 0 -10 V">
                                    </div>
                                    <div class="tp-service-4-solution-item-content">
                                        <h3 class="tp-service-4-solution-item-title">
                                            <a class="tp-line-black">{{ __('lighting.type2_title') }}</a>
                                        </h3>
                                        <p>
                                            {{ __('lighting.type2_desc') }}
                                        </p>
                                    </div>
                                    {{-- <div class="tp-service-4-solution-item-btn">
                                        <a class="tp-line-black" href="service-details-light.html">
                                            XEM CHI TIẾT
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.41379 3.30208C5.97452 3.05821 10.6092 1.55558 14 0C12.4438 3.39014 10.9406 8.02425 10.6973 11.585L8.35796 6.59396L1.14867 13.8038C1.02249 13.9296 0.851498 14.0003 0.673273 14.0001C0.540303 14.0001 0.410328 13.9606 0.299776 13.8867C0.189224 13.8129 0.103059 13.7079 0.0521774 13.585C0.00129604 13.4622 -0.0120192 13.327 0.0139141 13.1966C0.0398474 13.0661 0.103867 12.9463 0.197876 12.8523L7.40747 5.64271L2.41379 3.30208Z" fill="#030303" />
                                                </svg>
                                            </span>
                                        </a>
                                    </div> --}}
                                </div>
                            </div>
                            <!-- end lighting control solution 2 -->
                            <!-- lighting control solution 3 -->
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="tp-service-4-solution-item mb-30">
                                    <div class="tp-service-4-solution-item-icon">
                                        <img class="icon-gp" src="{{ asset('assets/AIcontrol_imgs/Lighting_control_solution/phuong_thuc/Dali2logo.svg') }}" alt="Điều kiển chiếu sáng với DALI2">
                                    </div>
                                    <div class="tp-service-4-solution-item-content">
                                        <h3 class="tp-service-4-solution-item-title">
                                            <a class="tp-line-black">{{ __('lighting.type3_title') }}</a>
                                        </h3>
                                        <p>
                                            {{ __('lighting.type3_desc') }}
                                        </p>
                                    </div>
                                    {{-- <div class="tp-service-4-solution-item-btn">
                                        <a class="tp-line-black" href="service-details-light.html">
                                            XEM CHI TIẾT
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.41379 3.30208C5.97452 3.05821 10.6092 1.55558 14 0C12.4438 3.39014 10.9406 8.02425 10.6973 11.585L8.35796 6.59396L1.14867 13.8038C1.02249 13.9296 0.851498 14.0003 0.673273 14.0001C0.540303 14.0001 0.410328 13.9606 0.299776 13.8867C0.189224 13.8129 0.103059 13.7079 0.0521774 13.585C0.00129604 13.4622 -0.0120192 13.327 0.0139141 13.1966C0.0398474 13.0661 0.103867 12.9463 0.197876 12.8523L7.40747 5.64271L2.41379 3.30208Z" fill="#030303" />
                                                </svg>
                                            </span>
                                        </a>
                                    </div> --}}
                                </div>
                            </div>
                            <!-- end lighting control solution 3 -->
                            <!-- lighting control solution 4 -->
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="tp-service-4-solution-item mb-30">
                                    <div class="tp-service-4-solution-item-icon">
                                        <img class="icon-gp" src="{{ asset('assets/AIcontrol_imgs/Lighting_control_solution/phuong_thuc/triac.jpg') }}" alt="Điều khiển Dim Triac">
                                    </div>
                                    <div class="tp-service-4-solution-item-content">
                                        <h3 class="tp-service-4-solution-item-title">
                                            <a class="tp-line-black">{{ __('lighting.type4_title') }}</a>
                                        </h3>
                                        <p>
                                            {{ __('lighting.type4_desc') }}
                                        </p>
                                    </div>
                                    {{-- <div class="tp-service-4-solution-item-btn">
                                        <a class="tp-line-black" href="service-details-light.html">
                                            XEM CHI TIẾT
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.41379 3.30208C5.97452 3.05821 10.6092 1.55558 14 0C12.4438 3.39014 10.9406 8.02425 10.6973 11.585L8.35796 6.59396L1.14867 13.8038C1.02249 13.9296 0.851498 14.0003 0.673273 14.0001C0.540303 14.0001 0.410328 13.9606 0.299776 13.8867C0.189224 13.8129 0.103059 13.7079 0.0521774 13.585C0.00129604 13.4622 -0.0120192 13.327 0.0139141 13.1966C0.0398474 13.0661 0.103867 12.9463 0.197876 12.8523L7.40747 5.64271L2.41379 3.30208Z" fill="#030303" />
                                                </svg>
                                            </span>
                                        </a>
                                    </div> --}}
                                </div>
                            </div>
                            <!-- end lighting control solution 4 -->
                            <!-- lighting control solution 5 -->
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="tp-service-4-solution-item mb-30">
                                    <div class="tp-service-4-solution-item-icon">
                                        <img class="icon-gp" src="{{ asset('assets/AIcontrol_imgs/Lighting_control_solution/phuong_thuc/dmx.jpg') }}" alt="Điều khiển chiếu sáng DMX">
                                    </div>
                                    <div class="tp-service-4-solution-item-content">
                                        <h3 class="tp-service-4-solution-item-title">
                                            <a class="tp-line-black">{{ __('lighting.type5_title') }}</a>
                                        </h3>
                                        <p>
                                            {{ __('lighting.type5_desc') }}
                                        </p>
                                    </div>
                                    {{-- <div class="tp-service-4-solution-item-btn">
                                        <a class="tp-line-black" href="service-details-light.html">
                                            XEM CHI TIẾT
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.41379 3.30208C5.97452 3.05821 10.6092 1.55558 14 0C12.4438 3.39014 10.9406 8.02425 10.6973 11.585L8.35796 6.59396L1.14867 13.8038C1.02249 13.9296 0.851498 14.0003 0.673273 14.0001C0.540303 14.0001 0.410328 13.9606 0.299776 13.8867C0.189224 13.8129 0.103059 13.7079 0.0521774 13.585C0.00129604 13.4622 -0.0120192 13.327 0.0139141 13.1966C0.0398474 13.0661 0.103867 12.9463 0.197876 12.8523L7.40747 5.64271L2.41379 3.30208Z" fill="#030303" />
                                                </svg>
                                            </span>
                                        </a>
                                    </div> --}}
                                </div>
                            </div>
                            <!-- end lighting control solution 5 -->
                            <!-- lighting control solution 6 -->
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="tp-service-4-solution-item mb-30">
                                    <div class="tp-service-4-solution-item-icon">
                                        <img class="icon-gp" src="{{ asset('assets/AIcontrol_imgs/Lighting_control_solution/phuong_thuc/SPI.jpg') }}" alt="Điều khiển chiếu sáng SPI">
                                    </div>
                                    <div class="tp-service-4-solution-item-content">
                                        <h3 class="tp-service-4-solution-item-title">
                                            <a class="tp-line-black">{{ __('lighting.type6_title') }}</a>
                                        </h3>
                                        <p>
                                            {{ __('lighting.type6_desc') }}
                                        </p>
                                    </div>
                                    {{-- <div class="tp-service-4-solution-item-btn">
                                        <a class="tp-line-black" href="service-details-light.html">
                                            XEM CHI TIẾT
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.41379 3.30208C5.97452 3.05821 10.6092 1.55558 14 0C12.4438 3.39014 10.9406 8.02425 10.6973 11.585L8.35796 6.59396L1.14867 13.8038C1.02249 13.9296 0.851498 14.0003 0.673273 14.0001C0.540303 14.0001 0.410328 13.9606 0.299776 13.8867C0.189224 13.8129 0.103059 13.7079 0.0521774 13.585C0.00129604 13.4622 -0.0120192 13.327 0.0139141 13.1966C0.0398474 13.0661 0.103867 12.9463 0.197876 12.8523L7.40747 5.64271L2.41379 3.30208Z" fill="#030303" />
                                                </svg>
                                            </span>
                                        </a>
                                    </div> --}}
                                </div>
                            </div>
                            <!-- end lighting control solution 6 -->
                        </div>
                    </div>
                </section>
                <!-- service solution area end -->


                <!-- benefit area start -->
                <section class="tp-benefit-ptb pt-100 pb-160">
                    <div class="container container-1230">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tp-benefit-heading mb-85">
                                    <div class="ar-about-us-4-title-box tp_fade_anim d-flex align-items-center mb-15">
                                        <span class="tp-section-subtitle pre">{{ __('lighting.features_subtitle') }}</span>
                                        <div class="ar-about-us-4-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="81" height="9" viewBox="0 0 81 9" fill="none">
                                                <rect y="4" width="80" height="1" fill="#111013" />
                                                <path d="M77 7.96366L80.5 4.48183L77 1" stroke="#111013" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </div>
                                    <h2 class="tp-section-title lts tp_fade_anim">{!! __('lighting.features_title') !!}</h2>
                                </div>
                            </div>
                        </div>  
                        <div class="tp-benefit-box">
                            <div class="row gx-0">
                                <div class="col-lg-3 col-md-6">
                                    <div class="tp-benefit-item tp-benefit-borber-bottom">
                                        <div class="tp-benefit-item-icon">
                                            <img src="{{ asset('assets/AIcontrol_imgs/Lighting_control_solution/icon/tinhnang/cuongdoanhsang.svg') }}" alt="Icon cường độ ánh sáng">
                                        </div>
                                        <h3 class="tp-benefit-item-title">{{ __('lighting.feature1') }}</h3>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 ">
                                    <div class="tp-benefit-item tp-benefit-borber-bottom">
                                        <div class="tp-benefit-item-icon pb-30">
                                            <img src="{{ asset('assets/AIcontrol_imgs/Lighting_control_solution/icon/tinhnang/nhietdomau.svg') }}" alt="Icon nhiệt độ màu">
                                        </div>
                                        <h4 class="tp-benefit-item-title">{{ __('lighting.feature2') }}</h4>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="tp-benefit-item tp-benefit-borber-bottom">
                                        <div class="tp-benefit-item-icon pb-30">
                                            <img src="{{ asset('assets/AIcontrol_imgs/Lighting_control_solution/icon/tinhnang/mausanc.svg') }}" alt="Icon màu sắc ánh sáng">
                                        </div>
                                        <h3 class="tp-benefit-item-title">{{ __('lighting.feature3') }}</h3>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="tp-benefit-item tp-benefit-borber-bottom">
                                        <div class="tp-benefit-item-icon pb-30">
                                            <img src="{{ asset('assets/AIcontrol_imgs/Lighting_control_solution/icon/tinhnang/daylighit.svg') }}" alt="Icon daylight harvesting">
                                        </div>
                                        <h3 class="tp-benefit-item-title">{{ __('lighting.feature4') }}</h3>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="tp-benefit-item br">
                                        <div class="tp-benefit-item-icon pb-30">
                                            <img src="{{ asset('assets/AIcontrol_imgs/Lighting_control_solution/icon/tinhnang/moving.svg') }}" alt="Icon cảm biến chuyển động">
                                        </div>
                                        <h4 class="tp-benefit-item-title">{{ __('lighting.feature5') }}</h4>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="tp-benefit-item br">
                                        <div class="tp-benefit-item-icon pb-30">
                                            <img src="{{ asset('assets/AIcontrol_imgs/Lighting_control_solution/icon/tinhnang/laplich.svg') }}" alt="Icon lặp lịch">
                                        </div>
                                        <h3 class="tp-benefit-item-title">{{ __('lighting.feature6') }}</h3>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="tp-benefit-item br">
                                        <div class="tp-benefit-item-icon pb-30">
                                            <img src="{{ asset('assets/AIcontrol_imgs/Lighting_control_solution/icon/tinhnang/scence.svg') }}" alt="Icon scence">
                                        </div>
                                        <h3 class="tp-benefit-item-title">{{ __('lighting.feature7') }}</h3>
                                            
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="tp-benefit-item">
                                        <div class="tp-benefit-item-icon pb-30">
                                            <img src="{{ asset('assets/AIcontrol_imgs/Lighting_control_solution/icon/tinhnang/daphuongthuc.svg') }}" alt="Icon đa phương thức">
                                        </div>
                                        <h3 class="tp-benefit-item-title">{{ __('lighting.feature8') }}</h3>
                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- benefit area end -->

                <!-- project slider area start -->
                
                <div class="slider pt-50 pb-120 ">
                    <div class="container container-1230">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tp-benefit-heading mb-85">
                                    <div class="ar-about-us-4-title-box tp_fade_anim d-flex align-items-center mb-15">
                                        <span class="tp-section-subtitle pre">{{ __('lighting.compatible_subtitle') }}</span>
                                        <div class="ar-about-us-4-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="81" height="9" viewBox="0 0 81 9" fill="none">
                                                <rect y="4" width="80" height="1" fill="#111013" />
                                                <path d="M77 7.96366L80.5 4.48183L77 1" stroke="#111013" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </div>
                                    <h2 class="tp-section-title lts tp_fade_anim">{!! __('lighting.compatible_title') !!}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tp-slider-elegant-area pt-50 pb-120">
                        <div class="tp-slider-elegant-wrapper">
                            <div class="tp-slider-elegant-inner-wrap">
                                <div class="tp-slider-elegant-item">
                                    <div class="tp-slider-elegant-thumb not-hide-cursor" data-cursor="View<br>Demo">
                                        <a class="cursor-hide">
                                            <img src="{{ asset('assets/AIcontrol_imgs/onoff.jpg') }}" alt="hình minh họa bật tắt">
                                        </a>
                                    </div>
                                    <div class="tp-slider-elegant-content">
                                        <h3 class="tp-slider-elegant-title">
                                            <p>{{ __('lighting.light_type1') }}</p>
                                        </h3>
                                    </div>
                                </div>
                                <div class="tp-slider-elegant-item">
                                    <div class="tp-slider-elegant-thumb not-hide-cursor" data-cursor="View<br>Demo">
                                        <a class="cursor-hide">
                                            <img src="{{ asset('assets/AIcontrol_imgs/Lighting_control_solution/turnablewhite1.jpg') }}" alt="hình minh họa turnable white">
                                        </a>
                                    </div>
                                    <div class="tp-slider-elegant-content">
                                        <h3 class="tp-slider-elegant-title">
                                            <p>{{ __('lighting.light_type2') }}</p>
                                        </h3>
                                    </div>
                                </div>
                                <div class="tp-slider-elegant-item">
                                    <div class="tp-slider-elegant-thumb not-hide-cursor" data-cursor="View<br>Demo">
                                        <a class="cursor-hide">
                                            <img src="{{ asset('assets/AIcontrol_imgs/Lighting_control_solution/DIMMING-Picsart-AiImageEnhancer.jpg') }}" alt="hình minh họa dimming">
                                        </a>
                                    </div>
                                    <div class="tp-slider-elegant-content">
                                        <h3 class="tp-slider-elegant-title">
                                            <p>{{ __('lighting.light_type3') }}</p>
                                        </h3>
                                    </div>
                                </div>
                                <div class="tp-slider-elegant-item">
                                    <div class="tp-slider-elegant-thumb not-hide-cursor" data-cursor="View<br>Demo">
                                        <a class="cursor-hide">
                                            <img src="{{ asset('assets/AIcontrol_imgs/Lighting_control_solution/RGBRGBW.jpg') }}" alt="hình minh họa RGB & RGBW">
                                        </a>
                                    </div>
                                    <div class="tp-slider-elegant-content">
                                        <h3 class="tp-slider-elegant-title">
                                            <p>{{ __('lighting.light_type4') }}</p>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- project slider area end -->


                <!-- funfact area start -->
                <div class="tp-funfact-area">
                    <div class="container container-1230">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tp-benefit-heading mb-85">
                                    <div class="ar-about-us-4-title-box tp_fade_anim d-flex align-items-center mb-15">
                                        <span class="tp-section-subtitle pre">{{ __('lighting.case_subtitle') }}</span>
                                        <div class="ar-about-us-4-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="81" height="9" viewBox="0 0 81 9" fill="none">
                                                <rect y="4" width="80" height="1" fill="#111013" />
                                                <path d="M77 7.96366L80.5 4.48183L77 1" stroke="#111013" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </div>
                                    <h2 class="tp-section-title lts tp_fade_anim">{!! __('lighting.case_title') !!}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tp-funfact-panel-wrap">
                        <!-- case study 1 start -->
                        <div class="tp-funfact-panel">
                            <div class="row g-0 align-items-center">
                                <!-- Image first -->
                                <div class="col-12 col-md-8">
                                    <img src="{{ asset('assets/AIcontrol_imgs/Lighting_control_solution/caseStudy/off.jpg') }}" alt="Điều khiển chiếu sáng cho văn phòng" class="img-fluid w-100 h-100 object-fit-cover">
                                </div>
                                <!-- Text second -->
                                <div class="col-12 col-md-4 tp-funfact-panel-content">
                                    <h3 class="tp-funfact-panel-number">01</h3>
                                    <h4 class="tp-funfact-panel-title">{{ __('lighting.case1_title') }}</h4>
                                    <p class="tp-funfact-panel-description">
                                        {{ __('lighting.case1_desc') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- case study 1 end -->
                        <!-- case study 2 start  -->
                        <div class="tp-funfact-panel">
                            <div class="row g-0 align-items-center">
                                <!-- Image first -->
                                <div class="col-12 col-md-8">
                                    <img src="{{ asset('assets/AIcontrol_imgs/Lighting_control_solution/caseStudy/rest.jpg') }}" alt="Điều khiển chiếu sáng cho nhà hàng & khách sạn" class="img-fluid w-100 h-100 object-fit-cover">
                                </div>
                                <!-- Text second -->
                                <div class="col-12 col-md-4 tp-funfact-panel-content">
                                    <h3 class="tp-funfact-panel-number">02</h3>
                                    <h4 class="tp-funfact-panel-title">{{ __('lighting.case2_title') }}</h4>
                                    <p class="tp-funfact-panel-description">
                                        {{ __('lighting.case2_desc') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- case study 2 end  -->
                        <!-- case study 3 start  -->
                        <div class="tp-funfact-panel">
                            <div class="row g-0 align-items-center">
                                <!-- Image first -->
                                <div class="col-12 col-md-8">
                                    <img src="{{ asset('assets/AIcontrol_imgs/Lighting_control_solution/caseStudy/comerc.jpeg') }}" alt="Điều khiển chiếu sáng cho bệnh viện & trung tâm thương mại" class="img-fluid w-100 h-100 object-fit-cover">
                                </div>
                                <!-- Text second -->
                                <div class="col-12 col-md-4 tp-funfact-panel-content">
                                    <h3 class="tp-funfact-panel-number">03</h3>
                                    <h4 class="tp-funfact-panel-title">{{ __('lighting.case3_title') }}</h4>
                                    <p class="tp-funfact-panel-description">
                                        {{ __('lighting.case3_desc') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- case study 3 end  -->
                        <!-- case study 4 start  -->
                        <div class="tp-funfact-panel">
                            <div class="row g-0 align-items-center">
                                <!-- Image first -->
                                <div class="col-12 col-md-8">
                                    <img src="{{ asset('assets/AIcontrol_imgs/Lighting_control_solution/caseStudy/industry.jpg') }}" alt="ĐIều khiển chếu sáng cho nhà xưởng" class="img-fluid w-100 h-100 object-fit-cover">
                                </div>
                                <!-- Text second -->
                                <div class="col-12 col-md-4 tp-funfact-panel-content">
                                    <h3 class="tp-funfact-panel-number">04</h3>
                                    <h4 class="tp-funfact-panel-title">{{ __('lighting.case4_title') }}</h4>
                                    <p class="tp-funfact-panel-description">
                                        {{ __('lighting.case4_desc') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- case study 4 end  -->
                    </div>
                </div>
                <!-- funfact area end -->

                <!-- work area start -->
                <div class="tp-work-area pt-120 pb-145 tp-panel-pin-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 container-1230">
                                <div class="tp-work-title-box tp-panel-pin">
                                     <h2 class="tp-section-title lts tp_fade_anim">{!! __('lighting.benefits_title') !!}</h2>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="tp-work-wrapper">
                                    <div class="tp-work-item tp-panel-pin mb-15">
                                        <div class="tp-work-number p-relative">
                                            <span></span>
                                            <i>01</i>
                                        </div>
                                        <div class="tp-work-content">
                                            <h3 class="tp-work-title">{{ __('lighting.benefit1_title') }}</h3>
                                            <p>{{ __('lighting.benefit1_desc') }}</p>
                                        </div>
                                    </div>
                                    <div class="tp-work-item tp-panel-pin mb-15">
                                        <div class="tp-work-number p-relative">
                                            <span></span>
                                            <i>02</i>
                                        </div>
                                        <div class="tp-work-content">
                                            <h3 class="tp-work-title">{{ __('lighting.benefit2_title') }}</h3>
                                            <p>{{ __('lighting.benefit2_desc') }}</p>
                                        </div>
                                    </div>
                                    <div class="tp-work-item tp-panel-pin mb-15">
                                        <div class="tp-work-number p-relative">
                                            <span></span>
                                            <i>03</i>
                                        </div>
                                        <div class="tp-work-content">
                                            <h3 class="tp-work-title">{{ __('lighting.benefit3_title') }}</h3>
                                            <p>{{ __('lighting.benefit3_desc') }}</p>
                                        </div>
                                    </div>
                                    <div class="tp-work-item tp-panel-pin mb-15">
                                        <div class="tp-work-number p-relative">
                                            <span></span>
                                            <i>04</i>
                                        </div>
                                        <div class="tp-work-content">
                                            <h3 class="tp-work-title">{{ __('lighting.benefit4_title') }}</h3>
                                            <p>{{ __('lighting.benefit4_desc') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- work area end -->

                <!-- brand area start -->
                <div class="ar-brand-area mb-160">
                    <div class="ar-brand-bg">
                        <div class="swiper-container ar-brand-active">
                            <div class="swiper-wrapper slide-transtion">
                                <div class="swiper-slide">
                                    <div class="ar-brand-item">
                                        <img src="{{ asset('assets/AIcontrol_imgs/brandslogo/airzone.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="ar-brand-item">
                                        <img src="{{ asset('assets/AIcontrol_imgs/brandslogo/atios.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="ar-brand-item">
                                        <img src="{{ asset('assets/AIcontrol_imgs/brandslogo/casambi.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="ar-brand-item">
                                        <img src="{{ asset('assets/AIcontrol_imgs/brandslogo/danlers.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="ar-brand-item">
                                        <img src="{{ asset('assets/AIcontrol_imgs/brandslogo/intesis.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="ar-brand-item">
                                        <img src="{{ asset('assets/AIcontrol_imgs/brandslogo/kanonbus.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="ar-brand-item">
                                        <img src="{{ asset('assets/AIcontrol_imgs/brandslogo/remotec.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="ar-brand-item">
                                        <img src="{{ asset('assets/AIcontrol_imgs/brandslogo/uitiot.png') }}" alt="">
                                    </div>  
                                </div>
                                <div class="swiper-slide">
                                    <div class="ar-brand-item">
                                        <img src="{{ asset('assets/AIcontrol_imgs/brandslogo/steinel.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="ar-brand-item">
                                        <img src="{{ asset('assets/AIcontrol_imgs/brandslogo/remotec.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- brand area end -->

                <!-- contact-cta area start -->
                 
                <!-- blog area start -->
                <div class="ar-blog-area pb-100 pt-120">
                    <div class="container container-1430">
                        <div class="ar-blog-title-wrap ar-title-mlr mb-60">
                            <div class="row align-items-end">
                                <div class="col-xl-8 col-lg-8 col-md-7">
                                    <div class="ar-blog-title-box">
                                        <h3 class="tp-section-title-clash-600 fs-60 mb-0 tp_fade_anim" data-delay=".4">{{ __('lighting.blog_title') }}</h3>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-5">
                                    <div class="ar-blog-btn-box d-flex justify-content-md-end justify-content-start mb-15">
                                        <div class="tp-btn-red-circle-box tp_fade_anim" data-delay=".5" data-fade-from="top" data-ease="bounce">
                                            <a class="tp-btn-red-circle-icon" href="{{ url(current_locale().'/blog') }}">
                                                <span>
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 11L11 1M11 1H1M11 1V11" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                            </a>
                                            <a class="tp-btn-red-circle-text" href="{{ url(current_locale().'/blog') }}">{{ __('lighting.blog_view_all') }}</a>
                                            <a class="tp-btn-red-circle-icon" href="{{ url(current_locale().'/blog') }}">
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
                            @forelse(($lightingControlBlog ?? collect()) as $index => $blog)
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
                                            <a href="{{ url(current_locale().'/blog/'.$blog->slug) }}"><img class="w-100" src="{{ $cover }}" alt="{{ $blog->title }}"></a>
                                            <a class="ar-blog-category" href="{{ $categoryUrl }}">{{ $primaryCategory }}</a>
                                        </div>
                                        <div class="ar-blog-content">
                                            <h3 class="ar-blog-title-sm"><a class="tp-line-black" href="{{ url(current_locale().'/blog/'.$blog->slug) }}">{{ \Illuminate\Support\Str::limit($blog->title, 70) }}</a></h3>
                                            @if($publishedDate)
                                                <span class="ar-blog-meta">{{ $publishedDate }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <p class="text-center text-muted">{{ __('lighting.blog_no_posts') }}</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <!-- blog area end -->

            </main>

            <!-- footer area start -->
            @include('front.includes.footer')
            <!-- footer area end -->

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




    <!-- JS here -->

    <!-- JS here -->

</body>

</html>