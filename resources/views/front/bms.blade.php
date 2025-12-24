<!doctype html>
<html class="no-js" lang="{{ current_locale() }}"> 

<head>

<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ __('bms.seo_title') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ __('bms.seo_description') }}">
    <meta name="keywords" content="{{ __('bms.seo_keywords') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/AIcontrol_imgs/small_logo.png') }}">
    
    @php
    $path = request()->path();
    $path = preg_replace('#^(vi|en)(/)?#', '', $path);
    @endphp
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="alternate" hreflang="vi" href="{{ url('/vi/' . $path) }}">
    <link rel="alternate" hreflang="en" href="{{ url('/en/' . $path) }}">
    <link rel="alternate" hreflang="x-default" href="{{ url('/vi/' . $path) }}">

    
     <!-- Open Graph for Facebook -->
    <!-- Open Graph (Facebook, Zalo, etc.) -->
    <meta property="og:title" content="{{ __('bms.og_title') }}">
    <meta property="og:description" content="{{ __('bms.og_description') }}">
    <meta property="og:image" content="{{ url(asset('assets/AIcontrol_imgs/ai_control_logo.png')) }}">

    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="{{ __('bms.og_image_alt') }}">
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
    {{-- <div id="magic-cursor">
        <div id="ball"></div>
    </div> --}}
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
        <div id="smooth-content" class="">
            <main>
                <!-- hero area start -->
                <div class="dgm-hero-top pt-20 body-padding">
                    <div class="dgm-hero-ptb grey-bg-2 fix z-index-1 p-relative">
                        <div class="dgm-hero-bg" data-background="{{ asset('assets/img/home-03/hero/hero-bg-shape.png') }}"></div>
                        
                        <div class="dgm-hero-rotate-text">
                            <span>{{ __('bms.hero_rotate') }}</span>
                        </div>

                        <div class="container container-1430">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="dgm-hero-content mb-120">
                                        <span class="dgm-hero-subtitle tp_fade_anim" data-delay=".3">{{ __('bms.hero_subtitle') }}</span>
                                        
                                        <h1 class="dgm-hero-title tp_fade_anim" data-delay=".5">
                                            {!! __('bms.hero_title') !!}
                                        </h1>

                                        <div class="tp_fade_anim" data-delay=".7">
                                            <a class="tp-btn-black-square">
                                                <span>
                                                    <span class="text-1">{{ __('bms.btn_consult') }}</span>
                                                    <span class="text-2">{{ __('bms.btn_consult') }}</span>
                                                </span>
                                                <i>
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 11L11 1" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M1 1H11V11" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 11L11 1" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M1 1H11V11" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </i>
                                            </a>
                                        </div>
                                    </div>
                                    
                                    <div class="dgm-hero-funfact-wrap">
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6">
                                                <div class="dgm-hero-funfact tp_fade_anim mb-40" data-delay=".7" data-fade-from="top" data-ease="bounce">
                                                    <span><i data-purecounter-duration="1" data-purecounter-end="30" class="purecounter">0</i>%</span>
                                                    <p>{!! __('bms.funfact_energy') !!}</p>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6">
                                                <div class="dgm-hero-funfact tp_fade_anim mb-40" data-delay=".9" data-fade-from="top" data-ease="bounce">
                                                    <span><i data-purecounter-duration="1" data-purecounter-end="100" class="purecounter">0</i>+</span>
                                                    <p>{!! __('bms.funfact_projects') !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="dgm-hero-thumb anim-zoomin-wrap">
                            <div class="anim-zoomin">
                                <img src="{{ asset('assets/AIcontrol_imgs/bms/banner.jpg') }}" alt="">
                            </div>
                            <div class="dgm-hero-text-box" data-background="{{ asset('assets/img/home-03/hero/hero-text-shape.png') }}">
                                <p>{{ __('bms.hero_box_text') }}</p>
                                <a class="dgm-hero-arrow" >
                                    <span>
                                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.23804 17.2178L18.2428 8.11173" stroke="#141414" stroke-width="2" stroke-miterlimit="10" />
                                            <path d="M8.62744 5.00098C11.1637 8.6231 16.1444 9.50353 19.7634 6.96947" stroke="#141414" stroke-width="2" stroke-miterlimit="10" />
                                            <path d="M19.7642 6.96914C16.1452 9.5032 15.2691 14.4847 17.8053 18.1068" stroke="#141414" stroke-width="2" stroke-miterlimit="10" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- hero area end -->

                <!-- about area start -->
                <div class="dgm-about-area pt-120 pb-120">
                    <div class="container container-1230">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="dgm-about-thumb-wrap p-relative">
                                    <img class="tp_fade_anim" data-delay=".3" data-fade-from="left" src="{{ asset('assets/AIcontrol_imgs/bms/lutron.jpg') }}" alt="BMS Solution">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="dgm-about-right">
                                    <div class="dgm-about-title-box z-index-1 mb-35">
                                        <span class="tp-section-subtitle subtitle-black mb-15 tp_fade_anim" data-delay=".3">{{ __('bms.about_subtitle') }}</span>
                                        
                                        <h4 class="tp-section-title-grotesk tp_fade_anim" data-delay=".5">
                                            {!! __('bms.about_title') !!}
                                        </h4>
                                    </div>
                                    
                                    <div class="dgm-about-content">
                                        <div class="tp_fade_anim" data-delay=".3">
                                            <p>
                                                {!! __('bms.about_description') !!}
                                            </p>
                                        </div>
                                        
                                        <div class="dgm-about-review-wrap tp_fade_anim" data-delay=".6">
                                            <div class="dgm-about-review-box d-inline-flex align-items-center">
                                                <div class="dgm-about-review">
                                                    <h4>4.9</h4>
                                                    <span>{{ __('bms.about_projects_count') }}</span>
                                                </div>
                                                <div class="dgm-about-ratting">
                                                    <h4>{{ __('bms.about_rating_label') }}</h4>
                                                    <div class="dgm-about-ratting-icon">
                                                        <span><svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.99993 0L8.98311 4.27038L13.6573 4.83688L10.2088 8.04262L11.1144 12.6631L6.99993 10.374L2.88543 12.6631L3.79106 8.04262L0.342529 4.83688L5.01674 4.27038L6.99993 0Z" fill="currentcolor" /></svg></span>
                                                        <span><svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.99993 0L8.98311 4.27038L13.6573 4.83688L10.2088 8.04262L11.1144 12.6631L6.99993 10.374L2.88543 12.6631L3.79106 8.04262L0.342529 4.83688L5.01674 4.27038L6.99993 0Z" fill="currentcolor" /></svg></span>
                                                        <span><svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.99993 0L8.98311 4.27038L13.6573 4.83688L10.2088 8.04262L11.1144 12.6631L6.99993 10.374L2.88543 12.6631L3.79106 8.04262L0.342529 4.83688L5.01674 4.27038L6.99993 0Z" fill="currentcolor" /></svg></span>
                                                        <span><svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.99993 0L8.98311 4.27038L13.6573 4.83688L10.2088 8.04262L11.1144 12.6631L6.99993 10.374L2.88543 12.6631L3.79106 8.04262L0.342529 4.83688L5.01674 4.27038L6.99993 0Z" fill="currentcolor" /></svg></span>
                                                        <span><svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.99993 0L8.98311 4.27038L13.6573 4.83688L10.2088 8.04262L11.1144 12.6631L6.99993 10.374L2.88543 12.6631L3.79106 8.04262L0.342529 4.83688L5.01674 4.27038L6.99993 0Z" fill="currentcolor" /></svg></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- about area end -->

                <!-- step area start -->
                <div class="dgm-step-area pb-50 body-padding">
                    <div class="container container-1230">
                        <div class="row align-items-end">
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="dgm-step-item p-relative dgm-step-space-1 mb-80">
                                    <h4 class="dgm-step-title mb-25 pb-70">{!! __('bms.process_title') !!}</h4>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="dgm-step-item p-relative dgm-step-space-2 mb-80">
                                    <span class="dgm-step-number">01</span>
                                    <h4 class="dgm-step-title-sm">{{ __('bms.step1_title') }}</h4>
                                    <p>
                                        {{ __('bms.step1_desc') }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="dgm-step-item p-relative dgm-step-space-3 mb-80">
                                    <span class="dgm-step-number">02</span>
                                    <h4 class="dgm-step-title-sm">{{ __('bms.step2_title') }}</h4>
                                    <p>
                                        {{ __('bms.step2_desc') }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="dgm-step-item p-relative dgm-step-space-4 mb-80">
                                    <span class="dgm-step-number">03</span>
                                    <h4 class="dgm-step-title-sm">{{ __('bms.step3_title') }}</h4>
                                    <p>
                                        {{ __('bms.step3_desc') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- step area end -->

                <!-- service area end -->
                <div class="dgm-service-area dgm-service-radius pt-120 black-bg-5 z-index-1">
                    <div class="container container-1230">
                        <div class="row">
                            <div class="col-xl-7">
                                <div class="dgm-service-title-box z-index-1 mb-60">
                                    <span class="tp-section-subtitle subtitle-grey mb-15 text-white tp_fade_anim" data-delay=".3">{{ __('bms.features_subtitle') }}</span>
                                    <h4 class="tp-section-title-grotesk text-white tp_fade_anim" data-delay=".5">
                                        {!! __('bms.features_title') !!}
                                        <span class="p-relative">
                                            <span class="tp-section-title-shape">
                                                <svg width="231" height="15" viewBox="0 0 231 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M130.373 0.9726C126.192 1.17422 109.977 1.57746 94.4246 1.87989C53.7849 2.63597 36.6519 3.29123 22.7824 4.45055C11.9723 5.35784 1.72317 6.66837 1.16227 7.22282C1.06029 7.32363 0.958306 8.58376 0.907315 9.9951C0.805333 12.2633 0.958306 12.6666 2.08011 13.473C2.79398 13.9771 3.76281 14.4811 4.17073 14.6324C4.88461 14.8844 32.5217 13.3722 39.0995 12.717C42.006 12.4649 131.495 11.356 153.319 11.3056C161.172 11.3056 179.426 11.6081 193.857 12.0113C208.287 12.4145 221.341 12.6666 222.82 12.6162C226.491 12.5153 229.755 10.7512 229.907 8.83578C229.958 7.67647 229.805 7.47485 228.633 7.42444C227.358 7.37404 227.358 7.32363 228.939 6.9708C231.131 6.46675 231.386 6.16432 230.111 5.45865C228.888 4.80338 228.684 3.9465 229.805 3.9465C230.213 3.9465 230.57 3.69447 230.57 3.44245C230.57 3.14002 230.315 2.9384 229.958 2.9384C229.653 2.9384 228.327 2.43435 227.052 1.82949L224.706 0.720575L181.364 0.670169C157.551 0.619765 134.605 0.77098 130.373 0.9726ZM165.557 2.9888C165.863 3.19042 168.922 3.39204 172.441 3.39204C175.959 3.44245 182.588 3.64407 187.228 3.89609C194.622 4.29933 193.806 4.34974 180.599 4.14812C172.339 4.04731 158.826 3.9465 150.566 3.9465C142.305 3.9465 135.676 3.84569 135.778 3.74488C135.931 3.59366 141.591 3.44245 148.373 3.39204C155.155 3.29123 160.968 3.08961 161.325 2.83759C162.09 2.38394 164.792 2.43435 165.557 2.9888ZM218.18 3.79528C217.16 3.89609 215.528 3.89609 214.61 3.79528C213.743 3.69447 214.61 3.59366 216.548 3.59366C218.537 3.59366 219.25 3.69447 218.18 3.79528ZM106.102 4.14812C106 4.24893 94.2207 4.40014 79.8922 4.50095C65.6148 4.65217 57.4562 4.60176 61.7905 4.45055C70.9178 4.09771 106.407 3.84569 106.102 4.14812ZM131.495 4.24893C131.342 4.40014 130.883 4.45055 130.526 4.29933C130.118 4.14812 130.271 3.9969 130.832 3.9969C131.393 3.9465 131.699 4.09771 131.495 4.24893ZM221.647 7.52525C222.004 7.87809 220.525 7.9789 217.058 7.92849C214.253 7.82768 204.259 7.82768 194.877 7.87809C185.494 7.92849 176.52 7.87809 174.99 7.77728C170.452 7.42444 145.925 7.37404 127.569 7.62606C108.702 7.92849 107.529 7.67647 124.764 7.0212C140.214 6.41634 220.984 6.86999 221.647 7.52525ZM98.5039 8.0293C83.1047 8.43254 67.2465 8.43254 70.9688 7.9789C72.4985 7.77728 82.0338 7.62606 92.13 7.62606C110.13 7.67647 110.283 7.67647 98.5039 8.0293ZM165.812 8.48295C165.812 8.73497 165.455 8.83578 165.047 8.68457C164.639 8.48295 164.282 8.28133 164.282 8.18052C164.282 8.07971 164.639 7.9789 165.047 7.9789C165.455 7.9789 165.812 8.18052 165.812 8.48295ZM167.342 8.48295C167.342 8.73497 167.087 8.987 166.781 8.987C166.526 8.987 166.424 8.73497 166.577 8.48295C166.73 8.18052 166.985 7.9789 167.138 7.9789C167.24 7.9789 167.342 8.18052 167.342 8.48295ZM171.166 8.48295C171.319 8.73497 171.115 8.987 170.707 8.987C170.248 8.987 169.891 8.73497 169.891 8.48295C169.891 8.18052 170.095 7.9789 170.35 7.9789C170.656 7.9789 171.013 8.18052 171.166 8.48295ZM219.607 8.987C220.525 9.39024 220.525 9.44064 219.352 9.39024C218.638 9.39024 217.415 9.18862 216.548 8.987L215.018 8.58376H216.803C217.772 8.58376 219.046 8.73497 219.607 8.987ZM101.665 9.33983C94.0167 9.44064 81.6259 9.44064 74.1303 9.33983C66.6346 9.28943 72.9065 9.23902 88.0508 9.23902C103.195 9.23902 109.314 9.28943 101.665 9.33983ZM5.70046 11.0032C5.70046 11.2552 4.9356 11.5072 4.06875 11.4568C2.64101 11.4568 2.53902 11.356 3.40587 11.0032C4.83361 10.3983 5.70046 10.3983 5.70046 11.0032ZM13.808 10.7008C13.706 10.8016 11.8704 11.0032 9.77973 11.1544C7.28118 11.356 6.21037 11.3056 6.72028 11.0032C7.43415 10.5496 14.3179 10.2471 13.808 10.7008ZM213.131 11.8601C212.367 11.9609 210.99 11.9609 210.072 11.8601C209.154 11.7593 209.766 11.6585 211.449 11.6585C213.131 11.6585 213.896 11.7593 213.131 11.8601Z" fill="url(#paint0_linear_5012_165)" />
                                                    <defs>
                                                        <linearGradient id="paint0_linear_5012_165" x1="44.8273" y1="18.6184" x2="48.3226" y2="31.8404" gradientUnits="userSpaceOnUse">
                                                            <stop offset="1" stop-color="#43E508" />
                                                            <stop offset="1" stop-color="#F7EF33" />
                                                        </linearGradient>
                                                    </defs>
                                                </svg>
                                            </span>
                                        </span>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="dgm-service-wrap">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="dgm-service-item p-relative tp_fade_anim">
                                        <div class="dgm-service-bg">
                                           <img src="{{ assets('assets/AIcontrol_imgs/Partners/hover_background.png') }}" alt="">
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-lg-5">
                                                <div class="dgm-service-content-left d-inline-flex align-items-center">
                                                    <span>01</span>
                                                    <h4 class="dgm-service-title-sm"><a href="{{ route(current_locale() . '.solution.hvac') }}">{!! __('bms.feature1_title') !!}</a>
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="dgm-service-content-right d-flex align-items-center justify-content-between">
                                                    <p>{!! __('bms.feature1_desc') !!}</p>
                                                    <a class="dgm-service-link" href="{{ route(current_locale() . '.solution.hvac') }}">
                                                        <span>
                                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M0.880859 13L12.8809 1M12.8809 1H0.880859M12.8809 1V13" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M0.880859 13L12.8809 1M12.8809 1H0.880859M12.8809 1V13" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dgm-service-item p-relative tp_fade_anim">
                                        <div class="dgm-service-bg">
                                            <img src="{{ assets('assets/AIcontrol_imgs/Partners/hover_background.png') }}" alt="">
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-lg-5">
                                                <div class="dgm-service-content-left d-inline-flex align-items-center">
                                                    <span>02</span>
                                                    <h4 class="dgm-service-title-sm"><a href="{{ route(current_locale() . '.solution.lighting') }}">{!! __('bms.feature2_title') !!}</a></h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="dgm-service-content-right d-flex align-items-center justify-content-between">
                                                    <p>{!! __('bms.feature2_desc') !!}</p>
                                                    <a class="dgm-service-link" href="{{ route(current_locale() . '.solution.lighting') }}">
                                                        <span>
                                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M0.880859 13L12.8809 1M12.8809 1H0.880859M12.8809 1V13" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M0.880859 13L12.8809 1M12.8809 1H0.880859M12.8809 1V13" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dgm-service-item p-relative tp_fade_anim">
                                        <div class="dgm-service-bg">
                                            <img src="{{ assets('assets/AIcontrol_imgs/Partners/hover_background.png') }}" alt="">
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-lg-5">
                                                <div class="dgm-service-content-left d-inline-flex align-items-center">
                                                    <span>03</span>
                                                    <h4 class="dgm-service-title-sm"><a >{!! __('bms.feature3_title') !!}</a></h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="dgm-service-content-right d-flex align-items-center justify-content-between">
                                                    <p>{!! __('bms.feature3_desc') !!}</p>
                                                    <a class="dgm-service-link" >
                                                        <span>
                                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M0.880859 13L12.8809 1M12.8809 1H0.880859M12.8809 1V13" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M0.880859 13L12.8809 1M12.8809 1H0.880859M12.8809 1V13" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dgm-service-item p-relative tp_fade_anim">
                                        <div class="dgm-service-bg">
                                            <img src="{{ assets('assets/AIcontrol_imgs/Partners/hover_background.png') }}" alt="">
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-lg-5">
                                                <div class="dgm-service-content-left d-inline-flex align-items-center">
                                                    <span>04</span>
                                                    <h4 class="dgm-service-title-sm"><a href="{{ route(current_locale() . '.solution.security') }}">{!! __('bms.feature4_title') !!}</a></h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="dgm-service-content-right d-flex align-items-center justify-content-between">
                                                    <p>{!! __('bms.feature4_desc') !!}</p>
                                                    <a class="dgm-service-link" href="{{ route(current_locale() . '.solution.security') }}">
                                                        <span>
                                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M0.880859 13L12.8809 1M12.8809 1H0.880859M12.8809 1V13" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M0.880859 13L12.8809 1M12.8809 1H0.880859M12.8809 1V13" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- service area end -->


                

                <!-- project area start -->
                <div class="dgm-project-area black-bg-5 pt-130 pb-120 fix">
                    <div class="container container-1330">
                        <div class="dgm-project-top-wrap">
                            <div class="row align-items-end">
                                <div class="col-xl-4 col-lg-6">
                                    <div class="dgm-project-title-box z-index-1 mb-30">
                                        <h4 class="tp-section-title-grotesk text-white mb-0 tp_fade_anim">
                                            {!! __('bms.project_title') !!}
                                            <span class="p-relative">
                                                <span class="tp-section-title-shape">
                                                    <svg width="130" height="15" viewBox="0 0 130 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M73.1913 0.63893C70.828 0.839493 61.663 1.24062 52.8726 1.54146C29.9023 2.29357 20.2184 2.9454 12.3791 4.09863C6.2691 5.00116 0.476088 6.30482 0.159058 6.85636C0.101416 6.95664 0.0437743 8.21016 0.0149533 9.61409C-0.0426886 11.8704 0.0437742 12.2715 0.677835 13.0738C1.08133 13.5752 1.62893 14.0766 1.85949 14.227C2.26299 14.4777 17.8839 12.9735 21.6018 12.3217C23.2446 12.071 73.8254 10.9679 86.1608 10.9177C90.5992 10.9177 100.917 11.2186 109.073 11.6197C117.23 12.0208 124.608 12.2715 125.444 12.2214C127.519 12.1211 129.363 10.3662 129.45 8.46086C129.479 7.30763 129.392 7.10706 128.729 7.05692C128.009 7.00678 128.009 6.95664 128.902 6.60566C130.142 6.10425 130.286 5.80341 129.565 5.10144C128.873 4.44961 128.758 3.59723 129.392 3.59723C129.623 3.59723 129.824 3.34652 129.824 3.09582C129.824 2.79498 129.68 2.59441 129.479 2.59441C129.306 2.59441 128.556 2.09301 127.836 1.49132L126.51 0.388227L102.012 0.338087C88.5529 0.287947 75.5835 0.438369 73.1913 0.63893ZM93.0778 2.64455C93.2507 2.84512 94.98 3.04568 96.9686 3.04568C98.9573 3.09582 102.704 3.29638 105.327 3.54708C109.506 3.94821 109.045 3.99835 101.58 3.79779C96.911 3.69751 89.2734 3.59723 84.6044 3.59723C79.9354 3.59723 76.1887 3.49694 76.2464 3.39666C76.3328 3.24624 79.5319 3.09582 83.3651 3.04568C87.1983 2.9454 90.4839 2.74483 90.6856 2.49413C91.118 2.04287 92.6455 2.09301 93.0778 2.64455ZM122.821 3.4468C122.245 3.54708 121.322 3.54708 120.804 3.4468C120.314 3.34652 120.804 3.24624 121.899 3.24624C123.023 3.24624 123.426 3.34652 122.821 3.4468ZM59.4726 3.79779C59.4149 3.89807 52.7573 4.04849 44.6586 4.14877C36.5887 4.29919 31.9774 4.24905 34.4272 4.09863C39.5861 3.74765 59.6455 3.49694 59.4726 3.79779ZM73.8254 3.89807C73.7389 4.04849 73.4795 4.09863 73.2778 3.94821C73.0472 3.79779 73.1337 3.64737 73.4507 3.64737C73.7678 3.59723 73.9407 3.74765 73.8254 3.89807ZM124.781 7.15721C124.983 7.50819 124.147 7.60847 122.187 7.55833C120.602 7.45805 114.953 7.45805 109.65 7.50819C104.347 7.55833 99.2743 7.50819 98.4097 7.40791C95.8446 7.05692 81.9817 7.00678 71.6062 7.25749C60.9424 7.55833 60.2795 7.30763 70.021 6.6558C78.7538 6.05411 124.406 6.50538 124.781 7.15721ZM55.1782 7.65861C46.4743 8.05974 37.511 8.05974 39.6149 7.60847C40.4796 7.40791 45.8691 7.25749 51.5756 7.25749C61.7494 7.30763 61.8359 7.30763 55.1782 7.65861ZM93.2219 8.10988C93.2219 8.36058 93.0201 8.46086 92.7896 8.31044C92.559 8.10988 92.3573 7.90931 92.3573 7.80903C92.3573 7.70875 92.559 7.60847 92.7896 7.60847C93.0201 7.60847 93.2219 7.80903 93.2219 8.10988ZM94.0865 8.10988C94.0865 8.36058 93.9424 8.61128 93.7695 8.61128C93.6254 8.61128 93.5677 8.36058 93.6542 8.10988C93.7407 7.80903 93.8848 7.60847 93.9712 7.60847C94.0289 7.60847 94.0865 7.80903 94.0865 8.10988ZM96.2481 8.10988C96.3345 8.36058 96.2193 8.61128 95.9887 8.61128C95.7293 8.61128 95.5276 8.36058 95.5276 8.10988C95.5276 7.80903 95.6428 7.60847 95.7869 7.60847C95.9599 7.60847 96.1616 7.80903 96.2481 8.10988ZM123.628 8.61128C124.147 9.01241 124.147 9.06255 123.484 9.01241C123.08 9.01241 122.389 8.81184 121.899 8.61128L121.034 8.21016H122.043C122.59 8.21016 123.311 8.36058 123.628 8.61128ZM56.9651 8.96227C52.642 9.06255 45.6385 9.06255 41.4018 8.96227C37.1651 8.91212 40.7101 8.86198 49.2699 8.86198C57.8298 8.86198 61.2883 8.91212 56.9651 8.96227ZM2.72412 10.6169C2.72412 10.8676 2.29181 11.1183 1.80185 11.0682C0.994865 11.0682 0.937223 10.9679 1.42718 10.6169C2.23417 10.0152 2.72412 10.0152 2.72412 10.6169ZM7.30665 10.3161C7.24901 10.4163 6.21146 10.6169 5.0298 10.7673C3.61757 10.9679 3.01233 10.9177 3.30054 10.6169C3.70403 10.1656 7.59486 9.8648 7.30665 10.3161ZM119.968 11.4693C119.535 11.5696 118.757 11.5696 118.238 11.4693C117.72 11.369 118.066 11.2687 119.017 11.2687C119.968 11.2687 120.4 11.369 119.968 11.4693Z" fill="url(#paint0_linear_5013_166)" />
                                                        <defs>
                                                            <linearGradient id="paint0_linear_5013_166" x1="24.8393" y1="18.1921" x2="30.2212" y2="29.7599" gradientUnits="userSpaceOnUse">
                                                                <stop offset="1" stop-color="#43E508" />
                                                                <stop offset="1" stop-color="#F7EF33" />
                                                            </linearGradient>
                                                        </defs>
                                                    </svg>
                                                </span>
                                            </span>
                                            của AIControl
                                        </h4>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="dgm-project-top-text mb-30 tp_fade_anim">
                                        <p>
                                            {{ __('bms.project_description') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-6">
                                    <div class="dgm-project-arrow text-start text-xl-end z-index-1 mb-30 tp_fade_anim">
                                        <button class="dgm-project-prev">
                                            <span>
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.0711 7.92898H0.928955M0.928955 7.92898L8.00002 15M0.928955 7.92898L8.00002 0.85791" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </button>
                                        <button class="dgm-project-next">
                                            <span>
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0.928955 8.00002H15.0711M15.0711 8.00002L8.00002 0.928955M15.0711 8.00002L8.00002 15.0711" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="dgm-project-slider-wrap">
                        <div class="swiper-container dgm-project-active">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="dgm-project-item">
                                        <div class="dgm-project-thumb">
                                            <img src="{{ asset('assets/img/project/bms-office.jpg') }}" alt="BMS Tòa Nhà Văn Phòng">
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="dgm-project-item">
                                        <div class="dgm-project-thumb">
                                            <img src="{{ asset('assets/img/project/bms-hotel.jpg') }}" alt="BMS Khách Sạn">
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="dgm-project-item">
                                        <div class="dgm-project-thumb">
                                            <img src="{{ asset('assets/img/project/bms-hospital.jpg') }}" alt="BMS Bệnh Viện">
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="dgm-project-item">
                                        <div class="dgm-project-thumb">
                                            <img src="{{ asset('assets/img/project/bms-shopping.jpg') }}" alt="BMS Trung Tâm Thương Mại">
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="dgm-project-item">
                                        <div class="dgm-project-thumb">
                                            <img src="{{ asset('assets/img/project/bms-industrial.jpg') }}" alt="BMS Khu Công Nghiệp">
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="dgm-project-item">
                                        <div class="dgm-project-thumb">
                                            <img src="{{ asset('assets/img/project/bms-datacenter.jpg') }}" alt="BMS Trung Tâm Dữ Liệu">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-container dgm-project-text-active fix mt-55">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="dgm-project-item">
                                        <div class="dgm-project-content text-center">
                                            <h4 class="dgm-project-title-sm"><a class="tp-line-white" href="portfolio-details-classic-stack-light.html">Avocado
                                                    Cutter</a></h4>
                                            <h5><span>Digital marketing</span></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="dgm-project-item">
                                        <div class="dgm-project-content text-center">
                                            <h4 class="dgm-project-title-sm"><a class="tp-line-white" href="portfolio-details-classic-stack-light.html">Slice. Pit. Scoop.</a></h4>
                                            <h5><span>Digital marketing</span></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="dgm-project-item">
                                        <div class="dgm-project-content text-center">
                                            <h4 class="dgm-project-title-sm"><a class="tp-line-white" href="portfolio-details-classic-stack-light.html">Your guac’s best friend.</a></h4>
                                            <h5><span>Digital marketing</span></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="dgm-project-item">
                                        <div class="dgm-project-content text-center">
                                            <h4 class="dgm-project-title-sm"><a class="tp-line-white" href="portfolio-details-classic-stack-light.html">Perfect halves, every time.</a></h4>
                                            <h5><span>Digital marketing</span></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="dgm-project-item">
                                        <div class="dgm-project-content text-center">
                                            <h4 class="dgm-project-title-sm"><a class="tp-line-white" href="portfolio-details-classic-stack-light.html">Three tools. One cutter.</a></h4>
                                            <h5><span>Digital marketing</span></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="dgm-project-item">
                                        <div class="dgm-project-content text-center">
                                            <h4 class="dgm-project-title-sm"><a class="tp-line-white" href="portfolio-details-classic-stack-light.html">Avocado
                                                    Cutter</a></h4>
                                            <h5><span>Digital marketing</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <!-- project area end -->


                <!-- brand area start -->
                {{-- <div class="dgm-brand-area fix">
                    <div class="dgm-brand-wrapper">
                        <div class="swiper-container dgm-brand-active">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="dgm-brand-item">
                                        <img src="assets/img/home-03/brand/brand-1.png" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="dgm-brand-item">
                                        <img src="assets/img/home-03/brand/brand-2.png" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="dgm-brand-item">
                                        <img src="assets/img/home-03/brand/brand-3.png" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="dgm-brand-item">
                                        <img src="assets/img/home-03/brand/brand-4.png" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="dgm-brand-item">
                                        <img src="assets/img/home-03/brand/brand-5.png" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="dgm-brand-item">
                                        <img src="assets/img/home-03/brand/brand-6.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- brand area end -->


            </main>
            <div style="padding: 100px"></div>
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


    <!-- JS here -->

    <!-- JS here -->

</body>

</html>