<!doctype html>
<html class="no-js" lang="{{ current_locale() }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <base href="{{ url('/') }}/">
    <title>{{ __('shade.meta_title') }}</title>
    <meta name="description" content="{{ __('shade.meta_description') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ✅ Từ khóa (SEO Keywords) -->
    <meta name="keywords" content="{{ __('shade.meta_keywords') }}">


    <!-- ✅ Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- ✅ Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/AIcontrol_imgs/small_logo.png') }}">

    <!-- ✅ Open Graph (mạng xã hội, Zalo, Facebook, LinkedIn) -->
    <meta property="og:title" content="{{ __('shade.og_title') }}">
    <meta property="og:description" content="{{ __('shade.og_description') }}">
    <meta property="og:image" content="https://www.aicontrol.vn/assets/img/og/aicontrol-curtain.jpg">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- ✅ Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ __('shade.og_title') }}">
    <meta name="twitter:description" content="{{ __('shade.og_description') }}">
    <meta name="twitter:image" content="https://www.aicontrol.vn/assets/img/og/aicontrol-curtain.jpg">


    <!-- CSS here -->
    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome-pro.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/spacing.css') }}">
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

    <!-- offcanvas start -->
    @include('front.includes.offcanvas')
    <!-- offcanvas end -->

    <!-- header area start -->
    @include('front.includes.header')
    <!-- header area end -->

    <div id="smooth-wrapper">
        <div id="smooth-content">
            <main>
                <!-- hero area start -->
                <div class="ar-hero-area p-relative" data-background="assets/img/about-us/about-us-4/about-us-4-bg.png">
                    <div class="ar-about-us-4-shape">
                        <img src="{{ asset('assets/AIcontrol_imgs/Lighting_control_solution/headinglogo.svg') }}" alt="">
                    </div>
                    <div class="container container-1230">
                        <div class="ar-about-us-4-hero-ptb">
                            <div class="row justify-content-center">
                                <div class="col-xl-12">
                                    <div class="ar-hero-title-box tp_fade_anim" data-delay=".3">
                                        <h1 class="heading-h1">
                                            {!! __('shade.hero_content') !!}
                                        </h1>
                                        <div class="heading-h1-box d-flex justify-content-end">
                                            <!-- <span class="tp-section-subtitle pre">Mang Lại Cho Bạn Sự</span> -->
                                            <div class="ar-about-us-4-icon pd-10">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="9" viewBox="0 0 81 9" fill="none">
                                                    <rect y="4" width="80" height="1" fill="#34679A" />
                                                    <path d="M77 7.96366L80.5 4.48183L77 1" stroke="#34679A" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <p>{!! __('shade.hero_description') !!}</p>
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
                        <img class="w-100" src="{{ asset('assets/AIcontrol_imgs/Automatic_blind_solutions/imgs/Shade_banner.png') }}" alt="Rèm cửa thông minh" data-speed=".8">
                    </div>
                </div>
                <!-- banner area end -->

                <!-- service solution area start -->
                <section class="tp-service-4-solution-area pt-100 pb-140">
                    <div class="container container-1320">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tp-benefit-heading mb-85">
                                    <div class="ar-about-us-4-title-box tp_fade_anim d-flex align-items-center mb-15">
                                        <span class="tp-section-subtitle pre">{{ __('shade.types_subtitle') }}</span>
                                        <div class="ar-about-us-4-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="81" height="9" viewBox="0 0 81 9" fill="none">
                                                <rect y="4" width="80" height="1" fill="#111013" />
                                                <path d="M77 7.96366L80.5 4.48183L77 1" stroke="#111013" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </div>
                                    <h2 class="tp-section-title lts tp_fade_anim">{!! __('shade.types_title') !!}</h2>
                                </div>
                            </div>
                        </div>  
                        <div class="row g-4 tp-service-4-solution-grid">
                                    <!-- Card 1 -->
                                    <div class="col-md-6">
                                        <div class="card custom-card border-0 shadow-sm h-100 position-relative">
                                            <h4 class="bg-number">01</h4>
                                            <div class="card-body position-relative p-5">
                                            <h3 class="fw-bold mb-2">{{ __('shade.type1_title') }}</h3>
                                            <p class="text-muted mb-4">
                                                {{ __('shade.type1_desc') }}
                                            </p>
                                            <hr>
                                            {{-- <div class="tp-service-4-solution-item-btn">
                                                <a class="tp-line-black text-decoration-none" href="service-details-light.html">
                                                XEM CHI TIẾT
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.41379 3.30208C5.97452 3.05821 10.6092 1.55558 14 0C12.4438 3.39014 10.9406 8.02425 10.6973 11.585L8.35796 6.59396L1.14867 13.8038C1.02249 13.9296 0.851498 14.0003 0.673273 14.0001C0.540303 14.0001 0.410328 13.9606 0.299776 13.8867C0.189224 13.8129 0.103059 13.7079 0.0521774 13.585C0.00129604 13.4622 -0.0120192 13.327 0.0139141 13.1966C0.0398474 13.0661 0.103867 12.9463 0.197876 12.8523L7.40747 5.64271L2.41379 3.30208Z" fill="#030303"/>
                                                    </svg>
                                                </span>
                                                </a>
                                            </div> --}}
                                            </div>
                                            <div class="card-img">
                                            <img src="{{ asset('assets/AIcontrol_imgs/Automatic_blind_solutions/imgs/horizontalShde.jpg') }}" class="img-fluid" alt="rèm đóng mở Ngang">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Card 2 -->
                                    <div class="col-md-6">
                                        <div class="card custom-card border-0 shadow-sm h-100 position-relative">
                                            <h4 class="bg-number">02</h4>
                                            <div class="card-body position-relative p-5">
                                            <h3 class="fw-bold mb-2">{{ __('shade.type2_title') }}</h3>
                                            <p class="text-muted mb-4">
                                                {{ __('shade.type2_desc') }}
                                            </p>
                                            <hr>
                                            {{-- <div class="tp-service-4-solution-item-btn">
                                                <a class="tp-line-black text-decoration-none" href="service-details-light.html">
                                                XEM CHI TIẾT
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.41379 3.30208C5.97452 3.05821 10.6092 1.55558 14 0C12.4438 3.39014 10.9406 8.02425 10.6973 11.585L8.35796 6.59396L1.14867 13.8038C1.02249 13.9296 0.851498 14.0003 0.673273 14.0001C0.540303 14.0001 0.410328 13.9606 0.299776 13.8867C0.189224 13.8129 0.103059 13.7079 0.0521774 13.585C0.00129604 13.4622 -0.0120192 13.327 0.0139141 13.1966C0.0398474 13.0661 0.103867 12.9463 0.197876 12.8523L7.40747 5.64271L2.41379 3.30208Z" fill="#030303"/>
                                                    </svg>
                                                </span>
                                                </a>
                                            </div> --}}
                                            </div>
                                            <div class="card-img">
                                            <img src="{{ asset('assets/AIcontrol_imgs/Automatic_blind_solutions/imgs/verticalShade.jpg') }}" class="img-fluid" alt="rèm đóng mở dọc">
                                            </div>
                                        </div>
                                    </div>
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
                                        <span class="tp-section-subtitle pre">{{ __('shade.features_subtitle') }}</span>
                                        <div class="ar-about-us-4-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="81" height="9" viewBox="0 0 81 9" fill="none">
                                                <rect y="4" width="80" height="1" fill="#111013" />
                                                <path d="M77 7.96366L80.5 4.48183L77 1" stroke="#111013" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </div>
                                    <h2 class="tp-section-title lts tp_fade_anim">{!! __('shade.features_title') !!}</h2>
                                </div>
                            </div>
                        </div>  
                        <div class="tp-benefit-box">
                            <div class="row gx-0">
                                <div class="col-lg-3 col-md-6">
                                    <div class="tp-benefit-item tp-benefit-borber-bottom">
                                        <div class="tp-benefit-item-icon">
                                            <img src="{{ asset('assets/AIcontrol_imgs/Automatic_blind_solutions/icons/blind_icon1.svg') }}" alt="Icon cường độ ánh sáng">
                                        </div>
                                        <h3 class="tp-benefit-item-title">{{ __('shade.feature1') }}</h3>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 ">
                                    <div class="tp-benefit-item tp-benefit-borber-bottom">
                                        <div class="tp-benefit-item-icon pb-30">
                                            <img src="{{ asset('assets/AIcontrol_imgs/Automatic_blind_solutions/icons/blind_icon2.svg') }}" alt="Icon nhiệt độ màu">
                                        </div>
                                        <h3 class="tp-benefit-item-title">{{ __('shade.feature2') }}</h3>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="tp-benefit-item tp-benefit-borber-bottom">
                                        <div class="tp-benefit-item-icon pb-30">
                                            <img src="{{ asset('assets/AIcontrol_imgs/Automatic_blind_solutions/icons/blind_icon3.svg') }}" alt="Icon màu sắc ánh sáng">
                                        </div>
                                        <h3 class="tp-benefit-item-title">{{ __('shade.feature3') }}</h3>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="tp-benefit-item tp-benefit-borber-bottom">
                                        <div class="tp-benefit-item-icon pb-30">
                                            <img src="{{ asset('assets/AIcontrol_imgs/Automatic_blind_solutions/icons/blind_icon4.svg') }}" alt="Icon màu sắc ánh sáng">
                                        </div>
                                        <h3 class="tp-benefit-item-title">{{ __('shade.feature4') }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- benefit area end -->

                <!-- funfact area start -->
            


                <div class="tp-pd-3-portfolio-area pt-50 pb-60">
                    <div class="container container-1200">
                        <div class="container container-1230">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="tp-benefit-heading mb-85">
                                        <div class="ar-about-us-4-title-box tp_fade_anim d-flex align-items-center mb-15">
                                            <span class="tp-section-subtitle pre">{{ __('shade.compatibility_subtitle') }}</span>
                                            <div class="ar-about-us-4-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="81" height="9" viewBox="0 0 81 9" fill="none">
                                                    <rect y="4" width="80" height="1" fill="#111013" />
                                                    <path d="M77 7.96366L80.5 4.48183L77 1" stroke="#111013" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                        </div>
                                        <h2 class="tp-section-title lts tp_fade_anim">
                                            {!! __('shade.compatibility_title') !!}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tp-pd-3-portfolio-item-wrap">
                                <div class="tp-pd-3-portfolio-item mb-120">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="tp-pd-3-portfolio-thumb">
                                                <img src="{{ asset('assets/AIcontrol_imgs/Automatic_blind_solutions/imgs/blind_casestudy2.jpg') }}" alt="{{ __('shade.item1_title') }}" class="w-100">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="tp-pd-3-portfolio-content tp-pd-3-content-pin mt-20 ml-40">
                                                <span class="tp-pd-3-subtitle">01</span>
                                                <h4 class="tp-pd-3-title">{{ __('shade.item1_title') }}</h4>
                                                <div class="tp-pd-3-overview-text">
                                                    <p>{!! __('shade.item1_desc') !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tp-pd-3-portfolio-item-wrap pt-120">
                                <div class="tp-pd-3-portfolio-item mb-120">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="tp-pd-3-portfolio-content tp-pd-3-content-pin mt-20 mr-40">
                                                <span class="tp-pd-3-subtitle">02</span>
                                                <h4 class="tp-pd-3-title">{{ __('shade.item2_title') }}</h4>
                                                <div class="tp-pd-3-overview-text">
                                                    <p>{!! __('shade.item2_desc') !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="tp-pd-3-portfolio-thumb">
                                                <img class="w-100" src="{{ asset('assets/AIcontrol_imgs/Automatic_blind_solutions/imgs/blind_casestudy1.jpg') }}" alt="{{ __('shade.item2_title') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- work area start -->
                <div class="tp-work-area pt-120 pb-145 tp-panel-pin-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 container-1230">
                                <div class="tp-work-title-box tp-panel-pin">
                                     <h2 class="tp-section-title lts tp_fade_anim">{!! __('shade.benefits_title') !!}</h2>
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
                                            <h3 class="tp-work-title">{{ __('shade.benefit1_title') }}</h3>
                                            <p>{{ __('shade.benefit1_desc') }}</p>
                                        </div>
                                    </div>
                                    <div class="tp-work-item tp-panel-pin mb-15">
                                        <div class="tp-work-number p-relative">
                                            <span></span>
                                            <i>02</i>
                                        </div>
                                        <div class="tp-work-content">
                                            <h3 class="tp-work-title">{{ __('shade.benefit2_title') }}</h3>
                                            <p>{{ __('shade.benefit2_desc') }}</p>
                                        </div>
                                    </div>
                                    <div class="tp-work-item tp-panel-pin mb-15">
                                        <div class="tp-work-number p-relative">
                                            <span></span>
                                            <i>03</i>
                                        </div>
                                        <div class="tp-work-content">
                                            <h3 class="tp-work-title">{{ __('shade.benefit3_title') }}</h3>
                                            <p>{{ __('shade.benefit3_desc') }}</p>
                                        </div>
                                    </div>
                                    <div class="tp-work-item tp-panel-pin mb-15">
                                        <div class="tp-work-number p-relative">
                                            <span></span>
                                            <i>04</i>
                                        </div>
                                        <div class="tp-work-content">
                                            <h3 class="tp-work-title">{{ __('shade.benefit4_title') }}</h3>
                                            <p>{{ __('shade.benefit4_desc') }}</p>
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
                    <div class="ar-brand-bg" data-background="assets/img/home-08/hero/hero-bg-shape.png">
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
                                        <h3 class="tp-section-title-clash-600 fs-60 mb-0 tp_fade_anim" data-delay=".4">{{ __('shade.blog_title') }}</h3>
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
                                            <a class="tp-btn-red-circle-text" href="{{ route(current_locale() . '.blog.index') }}">{{ __('shade.blog_view_all') }}</a>
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
                            @forelse(($AutoShadeBlogs ?? collect()) as $index => $blog)
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
                                    <p class="text-center text-muted">Hiện chưa có bài viết nào trong danh mục này.</p>
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
<script src="{{ asset('assets/js/slider-active.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
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