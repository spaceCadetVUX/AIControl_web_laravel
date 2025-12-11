<!doctype html>
<html class="no-js" lang="vi">

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Giải pháp BMS | Hệ thống quản lý tòa nhà thông minh | AIControl Việt Nam</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Hệ thống BMS (Building Management System) – giải pháp quản lý tòa nhà thông minh giúp giám sát HVAC, chiếu sáng, năng lượng, an ninh và các hệ thống kỹ thuật. AIControl Việt Nam là đơn vị tư vấn, tích hợp và triển khai BMS hàng đầu.">
    <meta name="keywords" content="BMS, hệ thống BMS, Building Management System, quản lý tòa nhà thông minh, HVAC, điều khiển chiếu sáng, giám sát năng lượng, AIControl, giải pháp tòa nhà, automation, smart building">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/AIcontrol_imgs/small_logo.png') }}">
    <!-- Canonical URL -->
    <link rel="canonical" href="https://aicontrol.vn/bms">

    <!-- Open Graph for Facebook -->
    <meta property="og:title" content="Giải pháp BMS | Hệ thống quản lý tòa nhà thông minh | AIControl Việt Nam">
    <meta property="og:description" content="AIControl Việt Nam cung cấp giải pháp BMS toàn diện: HVAC, chiếu sáng, an ninh, năng lượng và tự động hóa tích hợp cho tòa nhà thông minh.">
    <meta property="og:url" content="https://aicontrol.vn/bms">
    <meta property="og:site_name" content="AIControl Việt Nam">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://aicontrol.vn/assets/img/seo/bms-system.jpg">

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
                        <div class="dgm-hero-bg" data-background="assets/img/home-03/hero/hero-bg-shape.png"></div>
                        <div class="dgm-hero-rotate-text">
                            <span>Tích hợp • Giám sát • Tối ưu hóa</span>
                        </div>
                        {{-- <div class="dgm-hero-social-box">
                            <div class="dgm-hero-social-text">
                                <span>Follow</span>
                            </div>
                            <div class="dgm-hero-social">
                                <a href="#">
                                    <span>
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9 0C4.02948 0 0 4.02948 0 9C0 13.2206 2.90592 16.7623 6.82596 17.735V11.7504H4.97016V9H6.82596V7.81488C6.82596 4.75164 8.21232 3.3318 11.2198 3.3318C11.79 3.3318 12.7739 3.44376 13.1764 3.55536V6.04836C12.964 6.02604 12.595 6.01488 12.1367 6.01488C10.661 6.01488 10.0908 6.57396 10.0908 8.02728V9H13.0306L12.5255 11.7504H10.0908V17.9341C14.5472 17.3959 18.0004 13.6015 18.0004 9C18 4.02948 13.9705 0 9 0Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                </a>
                                <a href="#">
                                    <span>
                                        <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.7447 0.427734H16.2748L10.7473 6.74535L17.25 15.3422H12.1584L8.17053 10.1283L3.60746 15.3422H1.07582L6.98808 8.58481L0.75 0.427734H5.97083L9.57555 5.19348L13.7447 0.427734ZM12.8567 13.8278H14.2587L5.20905 1.86258H3.7046L12.8567 13.8278Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                </a>
                                <a href="#">
                                    <span>
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9 1.6207C11.4047 1.6207 11.6895 1.63125 12.6352 1.67344C13.5141 1.71211 13.9887 1.85977 14.3051 1.98281C14.7234 2.14453 15.0258 2.34141 15.3387 2.6543C15.6551 2.9707 15.8484 3.26953 16.0102 3.68789C16.1332 4.0043 16.2809 4.48242 16.3195 5.35781C16.3617 6.30703 16.3723 6.5918 16.3723 8.99297C16.3723 11.3977 16.3617 11.6824 16.3195 12.6281C16.2809 13.507 16.1332 13.9816 16.0102 14.298C15.8484 14.7164 15.6516 15.0187 15.3387 15.3316C15.0223 15.648 14.7234 15.8414 14.3051 16.0031C13.9887 16.1262 13.5105 16.2738 12.6352 16.3125C11.6859 16.3547 11.4012 16.3652 9 16.3652C6.59531 16.3652 6.31055 16.3547 5.36484 16.3125C4.48594 16.2738 4.01133 16.1262 3.69492 16.0031C3.27656 15.8414 2.97422 15.6445 2.66133 15.3316C2.34492 15.0152 2.15156 14.7164 1.98984 14.298C1.8668 13.9816 1.71914 13.5035 1.68047 12.6281C1.63828 11.6789 1.62773 11.3941 1.62773 8.99297C1.62773 6.58828 1.63828 6.30351 1.68047 5.35781C1.71914 4.47891 1.8668 4.0043 1.98984 3.68789C2.15156 3.26953 2.34844 2.96719 2.66133 2.6543C2.97773 2.33789 3.27656 2.14453 3.69492 1.98281C4.01133 1.85977 4.48945 1.71211 5.36484 1.67344C6.31055 1.63125 6.59531 1.6207 9 1.6207ZM9 0C6.55664 0 6.25078 0.0105469 5.29102 0.0527344C4.33477 0.0949219 3.67734 0.249609 3.10781 0.471094C2.51367 0.703125 2.01094 1.00898 1.51172 1.51172C1.00898 2.01094 0.703125 2.51367 0.471094 3.1043C0.249609 3.67734 0.0949219 4.33125 0.0527344 5.2875C0.0105469 6.25078 0 6.55664 0 9C0 11.4434 0.0105469 11.7492 0.0527344 12.709C0.0949219 13.6652 0.249609 14.3227 0.471094 14.8922C0.703125 15.4863 1.00898 15.9891 1.51172 16.4883C2.01094 16.9875 2.51367 17.2969 3.1043 17.5254C3.67734 17.7469 4.33125 17.9016 5.2875 17.9437C6.24727 17.9859 6.55312 17.9965 8.99648 17.9965C11.4398 17.9965 11.7457 17.9859 12.7055 17.9437C13.6617 17.9016 14.3191 17.7469 14.8887 17.5254C15.4793 17.2969 15.982 16.9875 16.4813 16.4883C16.9805 15.9891 17.2898 15.4863 17.5184 14.8957C17.7398 14.3227 17.8945 13.6687 17.9367 12.7125C17.9789 11.7527 17.9895 11.4469 17.9895 9.00352C17.9895 6.56016 17.9789 6.2543 17.9367 5.29453C17.8945 4.33828 17.7398 3.68086 17.5184 3.11133C17.2969 2.51367 16.991 2.01094 16.4883 1.51172C15.9891 1.0125 15.4863 0.703125 14.8957 0.474609C14.3227 0.253125 13.6688 0.0984375 12.7125 0.05625C11.7492 0.0105469 11.4434 0 9 0Z" fill="currentColor" />
                                            <path d="M9 4.37695C6.44766 4.37695 4.37695 6.44766 4.37695 9C4.37695 11.5523 6.44766 13.623 9 13.623C11.5523 13.623 13.623 11.5523 13.623 9C13.623 6.44766 11.5523 4.37695 9 4.37695ZM9 11.9988C7.34414 11.9988 6.00117 10.6559 6.00117 9C6.00117 7.34414 7.34414 6.00117 9 6.00117C10.6559 6.00117 11.9988 7.34414 11.9988 9C11.9988 10.6559 10.6559 11.9988 9 11.9988Z" fill="currentColor" />
                                            <path d="M14.8852 4.19411C14.8852 4.79177 14.4 5.27341 13.8059 5.27341C13.2082 5.27341 12.7266 4.78825 12.7266 4.19411C12.7266 3.59645 13.2117 3.11481 13.8059 3.11481C14.4 3.11481 14.8852 3.59997 14.8852 4.19411Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                </a>
                                <a href="#">
                                    <span>
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9 0C4.03145 0 0 4.03145 0 9C0 13.9686 4.03145 18 9 18C13.9588 18 18 13.9686 18 9C18 4.03145 13.9588 0 9 0ZM14.9447 4.14859C16.0184 5.45662 16.6627 7.12581 16.6822 8.93166C16.4284 8.88289 13.8904 8.3655 11.333 8.68764C11.2744 8.56074 11.2256 8.42406 11.167 8.28743C11.0108 7.91651 10.8352 7.53581 10.6594 7.17463C13.4902 6.0228 14.7787 4.36334 14.9447 4.14859ZM9 1.32755C10.9523 1.32755 12.7386 2.05966 14.0955 3.26031C13.9588 3.45553 12.7972 5.00759 10.064 6.03253C8.80476 3.71909 7.40891 1.82538 7.19415 1.53254C7.77004 1.39588 8.37529 1.32755 9 1.32755ZM5.72996 2.04989C5.93494 2.32321 7.30153 4.22668 8.58026 6.49131C4.98807 7.44795 1.81562 7.42843 1.47397 7.42843C1.9718 5.04664 3.58243 3.06507 5.72996 2.04989ZM1.30803 9.00979C1.30803 8.93166 1.30803 8.85358 1.30803 8.77551C1.63991 8.78524 5.36876 8.83406 9.20498 7.68223C9.42953 8.1117 9.6345 8.55096 9.82974 8.99021C9.73209 9.01952 9.62471 9.04882 9.52712 9.07807C5.56399 10.3568 3.45553 13.8514 3.27982 14.1442C2.05965 12.7874 1.30803 10.9816 1.30803 9.00979ZM9 16.692C7.2234 16.692 5.58352 16.0868 4.28525 15.0716C4.42191 14.7885 5.98371 11.782 10.3178 10.269C10.3373 10.2592 10.3471 10.2592 10.3666 10.2495C11.4501 13.051 11.8894 15.4034 12.0065 16.077C11.0792 16.4772 10.064 16.692 9 16.692ZM13.2852 15.3742C13.2072 14.9056 12.7972 12.6605 11.7917 9.89803C14.2028 9.51733 16.3113 10.1421 16.5749 10.23C16.243 12.3677 15.013 14.2126 13.2852 15.3742Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div> --}}
                        <div class="container container-1430">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="dgm-hero-content mb-120">
                                        <span class="dgm-hero-subtitle tp_fade_anim" data-delay=".3">Giải Pháp BMS Toàn Diện</span>
                                        <h1 class="dgm-hero-title tp_fade_anim" data-delay=".5">
                                            HỆ THỐNG QUẢN LÝ <br>TÒA NHÀ THÔNG MINH<span class="heading-h1-highlight"> BMS</span>
                                        </h1>
                                        <div class="tp_fade_anim" data-delay=".7">
                                            <a class="tp-btn-black-square" href="{{ route('contact') }}">
                                                <span>
                                                    <span class="text-1">Tư Vấn Miễn Phí</span>
                                                    <span class="text-2">Tư Vấn Miễn Phí</span>
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
                                                    <p>Tiết kiệm chi phí <br> vận hành năng lượng</p>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6">
                                                <div class="dgm-hero-funfact tp_fade_anim mb-40" data-delay=".9" data-fade-from="top" data-ease="bounce">
                                                    <span><i data-purecounter-duration="1" data-purecounter-end="100" class="purecounter">0</i>+</span>
                                                    <p>Dự án BMS <br> triển khai thành công</p>
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
                              
                                <p>Giải pháp BMS hàng đầu Việt Nam</p>
                                <a class="dgm-hero-arrow" href="{{ route('contact') }}">
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
                                    <img class="tp_fade_anim" data-delay=".3" data-fade-from="left" src="{{ asset('assets/AIcontrol_imgs/bms/lutron.jpg') }}" alt="">
                                    
                                </div>
                                
                            </div>
                            <div class="col-lg-6">
                                <div class="dgm-about-right">
                                    <div class="dgm-about-title-box z-index-1 mb-35">
                                        <span class="tp-section-subtitle subtitle-black mb-15 tp_fade_anim" data-delay=".3">Về Hệ Thống BMS</span>
                                        <h4 class="tp-section-title-grotesk tp_fade_anim" data-delay=".5">
                                            Giải pháp
                                            <span class="p-relative">
                                                quản lý tòa nhà
                                                <span class="tp-section-title-shape">
                                                    <svg width="280" height="15" viewBox="0 0 280 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M157.643 0.463566C152.553 0.665187 132.813 1.06843 113.879 1.37086C64.4049 2.12693 43.5474 2.7822 26.6628 3.94151C13.5027 4.8488 1.02542 6.15933 0.342587 6.71379C0.218435 6.8146 0.094283 8.07472 0.0322071 9.48606C-0.0919446 11.7543 0.094283 12.1575 1.45995 12.964C2.32901 13.4681 3.50846 13.9721 4.00506 14.1233C4.87413 14.3753 38.5193 12.8632 46.527 12.2079C50.0654 11.9559 159.009 10.847 185.577 10.7966C195.137 10.7966 217.36 11.099 234.927 11.5023C252.495 11.9055 268.386 12.1575 270.186 12.1071C274.656 12.0063 278.629 10.2421 278.815 8.32675C278.877 7.16743 278.691 6.96581 277.263 6.91541C275.711 6.865 275.711 6.8146 277.636 6.46176C280.305 5.95771 280.615 5.65528 279.063 4.94961C277.573 4.29435 277.325 3.43746 278.691 3.43746C279.187 3.43746 279.622 3.18544 279.622 2.93341C279.622 2.63098 279.312 2.42936 278.877 2.42936C278.505 2.42936 276.891 1.92531 275.339 1.32045L272.483 0.211542L219.719 0.161136C190.729 0.110732 162.795 0.261946 157.643 0.463566ZM200.475 2.47977C200.848 2.68139 204.572 2.88301 208.855 2.88301C213.139 2.93341 221.209 3.13503 226.857 3.38706C235.858 3.7903 234.865 3.8407 218.788 3.63908C208.731 3.53827 192.281 3.43746 182.225 3.43746C172.169 3.43746 164.099 3.33665 164.223 3.23584C164.409 3.08463 171.3 2.93341 179.556 2.88301C187.812 2.7822 194.888 2.58058 195.323 2.32855C196.254 1.87491 199.544 1.92531 200.475 2.47977ZM264.538 3.28625C263.296 3.38706 261.31 3.38706 260.192 3.28625C259.137 3.18544 260.192 3.08463 262.551 3.08463C264.972 3.08463 265.841 3.18544 264.538 3.28625ZM128.095 3.63908C127.971 3.73989 113.631 3.89111 96.1877 3.99192C78.8065 4.14313 68.8744 4.09273 74.1508 3.94151C85.2624 3.58868 128.467 3.33665 128.095 3.63908ZM159.009 3.73989C158.822 3.89111 158.264 3.94151 157.829 3.7903C157.332 3.63908 157.519 3.48787 158.202 3.48787C158.884 3.43746 159.257 3.58868 159.009 3.73989ZM268.759 7.01622C269.193 7.36905 267.393 7.46986 263.172 7.41946C259.758 7.31865 247.591 7.31865 236.169 7.36905C224.747 7.41946 213.822 7.36905 211.959 7.26824C206.435 6.91541 176.576 6.865 154.229 7.11703C131.261 7.41946 129.833 7.16743 150.815 6.51217C169.624 5.90731 267.952 6.36095 268.759 7.01622ZM118.845 7.52027C100.099 7.92351 80.7929 7.92351 85.3245 7.46986C87.1867 7.26824 98.7949 7.11703 111.086 7.11703C132.999 7.16743 133.185 7.16743 118.845 7.52027ZM200.786 7.97391C200.786 8.22594 200.351 8.32675 199.854 8.17553C199.358 7.97391 198.923 7.77229 198.923 7.67148C198.923 7.57067 199.358 7.46986 199.854 7.46986C200.351 7.46986 200.786 7.67148 200.786 7.97391ZM202.648 7.97391C202.648 8.22594 202.338 8.47796 201.965 8.47796C201.655 8.47796 201.531 8.22594 201.717 7.97391C201.903 7.67148 202.213 7.46986 202.4 7.46986C202.524 7.46986 202.648 7.67148 202.648 7.97391ZM207.304 7.97391C207.49 8.22594 207.242 8.47796 206.745 8.47796C206.186 8.47796 205.752 8.22594 205.752 7.97391C205.752 7.67148 206 7.46986 206.31 7.46986C206.683 7.46986 207.117 7.67148 207.304 7.97391ZM266.276 8.47796C267.393 8.8812 267.393 8.93161 265.965 8.8812C265.096 8.8812 263.606 8.67958 262.551 8.47796L260.689 8.07472H262.862C264.041 8.07472 265.593 8.22594 266.276 8.47796ZM122.694 8.8308C113.383 8.93161 98.2983 8.93161 89.1732 8.8308C80.048 8.78039 87.6833 8.72999 106.12 8.72999C124.556 8.72999 132.006 8.78039 122.694 8.8308ZM5.86734 10.4942C5.86734 10.7462 4.9362 10.9982 3.88091 10.9478C2.14279 10.9478 2.01864 10.847 3.07393 10.4942C4.81205 9.8893 5.86734 9.8893 5.86734 10.4942ZM15.7374 10.1917C15.6133 10.2925 13.3785 10.4942 10.8334 10.6454C7.79169 10.847 6.4881 10.7966 7.10886 10.4942C7.97792 10.0405 16.3582 9.73809 15.7374 10.1917ZM258.392 11.351C257.461 11.4519 255.785 11.4519 254.667 11.351C253.55 11.2502 254.295 11.1494 256.344 11.1494C258.392 11.1494 259.323 11.2502 258.392 11.351Z" fill="url(#paint0_linear_5012_164)" />
                                                        <defs>
                                                            <linearGradient id="paint0_linear_5012_164" x1="53.5" y1="18.1094" x2="56.4335" y2="31.6184" gradientUnits="userSpaceOnUse">
                                                                <stop offset="1" stop-color="#43E508" />
                                                                <stop offset="1" stop-color="#F7EF33" />
                                                            </linearGradient>
                                                        </defs>
                                                    </svg>
                                                </span>
                                            </span>
                                            thông minh toàn diện.
                                        </h4>
                                    </div>
                                    <div class="dgm-about-content">
                                        <div class="tp_fade_anim" data-delay=".3">
                                            <p>
                                                <strong>BMS (Building Management System)</strong> là hệ thống quản lý tòa nhà thông minh tích hợp, giúp giám sát và điều khiển tập trung các hệ thống kỹ thuật như HVAC, chiếu sáng, an ninh, báo cháy và năng lượng. AIControl Việt Nam cung cấp giải pháp BMS toàn diện với công nghệ tiên tiến, giúp tối ưu hóa vận hành, tiết kiệm năng lượng và nâng cao hiệu quả quản lý tòa nhà.
                                            </p>
                                        </div>
                                        {{-- <div class="tp_fade_anim" data-delay=".5">
                                            <a class="tp-btn-yellow-green green-solid btn-60 mb-50" href="{{ route('contact') }}">
                                                <span>
                                                    <span class="text-1">Tìm Hiểu Thêm</span>
                                                    <span class="text-2">Tìm Hiểu Thêm</span>
                                                </span>
                                                <i>
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 11L11 1M11 1H1M11 1V11" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 11L11 1M11 1H1M11 1V11" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </i>
                                            </a>
                                        </div> --}}
                                        <div class="dgm-about-review-wrap tp_fade_anim" data-delay=".6">
                                            <div class="dgm-about-review-box d-inline-flex align-items-center">
                                                <div class="dgm-about-review">
                                                    <h4>4.9</h4>
                                                    <span>( 100+ dự án )</span>
                                                </div>
                                                <div class="dgm-about-ratting">
                                                    <h4>Đánh Giá Trung Bình</h4>
                                                    <div class="dgm-about-ratting-icon">
                                                        <span>
                                                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M6.99993 0L8.98311 4.27038L13.6573 4.83688L10.2088 8.04262L11.1144 12.6631L6.99993 10.374L2.88543 12.6631L3.79106 8.04262L0.342529 4.83688L5.01674 4.27038L6.99993 0Z" fill="currentcolor" />
                                                            </svg>
                                                        </span>
                                                        <span>
                                                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M6.99993 0L8.98311 4.27038L13.6573 4.83688L10.2088 8.04262L11.1144 12.6631L6.99993 10.374L2.88543 12.6631L3.79106 8.04262L0.342529 4.83688L5.01674 4.27038L6.99993 0Z" fill="currentcolor" />
                                                            </svg>
                                                        </span>
                                                        <span>
                                                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M6.99993 0L8.98311 4.27038L13.6573 4.83688L10.2088 8.04262L11.1144 12.6631L6.99993 10.374L2.88543 12.6631L3.79106 8.04262L0.342529 4.83688L5.01674 4.27038L6.99993 0Z" fill="currentcolor" />
                                                            </svg>
                                                        </span>
                                                        <span>
                                                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M6.99993 0L8.98311 4.27038L13.6573 4.83688L10.2088 8.04262L11.1144 12.6631L6.99993 10.374L2.88543 12.6631L3.79106 8.04262L0.342529 4.83688L5.01674 4.27038L6.99993 0Z" fill="currentcolor" />
                                                            </svg>
                                                        </span>
                                                        <span>
                                                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M6.99993 0L8.98311 4.27038L13.6573 4.83688L10.2088 8.04262L11.1144 12.6631L6.99993 10.374L2.88543 12.6631L3.79106 8.04262L0.342529 4.83688L5.01674 4.27038L6.99993 0Z" fill="currentcolor" />
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
                <!-- about area end -->

                <!-- step area start -->
                <div class="dgm-step-area pb-50 body-padding">
                    <div class="container container-1230">
                        <div class="row align-items-end">
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="dgm-step-item p-relative dgm-step-space-1 mb-80">
                                    <h4 class="dgm-step-title mb-25 pb-70">Quy trình <br> triển khai BMS</h4>
                                    {{-- <a class="tp-btn-yellow-green green-solid" href="{{ route('contact') }}">
                                        <i>
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2.4221 8.95389C1.66368 7.63144 1.29748 6.55158 1.07667 5.45697C0.750098 3.83806 1.49745 2.25665 2.7355 1.24758C3.25876 0.821106 3.85858 0.966814 4.168 1.52192L4.86655 2.77513C5.42023 3.76845 5.69707 4.26511 5.64216 4.79167C5.58725 5.31823 5.21389 5.74709 4.46718 6.6048L2.4221 8.95389ZM2.4221 8.95389C3.9572 11.6306 6.36627 14.041 9.04611 15.5779M9.04611 15.5779C10.3686 16.3363 11.4484 16.7025 12.543 16.9233C14.1619 17.2499 15.7434 16.5026 16.7524 15.2645C17.1789 14.7412 17.0332 14.1414 16.4781 13.832L15.2249 13.1335C14.2315 12.5798 13.7349 12.3029 13.2083 12.3578C12.6818 12.4127 12.2529 12.7861 11.3952 13.5328L9.04611 15.5779Z" stroke="currentcolor" stroke-width="1.5" stroke-linejoin="round" />
                                                <path d="M10.6001 4.86548C11.7387 5.34899 12.6511 6.26142 13.1346 7.4M11.1233 1C13.9531 1.81661 16.1834 4.04682 17.0001 6.8765" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" />
                                            </svg>
                                        </i>
                                        <span>
                                            <span class="text-1">Liên Hệ Tư Vấn</span>
                                            <span class="text-2">Liên Hệ Tư Vấn</span>
                                        </span>
                                    </a> --}}
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="dgm-step-item p-relative dgm-step-space-2 mb-80">
                                    <span class="dgm-step-number">01</span>
                                    <h4 class="dgm-step-title-sm">Khảo Sát & Tư Vấn</h4>
                                    <p>
                                        Đánh giá hiện trạng, phân tích nhu cầu và đề xuất giải pháp BMS phù hợp nhất
                                    </p>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="dgm-step-item p-relative dgm-step-space-3 mb-80">
                                    <span class="dgm-step-number">02</span>
                                    <h4 class="dgm-step-title-sm">Thiết Kế & Lập Trình</h4>
                                    <p>
                                        Thiết kế sơ đồ hệ thống, lập trình giao diện và tích hợp các thiết bị
                                    </p>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="dgm-step-item p-relative dgm-step-space-4 mb-80">
                                    <span class="dgm-step-number">03</span>
                                    <h4 class="dgm-step-title-sm">Lắp Đặt & Vận Hành</h4>
                                    <p>
                                        Triển khai hệ thống, kiểm thử, đào tạo và bàn giao đưa vào sử dụng
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
                                    <span class="tp-section-subtitle subtitle-grey mb-15 text-white tp_fade_anim" data-delay=".3">Các Tính Năng Chính</span>
                                    <h4 class="tp-section-title-grotesk text-white tp_fade_anim" data-delay=".5">
                                        Tối ưu hóa quản lý qua
                                        <span class="p-relative">
                                            giải pháp
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
                                                    <h4 class="dgm-service-title-sm"><a href="{{ route('hvacControl') }}">Quản Lý <br> HVAC</a>
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="dgm-service-content-right d-flex align-items-center justify-content-between">
                                                    <p>Giám sát và điều khiển hệ thống điều hòa, thông gió <br> và làm mát tự động, tiết kiệm năng lượng</p>
                                                    <a class="dgm-service-link" href="{{ route('hvacControl') }}">
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
                                                    <h4 class="dgm-service-title-sm"><a href="{{ route('lightingControl') }}">Điều Khiển <br> Chiếu Sáng</a></h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="dgm-service-content-right d-flex align-items-center justify-content-between">
                                                    <p>Tự động hóa hệ thống chiếu sáng thông minh, <br> tối ưu hóa tiêu thụ điện năng và cải thiện tiện nghi</p>
                                                    <a class="dgm-service-link" href="{{ route('lightingControl') }}">
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
                                                    <h4 class="dgm-service-title-sm"><a href="{{ route('contact') }}">Quản Lý <br> Năng Lượng</a></h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="dgm-service-content-right d-flex align-items-center justify-content-between">
                                                    <p>Theo dõi tiêu thụ năng lượng thời gian thực, <br> phân tích và tối ưu hóa hiệu suất sử dụng</p>
                                                    <a class="dgm-service-link" href="{{ route('contact') }}">
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
                                                    <h4 class="dgm-service-title-sm"><a href="{{ route('security') }}">Hệ Thống <br> An Ninh</a></h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="dgm-service-content-right d-flex align-items-center justify-content-between">
                                                    <p>Tích hợp kiểm soát ra vào, camera giám sát, <br> báo cháy và các hệ thống an ninh khác</p>
                                                    <a class="dgm-service-link" href="{{ route('security') }}">
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
                                            Dự án BMS
                                            <span class="p-relative">
                                                tiêu biểu
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
                                            Khám phá các dự án BMS thành công mà AIControl đã triển khai
                                            tại các tòa nhà văn phòng, khách sạn, trung tâm thương mại và 
                                            khu công nghiệp trên toàn quốc.
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
                    <div class="dgm-project-slider-wrap">
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
                    </div>
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