<!doctype html>
<html class="no-js" lang="{{ current_locale() }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <base href="{{ url('/') }}/">
    <title>{{ __('security.meta_title') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ✅ Mô tả trang -->
    <meta name="description" content="{{ __('security.meta_description') }}">

    <!-- ✅ Từ khóa (keywords) -->
    <meta name="keywords" content="{{ __('security.meta_keywords') }}">

    <!-- ✅ Canonical URL -->
    <link rel="canonical" href="https://www.aicontrol.vn/he-thong-an-ninh.html">

    <!-- ✅ Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/AIcontrol_imgs/small_logo.png') }}">

    <!-- ✅ Open Graph cho chia sẻ mạng xã hội -->
    <meta property="og:title" content="{{ __('security.og_title') }}">
    <meta property="og:description" content="{{ __('security.og_description') }}">
    <meta property="og:image" content="https://www.aicontrol.vn/assets/img/og/aicontrol-security.jpg">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- ✅ Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ __('security.og_title') }}">
    <meta name="twitter:description" content="{{ __('security.og_description') }}">
    <meta name="twitter:image" content="https://www.aicontrol.vn/assets/img/og/aicontrol-security.jpg">

    <!-- Place favicon.ico in the root directory -->


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
                                        {{ __('security.hero_title_line1') }}<br>
                                        <span class="heading-h1-highlight">{{ __('security.hero_title_line2') }}</span>
                                        </h1>
                                        <div class="heading-h1-box d-flex justify-content-end">
                                            <p>{{ __('security.hero_description') }}</p>
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
                        <img class="w-100" src="{{ asset('assets/AIcontrol_imgs/Security_solutions/imgs/securityBanner.jpg') }}" alt="Kiểm soát hệ hống an ninh. AI control" data-speed=".8">
                    </div>
                </div>
                <!-- banner area end -->


                <!-- funcions area start -->
                <section class="tp-benefit-ptb pt-100 pb-160">
                    <div class="container container-1230">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tp-benefit-heading mb-85">
                                    <div class="ar-about-us-4-title-box tp_fade_anim d-flex align-items-center mb-15">
                                        <span class="tp-section-subtitle pre">{{ __('security.features_subtitle') }}</span>
                                        <div class="ar-about-us-4-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="81" height="9" viewBox="0 0 81 9" fill="none">
                                                <rect y="4" width="80" height="1" fill="#111013" />
                                                <path d="M77 7.96366L80.5 4.48183L77 1" stroke="#111013" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </div>
                                    <h2 class="tp-section-title lts tp_fade_anim">{!! __('security.features_title') !!}</h2>
                                </div>
                            </div>
                        </div>  
                        <div class="tp-benefit-box">
                            <div class="row gx-0">
                                <div class="col-lg-3 col-md-6">
                                    <div class="tp-benefit-item tp-benefit-borber-bottom">
                                        <div class="tp-benefit-item-icon">
                                            <img src="{{ asset('assets/AIcontrol_imgs/Security_solutions/icons/icon1.svg') }}" alt="Icon cường di chuyển">
                                        </div>
                                        <h3 class="tp-benefit-item-title">{{ __('security.feature1') }}</h3>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 ">
                                    <div class="tp-benefit-item tp-benefit-borber-bottom">
                                        <div class="tp-benefit-item-icon pb-30">
                                            <img src="{{ asset('assets/AIcontrol_imgs/Security_solutions/icons/icon2.svg') }}" alt="Icon nhiệt cảm biến khói">
                                        </div>
                                        <h4 class="tp-benefit-item-title">{{ __('security.feature2') }}</h4>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="tp-benefit-item tp-benefit-borber-bottom">
                                        <div class="tp-benefit-item-icon pb-30">
                                            <img src="{{ asset('assets/AIcontrol_imgs/Security_solutions/icons/icon3.svg') }}" alt="Icon doorbell">
                                        </div>
                                        <h3 class="tp-benefit-item-title">{{ __('security.feature3') }}</h3>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="tp-benefit-item tp-benefit-borber-bottom">
                                        <div class="tp-benefit-item-icon pb-30">
                                            <img src="{{ asset('assets/AIcontrol_imgs/Security_solutions/icons/icon4.svg') }}" alt="Icon khóa thông minh">
                                        </div>
                                        <h3 class="tp-benefit-item-title">{{ __('security.feature4') }}</h3>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="tp-benefit-item br">
                                        <div class="tp-benefit-item-icon pb-30">
                                            <img src="{{ asset('assets/AIcontrol_imgs/Security_solutions/icons/icon5.svg') }}" alt="Icon kích hoạt cảnh">
                                        </div>
                                        <h3 class="tp-benefit-item-title">{{ __('security.feature5') }}</h3>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="tp-benefit-item br">
                                        <div class="tp-benefit-item-icon pb-30">
                                            <img src="{{ asset('assets/AIcontrol_imgs/Security_solutions/icons/icon6.svg') }}" alt="Icon phone">
                                        </div>
                                        <h3 class="tp-benefit-item-title">{{ __('security.feature6') }}</h3>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="tp-benefit-item br">
                                        <div class="tp-benefit-item-icon pb-30">
                                            <img src="{{ asset('assets/AIcontrol_imgs/Security_solutions/icons/icon7.svg') }}" alt="Icon mở rộng">
                                        </div>
                                        <h3 class="tp-benefit-item-title">{{ __('security.feature7') }}</h3>
                                            
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="tp-benefit-item">
                                        <div class="tp-benefit-item-icon pb-30">
                                            <img src="{{ asset('assets/AIcontrol_imgs/Security_solutions/icons/icon8.svg') }}" alt="Icon cửa">
                                        </div>
                                        <h3 class="tp-benefit-item-title">{{ __('security.feature8') }}</h3>
                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- functions area end -->


                
                <!-- portfolio details 3 portfolio-->
                <div class="tp-pd-3-portfolio-area pt-200 pb-80">
                    <div class="container container-1200">
                       
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tp-benefit-heading mb-85">
                                    <div class="ar-about-us-4-title-box tp_fade_anim d-flex align-items-center mb-15">
                                        <span class="tp-section-subtitle pre">{{ __('security.applications_subtitle') }}</span>
                                        <div class="ar-about-us-4-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="81" height="9" viewBox="0 0 81 9" fill="none">
                                                <rect y="4" width="80" height="1" fill="#111013" />
                                                <path d="M77 7.96366L80.5 4.48183L77 1" stroke="#111013" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </div>
                                    <h2 class="tp-section-title lts tp_fade_anim">{!! __('security.applications_title') !!}</h2>
                                </div>
                            </div>
                        </div>
                    
                        <!-- hvac type 1 start -->
                        <div class="tp-pd-3-portfolio-item-wrap">
                            <div class="tp-pd-3-portfolio-item mb-120">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="tp-pd-3-portfolio-thumb">
                                            <img class="w-100" src="{{ asset('assets/AIcontrol_imgs/Security_solutions/imgs/firesensor.jpg') }}" alt="báo khói">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="tp-pd-3-portfolio-content tp-pd-3-content-pin mt-20 ml-40">
                                            <span class="tp-section-subtitle pre">01</span>
                                            <h3 class="tp-pd-3-title">{{ __('security.app1_title') }}</h3>
                                            <div class="tp-pd-3-overview-text">
                                                <p>{{ __('security.app1_desc') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- hvac type 1 end -->
                         <!-- hvac type 2 start -->
                        <div class="tp-pd-3-portfolio-item-wrap pt-120">
                            <div class="tp-pd-3-portfolio-item mb-120">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="tp-pd-3-portfolio-content tp-pd-3-content-pin mt-20 mr-40">
                                            <span class="tp-section-subtitle pre">02</span>
                                            <h3 class="tp-pd-3-title">{{ __('security.app2_title') }}</h3>
                                            <div class="tp-pd-3-overview-text">
                                                <p>{{ __('security.app2_desc') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="tp-pd-3-portfolio-thumb">
                                            <img class="w-100" src="{{ asset('assets/AIcontrol_imgs/Security_solutions/imgs/motionsensor.jpg') }}" alt="máy lạnh âm trần">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- hvac type 2 start -->
                         <!-- hvac type 3 start -->
                        <div class="tp-pd-3-portfolio-item-wrap">
                            <div class="tp-pd-3-portfolio-item mb-120">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="tp-pd-3-portfolio-thumb">
                                            <img class="w-100" src="{{ asset('assets/AIcontrol_imgs/Security_solutions/imgs/cameradoorbell.jpg') }}" alt="máy lạnh áp trần">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="tp-pd-3-portfolio-content tp-pd-3-content-pin mt-20 ml-40">
                                            <span class="tp-section-subtitle pre">03</span>
                                            <h3 class="tp-pd-3-title">{{ __('security.app3_title') }}</h3>
                                            <div class="tp-pd-3-overview-text">
                                                <p>{{ __('security.app3_desc') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- hvac type 3 end -->

                    </div>
                </div>
                <!-- portfolio details 3 portfolio-->
                

                <!-- work area start -->
                <div class="tp-work-area pt-120 pb-145 tp-panel-pin-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 container-1230">
                                <div class="tp-work-title-box tp-panel-pin">
                                     <h2 class="tp-section-title lts tp_fade_anim">{!! __('security.benefits_title') !!}</h2>
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
                                            <h3 class="tp-work-title">{{ __('security.benefit1_title') }}</h3>
                                            <p>{{ __('security.benefit1_desc') }}</p>
                                        </div>
                                    </div>
                                    <div class="tp-work-item tp-panel-pin mb-15">
                                        <div class="tp-work-number p-relative">
                                            <span></span>
                                            <i>02</i>
                                        </div>
                                        <div class="tp-work-content">
                                            <h3 class="tp-work-title">{{ __('security.benefit2_title') }}</h3>
                                            <p>{{ __('security.benefit2_desc') }}</p>
                                        </div>
                                    </div>
                                    <div class="tp-work-item tp-panel-pin mb-15">
                                        <div class="tp-work-number p-relative">
                                            <span></span>
                                            <i>03</i>
                                        </div>
                                        <div class="tp-work-content">
                                            <h3 class="tp-work-title">{{ __('security.benefit3_title') }}</h3>
                                            <p>{{ __('security.benefit3_desc') }}</p>
                                        </div>
                                    </div>
                                    <div class="tp-work-item tp-panel-pin mb-15">
                                        <div class="tp-work-number p-relative">
                                            <span></span>
                                            <i>04</i>
                                        </div>
                                        <div class="tp-work-content">
                                            <h3 class="tp-work-title">{{ __('security.benefit4_title') }}</h3>
                                            <p>{{ __('security.benefit4_desc') }}</p>
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

              
                 
                <!-- blog area start -->
                <div class="ar-blog-area pb-100 pt-120">
                    <div class="container container-1430">
                        <div class="ar-blog-title-wrap ar-title-mlr mb-60">
                            <div class="row align-items-end">
                                <div class="col-xl-8 col-lg-8 col-md-7">
                                    <div class="ar-blog-title-box">
                                        <h3 class="tp-section-title-clash-600 fs-60 mb-0 tp_fade_anim" data-delay=".4">{{ __('security.blog_title') }}</h3>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-5">
                                    <div class="ar-blog-btn-box d-flex justify-content-md-end justify-content-start mb-15">
                                        <div class="tp-btn-red-circle-box tp_fade_anim" data-delay=".5" data-fade-from="top" data-ease="bounce">
                                            <a class="tp-btn-red-circle-icon" href="{{ route('blog.index') }}">
                                                <span>
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 11L11 1M11 1H1M11 1V11" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                            </a>
                                            <a class="tp-btn-red-circle-text" href="{{ route('blog.index') }}">{{ __('security.blog_view_all') }}</a>
                                            <a class="tp-btn-red-circle-icon" href="{{ route('blog.index') }}">
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
                            @forelse(($SecurityBlog ?? collect()) as $index => $blog)
                                @php
                                    $delay = number_format(0.3 + ($index * 0.1), 1);
                                    $cover = $blog->featured_image ? asset($blog->featured_image) : asset('assets/img/home-08/blog/blog-1.jpg');
                                    $primaryCategoryModel = $blog->blogCategories->first();
                                    $primaryCategory = optional($primaryCategoryModel)->name ?? 'Blog';
                                    $categoryUrl = route('blog.show', $blog->slug);
                                    $publishedDate = $blog->published_at ? $blog->published_at->format('M d, Y') : ($blog->created_at ? $blog->created_at->format('M d, Y') : null);
                                @endphp
                                <div class="col-xl-3 col-lg-6 col-md-6">
                                    <div class="ar-blog-item mb-30 tp_fade_anim" data-delay=".{{ $delay }}">
                                        <div class="ar-blog-thumb p-relative">
                                            <a href="{{ route('blog.show', $blog->slug) }}"><img class="w-100" src="{{ $cover }}" alt="{{ $blog->title }}"></a>
                                            <a class="ar-blog-category" href="{{ $categoryUrl }}">{{ $primaryCategory }}</a>
                                        </div>
                                        <div class="ar-blog-content">
                                            <h3 class="ar-blog-title-sm"><a class="tp-line-black" href="{{ route('blog.show', $blog->slug) }}">{{ \Illuminate\Support\Str::limit($blog->title, 70) }}</a></h3>
                                            @if($publishedDate)
                                                <span class="ar-blog-meta">{{ $publishedDate }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <p class="text-center text-muted">{{ __('security.blog_no_posts') }}</p>
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