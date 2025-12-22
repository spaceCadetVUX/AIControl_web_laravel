<!doctype html>
<html class="no-js agntix-light" lang="{{ current_locale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <base href="{{ url('/') }}/">
    <title>{{ __('home.meta_title') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SEO Meta Tags -->
    <meta name="description" content="{{ __('home.meta_description') }}">
    <meta name="keywords" content="{{ __('home.meta_keywords') }}">
    <meta name="author" content="AIControl">
    <!-- Canonical (avoid duplicate URLs) -->
    <link rel="canonical" href="https://aicontrol.vn/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css">

    <!-- Open Graph (Facebook, Zalo, etc.) -->
    <meta property="og:title" content="{{ __('home.og_title') }}">
    <meta property="og:description" content="{{ __('home.og_description') }}">
    <meta property="og:image" content="https://aicontrol.vn/assets/AIcontrol_imgs/aicontrol-co-mau.svg">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="{{ app()->getLocale() === 'vi' ? 'vi_VN' : 'en_US' }}">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/AIcontrol_imgs/small_logo.png') }}">
    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome-pro.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/spacing.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/atropos.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/shop.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">




    <!-- CSS here -->
</head>
<!-- tp-magic-cursor -->

<body class="" data-bg-color="#ffffff">

    <!-- preloader -->
    <div id="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- preloader end  -->

    <!-- back to top start -->
    {{-- <div class="back-to-top-wrapper">
        <button id="back_to_top" type="button" class="back-to-top-btn">
            <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
    </div> --}}

    <div class="back-to-top-wrapper">
    <button 
        id="back_to_top" 
        type="button" 
        class="back-to-top-btn"
        aria-label="Back to top"
    >
        <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </button>
    </div>
    <!-- back to top end -->

    {{-- header and canvas - popup --}}
    @include('front.includes.offcanvas')
    @include('front.includes.header')
    @include('front.includes.popup')

    <div id="smooth-wrapper">
        <div id="smooth-content">

            <main>
                <!-- hero area start -->
                <div class="ar-hero-area ar-hero-border">
                    <div class="container container-1430">
                        <div class="ar-hero-bg ar-hero-ptb" data-background="assets/img/home-08/hero/hero-bg-shape.png">
                            <div class="row justify-content-center">
                                <div class="col-xl-11">
                                    <div class="ar-hero-title-box text-center tp_fade_anim" data-delay=".3">
                                        <h1 class="ar-hero-title mb-15">
                                            {{ __('home.hero_title') }} <br> <span class="subh1">{{ __('home.hero_subtitle') }}</span>
                                        </h1>
                                    </div>
                                    <div class="ar-hero-btn text-center tp_fade_anim" data-delay=".5" data-fade-from="top" data-ease="bounce">
                                        <a class="tp-btn-black-solid" href="#Solutions-area">{{ __('home.hero_button') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- hero area end -->

                <!-- category area start -->
                <div class="ar-category-area ar-category-ptb">
                    <div class="container container-1430">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="ar-category-wrap d-flex justify-content-between align-items-center">
                                    <div class="ar-category-item">
                                        <a>
                                            <i>
                                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.5298 21H3.10996C1.94998 21 1 20.07 1 18.93V4.0903C1 1.47034 2.94997 0.280362 5.33992 1.45034L9.77985 3.6303C10.7398 4.10029 11.5298 5.35027 11.5298 6.41025V21ZM11.5298 21L17.8403 20.9998C20.0003 20.9998 21.0003 19.9998 21.0003 17.8399V14.0599C21.0003 13.9899 21.0003 13.9299 20.9903 13.8699M11.5298 21L11.5304 9.42002L12.0004 9.52002M12.0004 9.52002L16.5003 10.53M12.0004 9.52002L12.001 13.7495C12.001 14.9894 13.011 15.9994 14.2509 15.9994C15.4909 15.9994 16.5009 14.9894 16.5009 13.7495L16.5003 10.53M16.5003 10.53L18.5303 10.98C19.8503 11.27 20.9303 11.95 20.9903 13.8699M16.5003 10.53L16.5 13.7502C16.5 14.9902 17.51 16.0002 18.75 16.0002C19.9499 16.0002 20.9303 15.0499 20.9903 13.8699M4.53027 8.00049H8.00021M4.53027 12.0005H8.00021" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </i>
                                            <span>{{ __('home.category_landscape') }}</span>
                                        </a>
                                    </div>
                                    <div class="ar-category-item">
                                        <a>
                                            <i>
                                                <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.67871 14.8853C6.67871 14.4711 7.01449 14.1353 7.42871 14.1353H13.2437C13.6579 14.1353 13.9937 14.4711 13.9937 14.8853C13.9937 15.2995 13.6579 15.6353 13.2437 15.6353H7.42871C7.01449 15.6353 6.67871 15.2995 6.67871 14.8853Z" fill="currentColor" fill-opacity="1" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.15986 4.72765C4.74732 5.10978 4.3769 5.43822 4.04763 5.72845C4.00115 5.76941 3.95564 5.80949 3.91105 5.84875C3.63214 6.09435 3.38925 6.30824 3.17108 6.50963C2.66577 6.97608 2.34658 7.32827 2.12085 7.72216C1.66835 8.51176 1.5 9.619 1.5 12.463C1.5 14.5191 1.62307 15.9951 1.90116 17.0653C2.17416 18.1158 2.58112 18.7179 3.12022 19.1048C3.68326 19.509 4.48705 19.7497 5.69745 19.8745C6.90666 19.9991 8.41498 20 10.336 20C12.257 20 13.7654 19.9991 14.9746 19.8745C16.185 19.7497 16.9888 19.509 17.5518 19.1048C18.0909 18.7179 18.4979 18.1158 18.7709 17.0653C19.049 15.9951 19.172 14.5191 19.172 12.463C19.172 9.6189 19.0039 8.51166 18.5516 7.72204C18.326 7.32818 18.0069 6.97601 17.5017 6.50958C17.2834 6.30801 17.0403 6.09391 16.7611 5.84801C16.7168 5.80898 16.6715 5.76914 16.6253 5.72843C16.2961 5.4382 15.9257 5.10976 15.5131 4.72762C15.2689 4.53041 15.0159 4.31703 14.7537 4.09588C14.1826 3.61414 13.5677 3.09554 12.9044 2.62695C11.9195 1.93118 11.0275 1.5 10.308 1.5C9.59088 1.5 8.71108 1.93121 7.73913 2.62803C7.10485 3.08278 6.52462 3.577 5.97943 4.04137C5.69776 4.28128 5.42545 4.51323 5.15986 4.72765ZM6.86513 1.40897C7.86546 0.69179 9.08218 0 10.308 0C11.5305 0 12.7571 0.68632 13.7699 1.4018C14.4859 1.90759 15.1941 2.50449 15.7871 3.00416C16.04 3.21729 16.2719 3.41274 16.4744 3.57587C16.488 3.58681 16.5012 3.59822 16.514 3.61008C16.92 3.98662 17.2854 4.3107 17.6172 4.60318C17.6622 4.64284 17.7067 4.68205 17.7508 4.72083C18.0287 4.96553 18.2869 5.1929 18.5193 5.40748C19.0585 5.90537 19.5124 6.38157 19.8532 6.97646C20.5336 8.16434 20.672 9.6761 20.672 12.463C20.672 14.5504 20.5502 16.182 20.2227 17.4426C19.89 18.7227 19.3305 19.6745 18.4265 20.3234C17.5464 20.9551 16.4304 21.2324 15.1284 21.3666C13.8337 21.5 12.2494 21.5 10.3732 21.5H10.2989C8.42258 21.5 6.83831 21.5 5.54365 21.3666C4.24165 21.2324 3.12563 20.9551 2.24553 20.3234C1.34151 19.6745 0.78204 18.7227 0.44938 17.4426C0.12182 16.182 0 14.5504 0 12.463C0 9.676 0.13866 8.16424 0.81941 6.97634C1.16031 6.38148 1.6143 5.9053 2.15365 5.40743C2.38583 5.1931 2.64376 4.966 2.92131 4.72161C2.96565 4.68257 3.01049 4.64309 3.0558 4.60316C3.38762 4.31069 3.753 3.98661 4.15902 3.61008C4.17184 3.59818 4.18508 3.58674 4.19871 3.57577C4.41083 3.40502 4.65839 3.19454 4.92993 2.96367C5.50392 2.47566 6.18505 1.89655 6.86513 1.40897Z" fill="currentColor" />
                                                </svg>
                                            </i>
                                            <span>{{ __('home.category_commercial') }}</span>
                                        </a>
                                    </div>
                                    <div class="ar-category-item">
                                        <a>
                                            <i>
                                                <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7 21V11H13V21M1 8L10 1L19 8V19C19 19.5304 18.7893 20.0391 18.4142 20.4142C18.0391 20.7893 17.5304 21 17 21H3C2.46957 21 1.96086 20.7893 1.58579 20.4142C1.21071 20.0391 1 19.5304 1 19V8Z" stroke="currentColor" stroke-opacity="1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </i>
                                            <span>{{ __('home.category_residential') }}</span>
                                        </a>
                                    </div>
                                    <div class="ar-category-item">
                                        <a>
                                            <i>
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12.92 2.25984L19.43 5.76984C20.19 6.17984 20.19 7.34984 19.43 7.75984L12.92 11.2698C12.34 11.5798 11.66 11.5798 11.08 11.2698L4.57 7.75984C3.81 7.34984 3.81 6.17984 4.57 5.76984L11.08 2.25984C11.66 1.94984 12.34 1.94984 12.92 2.25984Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path opacity="1" d="M3.61 10.1302L9.66 13.1602C10.41 13.5402 10.89 14.3102 10.89 15.1502V20.8702C10.89 21.7002 10.02 22.2302 9.28 21.8602L3.23 18.8302C2.48 18.4502 2 17.6802 2 16.8402V11.1202C2 10.2902 2.87 9.76017 3.61 10.1302Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path opacity="1" d="M20.3904 10.1302L14.3404 13.1602C13.5904 13.5402 13.1104 14.3102 13.1104 15.1502V20.8702C13.1104 21.7002 13.9804 22.2302 14.7204 21.8602L20.7704 18.8302C21.5204 18.4502 22.0004 17.6802 22.0004 16.8402V11.1202C22.0004 10.2902 21.1304 9.76017 20.3904 10.1302Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </i>
                                            <span>{{ __('home.category_industrial') }}</span>
                                        </a>
                                    </div>
                                    <div class="ar-category-item">
                                        <a>
                                            <i>
                                                <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="1" d="M1 1H21M3.03999 4.33H18.97C19.85 4.33 20.38 5.3 19.9 6.04L11.94 18.43C11.5 19.11 10.51 19.11 10.07 18.43L2.10997 6.04C1.62997 5.3 2.15999 4.33 3.03999 4.33Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </i>
                                            <span>{{ __('home.category_urban') }}</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- category area end -->
                <!-- brand area start -->
                {{-- <div class="ar-brand-area ar-brand-style">
                    <div class="tp-brand-wrapper primary-bg z-index-1">
                        <div class="swiper-container tp-brand-active">
                            <div class="swiper-wrapper slide-transtion">
                                <div class="swiper-slide">
                                    <div class="tp-brand-item">
                                        <span class="tp-brand-title">Văn Phòng</span>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="tp-brand-item">
                                        <span class="tp-brand-title">Trung tâm thương mại</span>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="tp-brand-item">
                                        <span class="tp-brand-title">Khách Sạn</span>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="tp-brand-item">
                                        <span class="tp-brand-title">Nhà hàng, quán cà phê</span>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="tp-brand-item">
                                        <span class="tp-brand-title">Trường Học</span>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="tp-brand-item">
                                        <span class="tp-brand-title">Bện Viện</span>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="tp-brand-item">
                                        <span class="tp-brand-title">Trung tâm hành chính công</span>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="tp-brand-item">
                                        <span class="tp-brand-title">Siêu thị, cửa hàng tiện lợi</span>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="tp-brand-item">
                                        <span class="tp-brand-title">Showroom </span>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="tp-brand-item">
                                        <span class="tp-brand-title">Showroom </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- brand area end -->
                <!-- banner area start -->
                <div class="ar-banner-area">
                    <div class="ar-banner-wrap">
                        <img class="w-100" src="{{ asset('assets/AIcontrol_imgs/landing/banner.jpg') }}" alt="AiControl banner" data-speed=".8">
                    </div>
                    <div class="ar-scroll-image">
                        <div class="ar-banner-shape d-flex align-items-center">
                            <img src="{{ asset('assets/img/home-08/banner/banner-shape.png') }}" alt="">
                            <img src="{{ asset('assets/img/home-08/banner/banner-shape.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <!-- banner area end -->


                <!-- about area start -->
                <div class="ar-about-area pt-120 pb-160">
                    <div class="container">
                        <div class="ar-about-title-wrap mb-60">
                            <div class="row align-items-end">
                                <div class="col-xl-8 col-lg-8">
                                    <div class="ar-about-title-box">
                                        <h2 class="tp-section-title lts tp_fade_anim txt_pr_color">{{ __('home.about_tagline') }}</h2>
                                        <h3 class="tp-section-title-clash-400 fs-40 fw-400 mb-0 pb-40 " data-delay=".4">
                                            {{ __('home.about_title') }}
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 d-none d-lg-block">
                                    <div class="ar-about-top-img text-end">
                                        <img data-speed=".9" src="{{ asset('assets/AIcontrol_imgs/landing/aboutUSpic1.png') }}" alt="about us img">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-end">
                            <div class="col-xl-5 col-lg-5 col-md-7">
                                <div class="ar-about-thumb p-relative">
                                    <img data-speed=".8" src="{{ asset('assets/AIcontrol_imgs/landing/aboutUsPic2.jpg') }}" alt="about us">
                                    <img class="ar-about-shape" src="{{ asset('assets/img/home-08/about/about-shape.png') }}" alt="about us background shape">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-10 order-1 order-lg-0">
                                <div class="ar-about-content">
                                    <h3 class="ar-about-title-sm tp_fade_anim" data-delay=".3">
                                        {{ __('home.about_subtitle') }}
                                    </h3>
                                    <div class="tp_fade_anim" data-delay=".4">
                                        <p>
                                            {{ __('home.about_description') }}
                                        </p>
                                    </div>
                                    {{-- <div class="tp-btn-red-circle-box tp_fade_anim" data-delay=".5" data-fade-from="top" data-ease="bounce">
                                        <a class="tp-btn-red-circle-icon" href="about-us-light.html">
                                            <span>
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 11L11 1M11 1H1M11 1V11" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </a>
                                        <a class="tp-btn-red-circle-text" href="about-us-light.html">About Us</a>
                                        <a class="tp-btn-red-circle-icon" href="about-us-light.html">
                                            <span>
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 11L11 1M11 1H1M11 1V11" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </a>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-5 order-0 order-lg-0">
                                <div data-speed="1.1" class="ar-about-exp-wrap d-flex justify-content-xxl-start justify-content-end">
                                    <div class="ar-about-exp-box" data-background="assets/img/home-08/hero/hero-bg-shape-2.png">
                                        <span>{{ __('home.about_experience_label') }}</span>
                                        <h4>{{ __('home.about_experience_value') }}</h4>
                                    </div>
                                </div>
                                <div data-speed="1.1" class="ar-about-exp-wrap d-flex justify-content-xxl-start justify-content-end">
                                    <div class="ar-about-exp-box" data-background="assets/img/home-08/hero/hero-bg-shape-2.png">
                                        <span>{{ __('home.about_projects_label') }}</span>
                                        <h4>{{ __('home.about_projects_value') }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- about area end -->

                <!-- service area start -->
                <div class="ar-service-area ar-service-height ar-service-mr p-relative fix">
                    <div class="ar-service-title-box">
                        <h2 class="tp-section-title-clash-600 text-white fs-60 mb-0 tp_fade_anim" data-delay=".4">{{ __('home.brands_title') }}</h2>
                    </div>
                    <a href="{{ route(current_locale() . '.abb') }}" class="ar-service-item d-flex align-items-end justify-content-end active">
                        <div class="ar-service-bg" data-background="{{ asset('assets/AIcontrol_imgs/landing/ABB.jpg') }}"></div>
                        <span class="ar-service-title">ABB</span>
                    </a>
                    <a href="{{ route(current_locale() . '.legrand') }}" class="ar-service-item d-flex align-items-end justify-content-end">
                        <div class="ar-service-bg" data-background="{{ asset('assets/AIcontrol_imgs/landing/legrand.jpg') }}"></div>
                        <span class="ar-service-title">Legrand</span>
                    </a>
                    <a href="{{ route(current_locale() . '.cpElectronics') }}" class="ar-service-item d-flex align-items-end justify-content-end">
                        <div class="ar-service-bg" data-background="{{ asset('assets/AIcontrol_imgs/landing/cpElectronic.png') }}"></div>
                        <span class="ar-service-title">CP Electronics</span>
                    </a>
                    <a href="{{ route(current_locale() . '.vantage') }}" class="ar-service-item d-flex align-items-end justify-content-end">
                        <div class="ar-service-bg" data-background="{{ asset('assets/AIcontrol_imgs/landing/vantage.png') }}"></div>
                        <span class="ar-service-title">Vantage</span>
                    </a>
                </div>
                <!-- service area end -->

                <!-- solutions area start -->
                <div id="Solutions-area" class="design-project-area pt-200 pb-80 title-box">
                    <div class="container container-1680">
                        <div class="design-project-title-wrap p-relative mb-140">
                            <!-- <div class="tp-portfolio-metro-shape">
                                <span><svg xmlns="http://www.w3.org/2000/svg" width="732" height="9" viewBox="0 0 732 9" fill="none">
                                        <path d="M728 7.96512L731.5 4.48256L728 1M1 4H731V5H1V4Z" stroke="#000" stroke-opacity="0.8" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg> Know More</span>
                            </div> -->
                            <div class="row align-items-end">
                                <div class="col-xl-9 col-lg-9 col-md-9">
                                    <div class="design-project-title-box">
                                        <h2 class="tp-section-title-dirtyline">
                                            <span class="tp-text-right-scroll tp_text_invert_2">{{ __('home.solutions_title_1') }}</span> <br>
                                            <span class="tp_text_invert_2">{{ __('home.solutions_title_2') }}</span>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="top" class="design-project-item-wrap">
                            <div class="design-project-item mb-120">
                                <div class="row align-items-center">
                                    <div class="col-xl-5 order-xl-0 order-1">
                                        <div class="design-project-content pr-200">
                                            <h3 class="design-project-title tp_reveal_anim"><a href="{{ route(current_locale() . '.solution.lighting') }}">
                                                    {{ __('home.solution_lighting_title') }} </a></h3>
                                            <span class="tp_reveal_anim fw-light">{{ __('home.solution_lighting_subtitle') }}</span>
                                            <a class="tp-btn-sky-border height-50" href="{{ route(current_locale() . '.solution.lighting') }}">{{ __('home.solution_lighting_button') }}</a>
                                        </div>
                                    </div>
                                    <div class="col-xl-7 order-xl-1 order-0">
                                        <div class="design-project-thumb item-1 text-end">
                                            <img src="{{ asset('assets/AIcontrol_imgs/landing/dieu_khien_chieu_sang.jpg') }}" alt="Giải pháp điều khiển chiếu sáng">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="design-project-item mb-120">
                                <div class="row align-items-center">
                                    <div class="col-xl-5 order-xl-0 order-1">
                                        <div class="design-project-content pr-200">
                                            <h3 class="design-project-title tp_reveal_anim"><a href="{{ route(current_locale() . '.solution.shade') }}">{{ __('home.solution_shade_title') }}</a></h3>
                                            <span class="tp_reveal_anim fw-light">{{ __('home.solution_shade_subtitle') }}</span>
                                            <a class="tp-btn-sky-border height-50" href="{{ route(current_locale() . '.solution.shade') }}">{{ __('home.solution_shade_button') }}</a>
                                        </div>
                                    </div>
                                    <div class="col-xl-7 order-xl-1 order-0">
                                        <div class="design-project-thumb item-1 text-end">
                                            <img src="{{ asset('assets/AIcontrol_imgs/landing/RemTudong.jpg') }}" alt="Rèm cửa thông minh">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="design-project-item mb-120">
                                <div class="row align-items-center">
                                    <div class="col-xl-7">
                                        <div class="design-project-thumb item-2">
                                            <img src="{{ asset('assets/AIcontrol_imgs/landing/HVAC.jpg') }}" alt="Điều khiển máy lạnh thông minh">
                                        </div>
                                    </div>
                                    <div class="col-xl-5">
                                        <div class="design-project-content pl-200">
                                            <h3 class="design-project-title tp_reveal_anim"><a href="{{ route(current_locale() . '.solution.hvac') }}">{{ __('home.solution_hvac_title') }}</a></h3>
                                            <span class="tp_reveal_anim fw-light">{{ __('home.solution_hvac_subtitle') }}</span>
                                            <a class="tp-btn-sky-border height-50" href="{{ route(current_locale() . '.solution.hvac') }}">{{ __('home.solution_hvac_button') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="design-project-item mb-120">
                                <div class="row align-items-center">
                                    <div class="col-xl-7">
                                        <div class="design-project-thumb item-2">
                                            <img src="{{ asset('assets/AIcontrol_imgs/landing/an_ninh.jpg') }}" alt="An ninh, kiểm soát ra vào với Ring Legrand">
                                        </div>
                                    </div>
                                    <div class="col-xl-5">
                                        <div class="design-project-content pl-200">
                                            <h3 class="design-project-title tp_reveal_anim"><a href="{{ route(current_locale() . '.solution.security') }}">{{ __('home.solution_security_title') }}</a></h3>
                                            <span class="tp_reveal_anim fw-light">{{ __('home.solution_security_subtitle') }}</span>
                                            <a class="tp-btn-sky-border height-50" href="{{ route(current_locale() . '.solution.security') }}">{{ __('home.solution_security_button') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="design-project-item mb-120">
                                <div class="row align-items-center">
                                    <div class="col-xl-5 order-xl-0 order-1">
                                        <div class="design-project-content pr-200">
                                            <h3 class="design-project-title tp_reveal_anim"><a href="#">{{ __('home.solution_audio_title') }}</a></h3>
                                            <span class="tp_reveal_anim fw-light">{{ __('home.solution_audio_subtitle') }}</span>
                                            <a class="tp-btn-sky-border height-50" href="#">{{ __('home.solution_audio_button') }}</a>
                                        </div>
                                    </div>
                                    <div class="col-xl-7 order-xl-1 order-0">
                                        <div class="design-project-thumb item-1 text-end">
                                            <img src="{{ asset('assets/AIcontrol_imgs/landing/Am_Thanh.jpg') }}" alt="loa bose">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="design-project-item mb-120">
                                <div class="row align-items-center">
                                    <div class="col-xl-5 order-xl-0 order-1">
                                        <div class="design-project-content pr-200">
                                            <h3 class="design-project-title tp_reveal_anim"><a href="#">{{ __('home.solution_energy_title') }}</a></h3>
                                            <span class="tp_reveal_anim fw-light">{{ __('home.solution_energy_subtitle') }}</span>
                                            <a class="tp-btn-sky-border height-50" href="#">{{ __('home.solution_energy_button') }}</a>
                                        </div>
                                    </div>
                                    <div class="col-xl-7 order-xl-1 order-0">
                                        <div class="design-project-thumb item-1 text-end">
                                            <img src="{{ asset('assets/AIcontrol_imgs/landing/Quan_ly_nang_luong.png') }}" alt="Quản lý năng lượng với ABB">
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="design-project-item mb-120">
                                <div class="row align-items-center">
                                    <div class="col-xl-7">
                                        <div class="design-project-thumb item-2">
                                            <img src="{{ asset('assets/AIcontrol_imgs/landing/BMS.jpg') }}" alt="Building managerment system BMS">
                                        </div>
                                    </div>
                                    <div class="col-xl-5">
                                        <div class="design-project-content pl-200">
                                            <h3 class="design-project-title tp_reveal_anim"><a href="{{ route(current_locale() . '.solution.bms') }}">{{ __('home.solution_bms_title') }}</a></h3>
                                            <span class="tp_reveal_anim fw-light">{{ __('home.solution_bms_subtitle') }}</span>
                                            <a class="tp-btn-sky-border height-50" href="{{ route(current_locale() . '.solution.bms') }}">{{ __('home.solution_bms_button') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="design-project-item mb-120">
                                <div class="row align-items-center">
                                    <div class="col-xl-7">
                                        <div class="design-project-thumb item-2">
                                            <img src="{{ asset('assets/AIcontrol_imgs/landing/dieukhienphongkhachsan.jpg') }}" alt="RCU">
                                        </div>
                                    </div>
                                    <div class="col-xl-5">
                                        <div class="design-project-content pl-200">
                                            <h3 class="design-project-title tp_reveal_anim"><a href="{{ route(current_locale() . '.solution.hotel') }}">{{ __('home.solution_hotel_title') }}</a></h3>
                                            <span class="tp_reveal_anim fw-light">{{ __('home.solution_hotel_subtitle') }}</span>
                                            <a class="tp-btn-sky-border height-50" href="{{ route(current_locale() . '.solution.hotel') }}">{{ __('home.solution_hotel_button') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>



                <!-- award area start -->
                <div class="ar-award-area">
                    <div class="container container-1430">
                        <div class="ar-award-wrap p-relative pt-140 pb-160">
                            <div class="ar-award-shape-1">
                                <img src="{{ asset('assets/img/home-08/award/award-shape-1.png') }}" alt="">
                            </div>
                            <div class="row">
                                <div class="col-xl-8">
                                    <div class="ar-award-title-box mb-50">
                                        <h2 class="tp-section-title tp-text-revel-anim" data-delay=".4">{{ __('home.certificates_title') }}</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="offset-xxl-4 col-xxl-8 offset-xl-2 col-xl-10">
                                    <div class="ar-award-right-wrap">
                                        <div class="ar-award-item tp_fade_anim" data-delay=".3">
                                            <div class="row align-items-center">
                                                <div class="col-md-8">
                                                    <div class="ar-award-box-left z-index-3">
                                                        <span class="ar-award-year">2014</span>
                                                        <span class="ar-award-title">Vantage </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="ar-award-box-right z-index-3 d-flex align-items-center justify-content-between">
                                                        <span class="ar-award-category">{{ __('home.certificate_label') }}</span>
                                                        <span class="ar-award-icon">
                                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M1 11L11 1M11 1H1M11 1V11" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ar-award-item tp_fade_anim" data-delay=".4">
                                            <div class="row align-items-center">
                                                <div class="col-md-8">
                                                    <div class="ar-award-box-left z-index-3">
                                                        <span class="ar-award-year">2020</span>
                                                        <span class="ar-award-title">Sanvant</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="ar-award-box-right z-index-3 d-flex align-items-center justify-content-between">
                                                        <span class="ar-award-category">{{ __('home.certificate_label') }}</span>
                                                        <span class="ar-award-icon">
                                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M1 11L11 1M11 1H1M11 1V11" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ar-award-item tp_fade_anim" data-delay=".5">
                                            <div class="row align-items-center">
                                                <div class="col-md-8">
                                                    <div class="ar-award-box-left z-index-3">
                                                        <span class="ar-award-year">2024</span>
                                                        <span class="ar-award-title">Casambi</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="ar-award-box-right z-index-3 d-flex align-items-center justify-content-between">
                                                        <span class="ar-award-category">{{ __('home.certificate_label') }}</span>
                                                        <span class="ar-award-icon">
                                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M1 11L11 1M11 1H1M11 1V11" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ar-award-item tp_fade_anim" data-delay=".6">
                                            <div class="row align-items-center">
                                                <div class="col-md-8">
                                                    <div class="ar-award-box-left z-index-3">
                                                        <span class="ar-award-year">2025</span>
                                                        <span class="ar-award-title">Lutron</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="ar-award-box-right z-index-3 d-flex align-items-center justify-content-between">
                                                        <span class="ar-award-category">{{ __('home.certificate_label') }}</span>
                                                        <span class="ar-award-icon">
                                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M1 11L11 1M11 1H1M11 1V11" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </span>
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
                <!-- award area end -->

                <!-- brand area start -->
                {{-- <div class="ar-brand-area mb-160">
                    <div class="ar-brand-bg" data-background="assets/img/home-08/hero/hero-bg-shape.png">
                        <div class="swiper-container ar-brand-active">
                            <div class="swiper-wrapper slide-transtion">
                                <div class="swiper-slide">
                                    <div class="ar-brand-item">
                                        <img src="{{ asset('assets/img/home-08/brand/brand-1.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="ar-brand-item">
                                        <img src="{{ asset('assets/img/home-08/brand/brand-2.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="ar-brand-item">
                                        <img src="{{ asset('assets/img/home-08/brand/brand-3.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="ar-brand-item">
                                        <img src="{{ asset('assets/img/home-08/brand/brand-4.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="ar-brand-item">
                                        <img src="{{ asset('assets/img/home-08/brand/brand-5.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="ar-brand-item">
                                        <img src="{{ asset('assets/img/home-08/brand/brand-6.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="ar-brand-item">
                                        <img src="{{ asset('assets/img/home-08/brand/brand-3.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                                <!-- brand area end -->

                <!-- blog area start -->
                <div class="ar-blog-area pb-100">
                    <div class="container container-1430">
                        <div class="ar-blog-title-wrap ar-title-mlr mb-60">
                            <div class="row align-items-end">
                                <div class="col-xl-8 col-lg-8 col-md-7">
                                    <div class="ar-blog-title-box">
                                        <h3 class="tp-section-title-clash-600 fs-60 mb-0 tp_fade_anim" data-delay=".4">{{ __('home.blog_title') }}</h3>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-5">
                                    <div class="ar-blog-btn-box d-flex justify-content-md-end justify-content-start mb-15">
                                        <div class="tp-btn-red-circle-box tp_fade_anim" data-delay=".5" data-fade-from="top" data-ease="bounce">
                                            <a class="tp-btn-red-circle-icon" href="{{ route(current_locale() . '.blog.index') }}" aria-label="Go to blog">
                                                <span>
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 11L11 1M11 1H1M11 1V11" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                            </a>
                                            <a class="tp-btn-red-circle-text" href="{{ route(current_locale() . '.blog.index') }}" aria-label="View all blog posts">{{ __('home.blog_view_all') }}</a>
                                            <a class="tp-btn-red-circle-icon" href="{{ route(current_locale() . '.blog.index') }}" aria-label="Go to blog">
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
                            @forelse(($landingBlogs ?? collect()) as $index => $blog)
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
                                        <a href="{{ route(current_locale() . '.blog.show', ['slug' => $blog->slug]) }}"><img class="" src="{{ $cover }}" alt="{{ $blog->title }}"></a>

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
                                <p class="text-center text-muted">{{ __('home.blog_no_posts') }}</p>
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
    <script src="{{ asset('assets/js/header-search.js') }}"></script>
    <script src="{{ asset('assets/js/tp-cursor.js') }}"></script>
    <script src="{{ asset('assets/js/portfolio-slider-1.js') }}"></script>
    <script type="module" src="{{ asset('assets/js/distortion-img.js') }}"></script>
    <script type="module" src="{{ asset('assets/js/skew-slider/index.js') }}"></script>
    <script type="module" src="{{ asset('assets/js/img-revel/index.js') }}"></script>
    <!-- JS here -->
</body>

</html>