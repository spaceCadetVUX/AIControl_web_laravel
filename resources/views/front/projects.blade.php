<!doctype html>
<html class="no-js agntix-light" lang="vi">

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dự án - AIControl Vietnam</title>
    <meta name="description" content="Khám phá các dự án AIControl Vietnam về hệ thống điều khiển thông minh, chiếu sáng, HVAC, an ninh và tự động hóa nhà ở, tòa nhà và công trình hiện đại.">
    

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/AIcontrol_imgs/small_logo.png') }}">
    @include('front.partials.ga')

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome-pro.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/shop.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/project.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

</head>

<body class="">

    <!-- Begin magic cursor -->
    <div id="magic-cursor" class="cursor-white-bg">
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
                <!-- breadcrumb area start -->
                <div class="tp-breadcrumb-area tp-breadcrumb-ptb include-bg" data-background="{{ asset('assets/img/about-us/about-us-4/about-us-4-bg.png') }}">
                    <div class="container container-1330">
                        <div class="row justify-content-center">
                            <div class="col-xxl-12">
                                <div class="tp-blog-heading-wrap p-relative pb-130">
                                    <span class="tp-section-subtitle pre tp_fade_anim">Dự án của chúng tôi <svg xmlns="http://www.w3.org/2000/svg"  width="81" height="9" viewBox="0 0 81 9" fill="none">
                                            <rect y="4.04333" width="80" height="1" fill="black" />
                                            <path d="M77 8.00783L80.5 4.52527L77 1.04271" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>

                                    <h1 class="tp-blog-title tp_fade_anim smooth">Khám phá <img src="{{ asset('assets/AIcontrol_imgs/Lighting_control_solution/headinglogo.svg') }}" alt=""> <br> 
                                                các dự án tiêu biểu...</h1>

                                    <div class="tp-blog-shape">
                                        <span><svg xmlns="http://www.w3.org/2000/svg" width="109" height="109" viewBox="0 0 109 109" fill="none">
                                                <path d="M46.8918 0.652597C52.0111 11.5756 61.1509 45.3262 42.3414 57.6622C32.5453 63.8237 11.8693 68.6772 1.79348 40.7372C-2.00745 30.1973 6.53261 20.5828 26.243 25.965C37.6149 29.0703 65.0949 36.1781 78.8339 57.5398C86.0851 68.8141 93.074 92.3859 89.9278 107.942M89.9278 107.942C90.8943 100.431 95.9994 85.8585 108.687 87.6568M89.9278 107.942C90.4304 103.013 86.878 91.2724 68.6481 83.7468M63.5129 27.0092C68.0375 28.7613 82.5356 36.982 88.0712 51.886" stroke="black" stroke-width="1.5" />
                                            </svg></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- breadcrumb area end -->


                <!-- projects grid area start -->
                <div id="down" class="tp-blog-gird-sidebar-ptb pb-80">
                    <div class="container container-1330">
                        <!-- Mobile Filter Toggle Button -->
                        <div class="row mb-30">
                            <div class="col-12">
                                <button id="mobile-sidebar-toggle" class="btn btn-primary w-100 d-lg-none mobile-filter-btn">
                                    <i class="fas fa-filter"></i>
                                    <span class="filter-text">Hiển thị bộ lọc</span>
                                    <i class="fas fa-chevron-down toggle-icon"></i>
                                </button>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Sidebar -->
                            <div class="col-lg-4" id="projects-sidebar">
                                <div class="sidebar-blog-grid-wrap">
                                    <div class="sidebar-wrapper">
                                        
                                        <!-- Search Widget -->
                                        <div class="sidebar-widget sidebar-search-widget mb-40">
                                            <div class="search-form" style="position: relative;">
                                                <form action="{{ route(app()->getLocale() . '.projects.index') }}" method="GET">
                                                    <div class="sidebar-search-input position-relative">
                                                        <input type="text" name="search" placeholder="Tìm kiếm dự án..." value="{{ request('search') }}">
                                                        <button type="submit">
                                                            <svg width="18" height="18" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M18.9999 19L14.6499 14.65M17 9C17 13.4183 13.4183 17 9 17C4.58172 17 1 13.4183 1 9C1 4.58172 4.58172 1 9 1C13.4183 1 17 4.58172 17 9Z" box-shadow="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <!-- Project Categories Widget -->
                                        @if($categories && $categories->count() > 0)
                                        <div class="sidebar-widget sidebar-widget-box mb-40">
                                            <h3 class="sidebar-widget-title sidebar-widget-title-styled mb-25">
                                                Danh mục dự án
                                            </h3>
                                            <div class="sidebar-widget-category">
                                                <ul class="category-list">
                                                    <li>
                                                        <a class="d-flex align-items-center justify-content-between {{ (!isset($selectedCategory) && !isset($category)) ? 'active' : '' }}" href="{{ route(current_locale() . '.projects.index') }}">
                                                            <span class="category-icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                    <circle cx="12" cy="12" r="10"></circle>
                                                                </svg>
                                                                Tất cả dự án
                                                            </span>
                                                            <span class="d-flex align-items-center gap-2">
                                                                <span class="category-count">{{ $categories->sum('projects_count') }}</span>
                                                                <span class="category-arrow">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 12 12" fill="none">
                                                                        <path d="M1 11L11 1M11 1H1M11 1V11" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                    </svg>
                                                                </span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    @foreach($categories as $cat)
                                                    <li>
                                                        <a class="d-flex align-items-center justify-content-between {{ (isset($selectedCategory) && $selectedCategory->id == $cat->id) || (isset($category) && $category->id == $cat->id) ? 'active' : '' }}" href="{{ route(current_locale() . '.projects.category', $cat->slug) }}"
>
                                                            <span class="category-icon">
                                                                @if($cat->icon)
                                                                    <i class="{{ $cat->icon }}"></i>
                                                                @else
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                        <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
                                                                    </svg>
                                                                @endif
                                                                {{ $cat->name }}
                                                            </span>
                                                            <span class="d-flex align-items-center gap-2">
                                                                {{-- If you prefer counts per category, uncomment and use the count span below --}}
                                                                {{-- <span class="category-count">{{ $cat->projects_count }}</span> --}}
                                                                <span class="category-arrow">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 12 12" fill="none">
                                                                        <path d="M1 11L11 1M11 1H1M11 1V11" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                    </svg>
                                                                </span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        @endif

                                        <!-- Featured Projects Widget -->
                                        @if(isset($featuredProjects) && $featuredProjects->count() > 0)
                                        <div class="sidebar-widget sidebar-widget-box mb-40">
                                            <h3 class="sidebar-widget-title sidebar-widget-title-styled mb-25">
                                                Dự án nổi bật
                                            </h3>
                                            <div class="rc-post-wrap">
                                                @foreach($featuredProjects as $featured)
                                                <div class="rc-post d-flex align-items-start mb-20">
                                                    @if($featured->thumbnail_image)
                                                    <div class="rc-post-thumb">
                                                        <a href="{{ route(app()->getLocale().'.projects.show', $featured->slug) }}">
                                                            <img src="{{ asset($featured->thumbnail_image) }}" alt="{{ $featured->title }}">
                                                        </a>

                                                    </div>
                                                    @endif
                                                    <div class="rc-post-content">
                                                        @if($featured->category)
                                                        <div class="rc-post-category mb-1">
                                                            <span>{{ $featured->category->name }}</span>
                                                        </div>
                                                        @endif
                                                        <h3 class="rc-post-title mb-1">
                                                            <a href="{{ route(app()->getLocale().'.projects.show', $featured->slug) }}">
                                                                {{ Str::limit($featured->title, 50) }}
                                                            </a>
                                                        </h3>

                                                        @if($featured->detail_3_value)
                                                        <div class="rc-post-meta">
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                                                </svg>
                                                                {{ $featured->detail_3_value }}
                                                            </span>
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        @endif

                                    </div>
                                </div>
                            </div>

                            <!-- Projects Grid -->
                            <div class="col-lg-8">
                                <div class="row">
                                    @forelse($projects as $project)
                                    <div class="col-md-6 mb-30">
                                        <div class="tp-blog-masonry-item h-100">
                                            @if($project->thumbnail_image)
                                            <div class="tp-blog-masonry-thumb position-relative">
                                               <a href="{{ route(app()->getLocale().'.projects.show', $project->slug) }}">
                                                    <img src="{{ asset($project->thumbnail_image) }}" alt="{{ $project->title }}" style="width: 100%; height: 280px; object-fit: cover;">
                                                </a>

                                                @if($project->category)
                                                <div class="tp-blog-masonry-tag">
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 15 14" fill="none">
                                                            <path d="M4.39012 4.13048H4.39847M13.6056 8.14369L8.74375 12.6328C8.6178 12.7492 8.46823 12.8415 8.30359 12.9046C8.13896 12.9676 7.96248 13 7.78426 13C7.60604 13 7.42956 12.9676 7.26493 12.9046C7.10029 12.8415 6.95072 12.7492 6.82477 12.6328L1 7.2609V1H7.78087L13.6056 6.37811C13.8582 6.61273 14 6.93009 14 7.2609C14 7.59171 13.8582 7.90908 13.6056 8.14369Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg> 
                                                        {{ $project->category->name }}
                                                    </span>
                                                </div>
                                                @endif
                                                @if($project->featured)
                                                <div class="tp-blog-featured-badge" style="position: absolute; top: 15px; right: 15px; background: #ffc107; color: #000; padding: 5px 12px; border-radius: 20px; font-size: 11px; font-weight: 700;">
                                                    <i class="fas fa-star"></i> NỔI BẬT
                                                </div>
                                                @endif
                                            </div>
                                            @endif
                                            
                                            <div class="tp-blog-masonry-content">
                                                <div class="tp-blog-masonry-item-meta d-flex justify-content-between align-items-center mb-20">
                                                    <div class="tp-blog-masonry-item-user d-flex align-items-center">
                                                        @if($project->detail_1_value)
                                                        <div class="tp-blog-masonry-item-user-content">
                                                            <span>{{ $project->detail_1_title ?? 'Khách hàng' }}</span>
                                                            <p>{{ $project->detail_1_value }}</p>
                                                        </div>
                                                        @endif
                                                    </div>
                                                    @if($project->detail_3_value)
                                                    <div class="tp-blog-masonry-item-time">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 18 18" fill="none">
                                                                <path d="M9 4.19997V8.99997L12.2 10.6M17 9C17 13.4183 13.4183 17 9 17C4.58172 17 1 13.4183 1 9C1 4.58172 4.58172 1 9 1C13.4183 1 17 4.58172 17 9Z" stroke="#ff5722" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg> 
                                                            {{ $project->detail_3_value }}
                                                        </span>
                                                    </div>
                                                    @endif
                                                </div>

                                                <h4 class="tp-blog-masonry-title mb-15">
                                                    <a class="tp-line-white" href="{{ route(app()->getLocale().'.projects.show', $project->slug) }}">
                                                        {{ Str::limit($project->title, 60) }}
                                                    </a>

                                                </h4>
                                                @if($project->short_description)
                                                <p class="mb-20">{{ Str::limit($project->short_description, 100) }}</p>
                                                @endif
                                                
                                                <div class="d-flex justify-content-between align-items-center blog-footer">
                                                    <div class="tp-blog-masonry-btn">
                                                        <a href="{{ route(app()->getLocale().'.projects.show', $project->slug) }}">
                                                            Xem chi tiết 
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                                                    <path d="M1 11L11 1M11 1H1M11 1V11" stroke="#ff5722" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                            </span>
                                                        </a>

                                                    </div>
                                                    @if($project->detail_4_value)
                                                    <span class="reading-time" style="font-size: 12px; color: #666;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        {{ $project->detail_4_value }}
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="col-12">
                                        <div class="blog-empty-state alert alert-info text-center p-5">
                                            <div class="blog-empty-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="#ff5722" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                    <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                                                </svg>
                                            </div>
                                            <h4>Chưa có dự án nào</h4>
                                            <p class="mb-0">Hãy quay lại sau để xem các dự án mới nhất của chúng tôi!</p>
                                        </div>
                                    </div>
                                    @endforelse
                                </div>
                                
                                @if($projects->hasPages())
                                <!-- Pagination -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="tp-pagination mt-50">
                                            {{ $projects->links() }}
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- projects grid area end -->

            </main>

            <!-- footer area start -->
            @include('front.includes.footer')
            <!-- footer area end -->

        </div>

        <!-- JS here -->
        <script src="{{ asset('assets/js/vendor/jquery.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap-bundle.js') }}"></script>
        <script src="{{ asset('assets/js/plugin.js') }}"></script>
        <script src="{{ asset('assets/js/three.js') }}"></script>
        <script src="{{ asset('assets/js/slick.js') }}"></script>
        <script src="{{ asset('assets/js/scroll-magic.js') }}"></script>
        <script src="{{ asset('assets/js/hover-effect.umd.js') }}"></script>
        <script src="{{ asset('assets/js/swiper-bundle.js') }}"></script>
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
        <!-- Project Scripts -->
        {{-- <script>
        $(document).ready(function() {
            // Mobile sidebar toggle
            $('#mobile-sidebar-toggle').on('click', function() {
                const $sidebar = $('#projects-sidebar');
                const $icon = $(this).find('.toggle-icon');
                const $filterText = $(this).find('.filter-text');
                
                if ($sidebar.is(':visible')) {
                    $sidebar.slideUp(300);
                    $icon.removeClass('fa-chevron-up').addClass('fa-chevron-down');
                    $filterText.text('Hiển thị bộ lọc');
                    $(this).removeClass('active');
                } else {
                    $sidebar.slideDown(300);
                    $icon.removeClass('fa-chevron-down').addClass('fa-chevron-up');
                    $filterText.text('Ẩn bộ lọc');
                    $(this).addClass('active');
                }
            });

            // Auto-hide sidebar on mobile on page load
            if ($(window).width() < 992) {
                $('#projects-sidebar').hide();
            }

            // Show/hide sidebar on window resize
            $(window).resize(function() {
                if ($(window).width() >= 992) {
                    $('#projects-sidebar').show();
                    $('#mobile-sidebar-toggle').removeClass('active');
                } else {
                    // Reset to hidden state on mobile
                    if (!$('#mobile-sidebar-toggle').hasClass('active')) {
                        $('#projects-sidebar').hide();
                    }
                }
            });

            // Search form enhancement
            $('.sidebar-search input[name="search"]').on('keypress', function(e) {
                if (e.which === 13) { // Enter key
                    $(this).closest('form').submit();
                }
            });

            // Preserve search and category filters in pagination
            $('.pagination a').each(function() {
                const url = new URL($(this).attr('href'), window.location.origin);
                const currentSearch = new URLSearchParams(window.location.search).get('search');
                const currentCategory = new URLSearchParams(window.location.search).get('category');
                
                if (currentSearch) {
                    url.searchParams.set('search', currentSearch);
                }
                if (currentCategory) {
                    url.searchParams.set('category', currentCategory);
                }
                
                $(this).attr('href', url.toString());
            });

            // Highlight active category
            $('.category-list a').on('click', function() {
                $('.category-list a').removeClass('active');
                $(this).addClass('active');
            });

            // Smooth scroll animation when opening sidebar
            $('#mobile-sidebar-toggle').on('click', function() {
                if (!$(this).hasClass('active')) {
                    setTimeout(function() {
                        $('html, body').animate({
                            scrollTop: $('#projects-sidebar').offset().top - 100
                        }, 500);
                    }, 100);
                }
            });
        });
        </script> --}}
    </body>
</html>