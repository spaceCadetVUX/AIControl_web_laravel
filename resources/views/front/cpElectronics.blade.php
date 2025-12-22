<!doctype html>
<html class="no-js" lang="{{ current_locale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ __('cp_electronics.meta_title') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="{{ __('cp_electronics.meta_description') }}">
    <meta name="keywords" content="{{ __('cp_electronics.meta_keywords') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/AIcontrol_imgs/small_logo.png') }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="https://aicontrol.vn/cp-electronics">

    <!-- Open Graph for Facebook -->
    <meta property="og:title" content="Thương hiệu CP Electronics | Giải pháp điều khiển chiếu sáng & tiết kiệm năng lượng | AIControl Việt Nam">
    <meta property="og:description" content="CP Electronics – thương hiệu thuộc Legrand, cung cấp giải pháp điều khiển chiếu sáng, cảm biến thông minh và quản lý năng lượng hiệu quả cho mọi loại công trình.">
    <meta property="og:url" content="https://aicontrol.vn/cp-electronics">
    <meta property="og:site_name" content="AIControl Việt Nam">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://aicontrol.vn/assets/img/seo/cp-electronics-brand.jpg">


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
<!-- tp-magic-cursor -->
<body class="" data-bg-color="#fff">

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

    @include('front.includes.popup')





    <div id="smooth-wrapper">
        <div id="smooth-content">
            <main>
                <!-- hero area start -->
                <div class="ar-hero-area p-relative" data-background="assets/img/team/team-bg.png">
                    <div class="tp-career-shape-1">
                        <span><svg xmlns="http://www.w3.org/2000/svg" width="84" height="84" viewBox="0 0 84 84" fill="none">
                                <path d="M36.3761 0.5993C40.3065 8.98556 47.3237 34.898 32.8824 44.3691C25.3614 49.0997 9.4871 52.826 1.7513 31.3747C-1.16691 23.2826 5.38982 15.9009 20.5227 20.0332C29.2536 22.4173 50.3517 27.8744 60.9 44.2751C66.4672 52.9311 71.833 71.0287 69.4175 82.9721M69.4175 82.9721C70.1596 77.2054 74.079 66.0171 83.8204 67.3978M69.4175 82.9721C69.8033 79.1875 67.076 70.1737 53.0797 64.3958M49.1371 20.8349C52.611 22.1801 63.742 28.4916 67.9921 39.9344" stroke="#030303" stroke-width="1.5" />
                            </svg></span>
                    </div>
                    <div class="container container-1230">
                        <div class="ar-about-us-4-hero-ptb pb-70">
                            <div class="row justify-content-center">
                                <div class="col-xl-12">
                                    <div class="ar-hero-title-box tp_fade_anim" data-delay=".3">
                                        <div class="ar-about-us-4-title-box d-flex align-items-center mb-15">
                                            <span class="tp-section-subtitle pre tp_fade_anim">{{ __('cp_electronics.hero_subtitle') }}</span>
                                            <div class="ar-about-us-4-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="81" height="9" viewBox="0 0 81 9" fill="none">
                                                    <rect y="4" width="80" height="1" fill="#111013" />
                                                    <path d="M77 7.96366L80.5 4.48183L77 1" stroke="#111013" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                        </div>
                                        <h2 class="tp-career-title fs-70">{{ __('cp_electronics.hero_title') }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- hero area end -->

                <!-- team details area start -->
                <section class="tp-team-details-area tp-team-details-ptb pb-70">
                    <div class="container container-1230">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="tp-team-details-wrap">
                                    <div class="tp-team-details-thumb mb-40">
                                        <img src="{{ asset('assets/AIcontrol_imgs/Partners/cpelectronics/cpElectronicBanner.png') }}" alt="">
                                    </div>
                                    <div class="tp-team-details-info d-flex justify-content-between">
                                        <div class="tp-team-details-info-contact">
                                            <a href="tel:+84918918755" aria-label="Call (+84) 0918 918 755">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                    <path d="M2.43248 7.95965C1.76852 6.80251 1.44793 5.85764 1.25462 4.89985C0.968722 3.4833 1.62299 2.09956 2.70686 1.21663C3.16494 0.843468 3.69006 0.970963 3.96095 1.45668L4.57249 2.55324C5.05722 3.4224 5.29958 3.85698 5.25151 4.31771C5.20344 4.77845 4.87658 5.1537 4.22286 5.9042L2.43248 7.95965ZM2.43248 7.95965C3.7764 10.3018 5.88543 12.4109 8.23152 13.7557M8.23152 13.7557C9.38926 14.4193 10.3346 14.7397 11.2929 14.9329C12.7102 15.2187 14.0947 14.5647 14.978 13.4814C15.3514 13.0236 15.2238 12.4987 14.7379 12.228L13.6407 11.6168C12.7711 11.1323 12.3363 10.8901 11.8753 10.9381C11.4144 10.9862 11.0389 11.3128 10.288 11.9662L8.23152 13.7557Z" stroke="#34679A" stroke-width="1.5" stroke-linejoin="round" />
                                                </svg>
                                                (+84) 0918 918 755
                                            </a>
                                        </div>
                                        <div class="tp-team-details-info-social">
                                            <div class="tp-footer-widget-social">
                                                <a href="https://www.facebook.com/aicontrol.vn">
                                                    <span>
                                                        <img src="{{ asset('assets/AIcontrol_imgs/sociallogo/facebook_aicontrol.svg') }}" alt="Facebook" width="18" height="18" />
                                                        
                                                    </span>
                                                </a>
                                                <a href="#">
                                                    <span>
                                                        <img src="{{ asset('assets/AIcontrol_imgs/sociallogo/zalo_aicontrol.webp') }}" alt="Zalo" width="18" height="18" />
                                                    </span>
                                                </a>
                                                <a href="#">
                                                    <span>
                                                         <img src="{{ asset('assets/AIcontrol_imgs/sociallogo/youtube_aicontrol.svg') }}" alt="Youtube" width="18" height="18" />
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="tp-team-details-wrapper">
                                    <div class="tp-team-details-text">
                                        <h1 class="tp-team-details-text-title" style="font-size: 70px;">{{ __('cp_electronics.title') }}</h1>
                                        <p>{{ __('cp_electronics.description_1') }}</p>
                                        <p>{{ __('cp_electronics.description_2') }}</p>
                                    </div>
                                    <div class="tp-team-details-more mb-50">
                                        <h3 class="tp-team-details-more-title">{{ __('cp_electronics.advantages_title') }}</h3>
                                        <ul>
                                            <li>{{ __('cp_electronics.advantage_1') }}</li>
                                            <li>{{ __('cp_electronics.advantage_2') }}</li>
                                            <li>{{ __('cp_electronics.advantage_3') }}</li>
                                            <li>{{ __('cp_electronics.advantage_4') }}</li>
                                        </ul>
                                    </div>
                                    <div class="tp-team-details-more mb-50">
                                        <h3 class="tp-team-details-more-title">{{ __('cp_electronics.applications_title') }}</h3>
                                        <ul>
                                            <li>{{ __('cp_electronics.application_1') }}</li>
                                            <li>{{ __('cp_electronics.application_2') }}</li>
                                            <li>{{ __('cp_electronics.application_3') }}</li>
                                            <li>{{ __('cp_electronics.application_4') }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- team details area end -->
                 <!-- padding area start -->
                <div class="tp-service-4-padding-area pb-100" data-bg-color="#F6F8EF">
                    <!-- service area end -->
                    <div class="dgm-service-area dgm-service-radius pt-120 z-index-1">
                        <div class="container container-1230">
                            <div class="row">
                                <div class="col-xl-7">
                                    <div class="dgm-service-title-box service-4-heading z-index-1 mb-70">
                                        <span class="tp-section-subtitle subtitle-grey mb-15 text-black tp_fade_anim" data-delay=".3">{{ __('cp_electronics.solutions_section_subtitle') }}</span>
                                        <h2 class="tp-section-title-grotesk text-black tp_fade_anim" data-delay=".5">
                                            {{ __('cp_electronics.solutions_section_title') }}
                                            <span class="p-relative">
                                                {{-- Cp Electronics --}}
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
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <div class="dgm-service-wrap dgm-service-white">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="dgm-service-item p-relative tp_fade_anim">
                                            <div class="dgm-service-bg">
                                                <img src="{{ asset('assets/AIcontrol_imgs/Partners/hover_background.png') }}" alt="">
                                            </div>
                                            <div class="row align-items-center">
                                                <div class="col-lg-5">
                                                    <div class="dgm-service-content-left black-text d-inline-flex align-items-center">
                                                        <span class="">01</span>
                                                        <h3 class="dgm-service-title-sm "><a href="{{ route(current_locale() . '.solution.lighting') }}">{{ __('cp_electronics.solution_1_title') }}</a>
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="dgm-service-content-right black-text d-flex align-items-center justify-content-between">
                                                        <p>{{ __('cp_electronics.solution_1_description') }}</p> 
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
                                                <img src="{{ asset('assets/AIcontrol_imgs/Partners/hover_background.png') }}" alt="">
                                            </div>
                                            <div class="row align-items-center">
                                                <div class="col-lg-5">
                                                    <div class="dgm-service-content-left black-text d-inline-flex align-items-center">
                                                        <span>02</span>
                                                        <h3 class="dgm-service-title-sm"><a href="{{ route(current_locale() . '.solution.hvac') }}">{{ __('cp_electronics.solution_2_title') }}</a></h3>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="dgm-service-content-right black-text d-flex align-items-center justify-content-between">
                                                        <p>{{ __('cp_electronics.solution_2_description') }}</p>
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
                                                <img src="{{ asset('assets/AIcontrol_imgs/Partners/hover_background.png') }}" alt="">
                                            </div>
                                            <div class="row align-items-center">
                                                <div class="col-lg-5">
                                                    <div class="dgm-service-content-left black-text d-inline-flex align-items-center">
                                                        <span>03</span>
                                                        <h3 class="dgm-service-title-sm"><a href="{{ route(current_locale() . '.solution.hvac') }}">{{ __('cp_electronics.solution_3_title') }}</a></h3>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="dgm-service-content-right black-text d-flex align-items-center justify-content-between">
                                                        <p>{{ __('cp_electronics.solution_3_description') }}</p>
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
                                                <img src="{{ asset('assets/AIcontrol_imgs/Partners/hover_background.png') }}" alt="">
                                            </div>
                                            <div class="row align-items-center">
                                                <div class="col-lg-5">
                                                    <div class="dgm-service-content-left black-text d-inline-flex align-items-center">
                                                        <span>04</span>
                                                        <h3 class="dgm-service-title-sm"><a href="{{ route(current_locale() . '.solution.security') }}">{{ __('cp_electronics.solution_4_title') }}</a></h3>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="dgm-service-content-right black-text d-flex align-items-center justify-content-between">
                                                        <p>{{ __('cp_electronics.solution_4_description') }}  </p>
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
                                        <div class="dgm-service-item p-relative tp_fade_anim">
                                            <div class="dgm-service-bg">
                                                <img src="{{ asset('assets/AIcontrol_imgs/Partners/hover_background.png') }}" alt="">
                                            </div>
                                            <div class="row align-items-center">
                                                <div class="col-lg-5">
                                                    <div class="dgm-service-content-left black-text d-inline-flex align-items-center">
                                                        <span>05</span>
                                                        <h3 class="dgm-service-title-sm"><a href="{{ route(current_locale() . '.solution.bms') }}">{{ __('cp_electronics.solution_5_title') }}</a></h3>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="dgm-service-content-right black-text d-flex align-items-center justify-content-between">
                                                        <p>{{ __('cp_electronics.solution_5_description') }}</p>
                                                        <a class="dgm-service-link" href="service-details-light.html">
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
                </div>
                <!-- padding area end -->


                
                <!-- blog area start -->
                <div class="ar-blog-area pb-100 pt-120">
                    <div class="container container-1430">
                        <div class="ar-blog-title-wrap ar-title-mlr mb-60">
                            <div class="row align-items-end">
                                <div class="col-xl-8 col-lg-8 col-md-7">
                                    <div class="ar-blog-title-box">
                                        <h3 class="tp-section-title-clash-600 fs-60 mb-0 tp_fade_anim" data-delay=".4">{{ __('cp_electronics.blog_title') }}</h3>
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
                                            <a class="tp-btn-red-circle-text" href="{{ route(current_locale() . '.blog.index') }}">{{ __('cp_electronics.blog_view_all') }}</a>
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
                                    <p class="text-center text-muted">{{ __('cp_electronics.blog_no_posts') }}</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <!-- blog area end -->



            </main>
            <!-- main area end -->
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