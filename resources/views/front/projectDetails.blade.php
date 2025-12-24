<!doctype html>
<html class="no-js agntix-light" lang="{{ current_locale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    {{-- SEO Meta Tags --}}
    <title>{{ $project->seo_title }}</title>
    <meta name="description" content="{{ $project->seo_description }}">
    <meta name="keywords" content="{{ $project->seo_keywords }}">
    <link rel="canonical" href="{{ $project->canonical_url }}">
    
    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ $project->canonical_url }}">
    <meta property="og:title" content="{{ $project->seo_title }}">
    <meta property="og:description" content="{{ $project->seo_description }}">
    <meta property="og:image" content="{{ $project->og_image_url }}">
    
    {{-- Twitter --}}
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ $project->canonical_url }}">
    <meta property="twitter:title" content="{{ $project->seo_title }}">
    <meta property="twitter:description" content="{{ $project->seo_description }}">
    <meta property="twitter:image" content="{{ $project->og_image_url }}">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/AIcontrol_imgs/small_logo.png') }}">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome-pro.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/atropos.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/shop.css') }}">
    
    {{-- Schema.org structured data --}}
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Project",
        "name": "{{ $project->title }}",
        "description": "{{ $project->short_description }}",
        "image": "{{ $project->og_image_url }}",
        "datePublished": "{{ $project->created_at->toIso8601String() }}",
        "dateModified": "{{ $project->updated_at->toIso8601String() }}",
        "author": {
            "@type": "Organization",
            "name": "AIControl Vietnam"
        }
    }
    </script>

</head>

<body class="tp-magic-cursor">

    <!-- Magic cursor -->
    <div id="magic-cursor" class="cursor-bg-red">
        <div id="ball"></div>
    </div>

    <!-- Preloader -->
    <div id="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
        </div>
    </div>

    <!-- Back to top -->
    <div class="back-to-top-wrapper">
        <button id="back_to_top" type="button" class="back-to-top-btn">
            <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
    </div>

    <!-- Offcanvas -->
    @include('front.includes.offcanvas')

    <!-- Header -->
    @include('front.includes.header')


    <div id="smooth-wrapper">
        <div id="smooth-content">

            <main>

                <!-- Project Header Section -->
                <div class="tp-pd-2-ptb pt-200 pb-80">
                    <div class="container container-1230">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <div class="tp-pd-2-top pb-70 text-center">
                                    {{-- Categories from database --}}
                                    <div class="tp-pd-2-categories mb-30 tp_fade_anim" data-delay=".3">
                                        @if($project->category)
                                            <span>{{ $project->category->name }}</span>
                                        @endif
                                        @if($project->categorySecondary)
                                            <span>{{ $project->categorySecondary->name }}</span>
                                        @endif
                                    </div>
                                    
                                    {{-- Project title from database --}}
                                    <h1 class="tp-pd-2-title tp_fade_anim" data-delay=".5">{{ $project->title }}</h1>
                                </div>
                                
                                {{-- Project details 1-4 from database --}}
                                <div class="tp-pd-2-bottom d-flex justify-content-between flex-wrap tp_fade_anim" data-delay=".7">
                                    @if($project->detail_1_title && $project->detail_1_value)
                                    <div class="tp-pd-2-bottom-item text-center mb-3">
                                        <span>{{ $project->detail_1_title }}</span> 
                                        <h6>{{ $project->detail_1_value }}</h6>
                                    </div>
                                    @endif
                                    
                                    @if($project->detail_2_title && $project->detail_2_value)
                                    <div class="tp-pd-2-bottom-item text-center mb-3">
                                        <span>{{ $project->detail_2_title }}</span>
                                        <h6>{{ $project->detail_2_value }}</h6>
                                    </div>
                                    @endif
                                    
                                    @if($project->detail_3_title && $project->detail_3_value)
                                    <div class="tp-pd-2-bottom-item text-center mb-3">
                                        <span>{{ $project->detail_3_title }}</span>
                                        <h6>{{ $project->detail_3_value }}</h6>
                                    </div>
                                    @endif
                                    
                                    @if($project->detail_4_title && $project->detail_4_value)
                                    <div class="tp-pd-2-bottom-item text-center mb-3">
                                        <span>{{ $project->detail_4_title }}</span>
                                        <h6>{{ $project->detail_4_value }}</h6>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Project Banner from database -->
                <div class="tp-pd-2-area pb-140">
                    <div class="container-fluid p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tp-pd-2-banner">
                                    @if($project->banner_image)
                                        <img data-speed=".8" src="{{ asset($project->banner_image) }}" alt="{{ $project->title }}">
                                    @elseif($project->thumbnail_image)
                                        <img data-speed=".8" src="{{ asset($project->thumbnail_image) }}" alt="{{ $project->title }}">
                                    @else
                                        <img data-speed=".8" src="{{ asset('assets/img/portfolio/portfolio-details-2/portfolio-details-thumb-1.jpg') }}" alt="{{ $project->title }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Project Overview from database (TinyMCE content) -->
                <div class="tp-pd-2-overview-ptb pb-70">
                    <div class="container container-1230">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="tp-pd-2-overview-heading tp_fade_anim" data-delay=".3">
                                    <h2 class="tp-pd-2-overview-title">{{ $project->overview_title ?? 'Thông tin dự án' }}</h2>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="tp-pd-2-overview-wrap">
                                    @if($project->overview_content)
                                        {!! $project->overview_content !!}
                                    @else
                                        <p>{{ $project->short_description }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Project Slider Images from database (JSON array) -->
                @if($project->slider_images && is_array($project->slider_images) && count($project->slider_images) > 0)
                <div class="tp-pd-2-slider-ptb pb-140">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tp-pd-2-slider-wrapper">
                                    <div class="tp-pd-2-active swiper">
                                        <div class="swiper-wrapper">
                                            @foreach($project->slider_images as $sliderImage)
                                            <div class="swiper-slide">
                                                <div class="tp-pd-2-slider-thumb">
                                                    @php
                                                        // Handle both old string format and new object format
                                                        $imageUrl = is_array($sliderImage) ? ($sliderImage['url'] ?? '') : $sliderImage;
                                                        $imageAlt = is_array($sliderImage) ? ($sliderImage['alt'] ?? $project->title) : $project->title;
                                                        
                                                        // Use asset() helper for local paths, direct URL for external
                                                        $imageSrc = (str_starts_with($imageUrl, 'http://') || str_starts_with($imageUrl, 'https://')) 
                                                            ? $imageUrl 
                                                            : asset($imageUrl);
                                                    @endphp
                                                    <img src="{{ $imageSrc }}" alt="{{ $imageAlt }}">
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="tp-pd-2-dot text-center"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif


                <!-- Project Implementation Steps from database (JSON array) -->
                @if($project->detail_steps && is_array($project->detail_steps) && count($project->detail_steps) > 0)
                <div class="tp-pd-2-step-ptb pb-70">
                    <div class="container container-1230">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tp-pd-2-step-heading pb-60 tp_fade_anim" data-delay=".3">
                                    <h2 class="tp-pd-2-step-title">Quy trình triển khai dự án <br>
                                        Chuyên nghiệp & Hiệu quả</h2>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            @foreach($project->detail_steps as $index => $step)
                            <div class="col-lg-4 col-md-6">
                                <div class="tp-pd-2-step-item mb-30">
                                    <h4 class="tp-pd-2-step-item-title">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}. {{ $step['title'] ?? 'Bước ' . ($index + 1) }}</h4>
                                    <span>{!! nl2br(e($step['description'] ?? '')) !!}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif


                <!-- Project Gallery from database (gallery_image_1, gallery_image_2, gallery_image_3) -->
                @if($project->gallery_image_1 || $project->gallery_image_2 || $project->gallery_image_3)
                <div class="tp-pd-2-thumb-ptb pb-120">
                    <div class="container container-1230">
                        <div class="row gx-20">
                            @if($project->gallery_image_1)
                            <div class="col-lg-12">
                                <div class="tp-pd-2-thumb-item mb-20">
                                    <img data-speed=".8" src="{{ asset($project->gallery_image_1) }}" alt="{{ $project->title }}">
                                </div>
                            </div>
                            @endif
                            
                            @if($project->gallery_image_2)
                            <div class="col-lg-6">
                                <div class="tp-pd-2-thumb-item mb-20">
                                    <img data-speed=".8" src="{{ asset($project->gallery_image_2) }}" alt="{{ $project->title }}">
                                </div>
                            </div>
                            @endif
                            
                            @if($project->gallery_image_3)
                            <div class="col-lg-6">
                                <div class="tp-pd-2-thumb-item mb-20">
                                    <img data-speed=".8" src="{{ asset($project->gallery_image_3) }}" alt="{{ $project->title }}">
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endif


                <!-- Related Projects from database -->
                @if(isset($relatedProjects) && $relatedProjects->count() > 0)
                <div class="tp-pd-2-np-ptb pb-120">
                    <div class="container container-1230">
                        <div class="row mb-40">
                            <div class="col-12 text-center">
                                <h3 class="tp-pd-2-step-title">Dự án liên quan</h3>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($relatedProjects as $related)
                            <div class="col-lg-4 col-md-6 mb-30">
                                <div class="tp-blog-masonry-item h-100">
                                    @if($related->thumbnail_image)
                                    <div class="tp-blog-masonry-thumb position-relative mb-20">
                                        <a href="{{ route(current_locale() . '.projects.show', $related->slug) }}">
                                            <img src="{{ asset($related->thumbnail_image) }}"
                                                alt="{{ $related->title }}"
                                                style="width: 100%; height: 250px; object-fit: cover;">
                                        </a>

                                        @if($related->category)
                                        <div class="tp-blog-masonry-tag">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 15 14" fill="none">
                                                    <path d="M4.39012 4.13048H4.39847M13.6056 8.14369L8.74375 12.6328C8.6178 12.7492 8.46823 12.8415 8.30359 12.9046C8.13896 12.9676 7.96248 13 7.78426 13C7.60604 13 7.42956 12.9676 7.26493 12.9046C7.10029 12.8415 6.95072 12.7492 6.82477 12.6328L1 7.2609V1H7.78087L13.6056 6.37811C13.8582 6.61273 14 6.93009 14 7.2609C14 7.59171 13.8582 7.90908 13.6056 8.14369Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg> 
                                                {{ $related->category->name }}
                                            </span>
                                        </div>
                                        @endif
                                    </div>
                                    @endif
                                    <div class="tp-blog-masonry-content">
                                        <h4 class="tp-blog-masonry-title mb-15">
                                            <a href="{{ route(current_locale() . '.projects.show', $related->slug) }}">
                                                {{ Str::limit($related->title, 50) }}
                                            </a>

                                        </h4>
                                        @if($related->short_description)
                                        <p class="mb-20">{{ Str::limit($related->short_description, 80) }}</p>
                                        @endif
                                        <div class="tp-blog-masonry-btn">
                                            <a href="{{ route(current_locale() . '.projects.show', $related->slug) }}">
                                                Xem chi tiết
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                                        <path d="M1 11L11 1M11 1H1M11 1V11"
                                                            stroke="#ff5722"
                                                            stroke-width="2"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

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