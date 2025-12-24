<!doctype html>
<html class="no-js agntix-light" lang="{{ current_locale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>{{ __('blog.meta_title') }}</title>
    <meta name="description" content="{{ __('blog.meta_description') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Canonical -->
    @php
    $path = request()->path();
    $path = preg_replace('#^(vi|en)(/)?#', '', $path);
    @endphp

    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="alternate" hreflang="vi" href="{{ url('/vi/' . $path) }}">
    <link rel="alternate" hreflang="en" href="{{ url('/en/' . $path) }}">
    <link rel="alternate" hreflang="x-default" href="{{ url('/vi/' . $path) }}">


    <!-- Hreflang -->


    <!-- Open Graph -->
    <meta property="og:title" content="{{ __('blog.og_title') }}">
    <meta property="og:description" content="{{ __('blog.og_description') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="AIControl Vietnam">
    <meta property="og:locale" content="{{ app()->getLocale() === 'vi' ? 'vi_VN' : 'en_US' }}">
    <meta property="og:image" content="{{ url(asset('assets/AIcontrol_imgs/ai_control_logo.png')) }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="{{ __('blog.og_image_alt') }}">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/AIcontrol_imgs/small_logo.png') }}">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome-pro.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/blog.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/shop.css') }}">
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

                <!-- breadcurmb area start -->
                <div class="tp-breadcrumb-area tp-breadcrumb-ptb include-bg" data-background="{{ asset('assets/img/about-us/about-us-4/about-us-4-bg.png') }}">
                    <div class="container container-1330">
                        <div class="row justify-content-center">
                            <div class="col-xxl-12">
                                <div class="tp-blog-heading-wrap p-relative pb-130">
                                    <span class="tp-section-subtitle pre tp_fade_anim">Tin tức & Bài viết <svg xmlns="http://www.w3.org/2000/svg" width="81" height="9" viewBox="0 0 81 9" fill="none">
                                            <rect y="4.04333" width="80" height="1" fill="black" />
                                            <path d="M77 8.00783L80.5 4.52527L77 1.04271" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>

                                    <h1 class="tp-blog-title tp_fade_anim smooth">Khám phá <img src="{{ asset('assets/AIcontrol_imgs/Lighting_control_solution/headinglogo.svg') }}" alt=""> <br> 
                                            Tin tức mới nhất...</h1>

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
                <!-- breadcurmb area end -->


                <!-- blog masonry area start -->
                <div id="down" class="tp-blog-gird-sidebar-ptb pb-80">
                    <div class="container container-1330">
                        <div class="row">

                            <!-- Sidebar -->
                            <div class="col-lg-4">
                                <div class="sidebar-blog-grid-wrap">
                                    <div class="sidebar-wrapper">
                                        
                                        <!-- Search Widget -->
                                        <div class="sidebar-widget sidebar-search-widget mb-40">
                                            <div class="sidebar-search">
                                                 <form action="{{ route(current_locale() . '.blog.search') }}" method="GET">
                                                    <div class="sidebar-search-input position-relative">
                                                        <input type="text" name="q" placeholder="Tìm kiếm bài viết..." value="{{ request('q') }}">
                                                        <button type="submit">
                                                            <svg width="18" height="18" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M18.9999 19L14.6499 14.65M17 9C17 13.4183 13.4183 17 9 17C4.58172 17 1 13.4183 1 9C1 4.58172 4.58172 1 9 1C13.4183 1 17 4.58172 17 9Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <!-- Mobile Filter Toggle Button -->
                                        <button id="mobile-filter-toggle" class="btn btn-primary w-100 mb-3 d-md-none" type="button" style="background: #6c63ff; border: none; padding: 12px; border-radius: 8px; font-weight: 600;">
                                            <i class="fas fa-filter"></i> Lọc theo danh mục
                                        </button>

                                        <!-- Blog Categories Widget (New Structured) -->
                                        @if(isset($blogCategories) && $blogCategories->count() > 0)
                                        <div id="blog-categories-widget" class="sidebar-widget sidebar-widget-box mb-40">
                                            <h3 class="sidebar-widget-title sidebar-widget-title-styled mb-25">
                                                Danh mục bài viết
                                            </h3>
                                            <form id="blog-category-filter-form" method="GET" action="{{ route(current_locale() . '.blog.index') }}">
                                                <div class="blog-categories-filter" style="padding: 15px; background: #f8f9fa; border-radius: 8px;">
                                                    @foreach($blogCategories as $rootCategory)
                                                        <div class="category-group" style="margin-bottom: 15px;">
                                                            <!-- Root Category Checkbox -->
                                                            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px;">
                                                                <label style="display: flex; align-items: center; cursor: pointer; font-weight: 600; color: #333; margin: 0; flex: 1;">
                                                                    <input type="checkbox" name="blog_category[]" value="{{ $rootCategory->slug }}" 
                                                                        class="category-checkbox" 
                                                                        {{ in_array($rootCategory->slug, (array) request('blog_category')) ? 'checked' : '' }}
                                                                        style="margin-right: 8px; cursor: pointer; width: 18px; height: 18px;">
                                                                    <i class="fas fa-folder" style="margin-right: 6px; color: var(--tp-brand-primary-color);"></i>
                                                                    <span class="category-name">{{ $rootCategory->name }}</span>
                                                                </label>
                                                                <div style="display: flex; align-items: center; gap: 8px;">
                                                                    <span class="badge" style="background: var(--tp-brand-primary-color); color: white; padding: 3px 10px; border-radius: 12px; font-size: 11px; font-weight: 600; min-width: 28px; text-align: center;">
                                                                        {{ $rootCategory->total_blog_count }}
                                                                    </span>
                                                                    @if($rootCategory->children->count() > 0)
                                                                        <button type="button" class="blog-category-toggle" data-category-id="{{ $rootCategory->id }}" style="background: none; border: none; padding: 4px 8px; cursor: pointer; color: #6c63ff; transition: all 0.2s;">
                                                                            <i class="fas fa-chevron-down" style="font-size: 12px;"></i>
                                                                        </button>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            
                                                            <!-- Subcategories Checkboxes -->
                                                            @if($rootCategory->children->count() > 0)
                                                                <div class="subcategories subcategory-{{ $rootCategory->id }}" style="padding-left: 28px; margin-top: 5px; display: block;">
                                                                    @foreach($rootCategory->children as $child)
                                                                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 6px;">
                                                                            <label style="display: flex; align-items: center; cursor: pointer; color: #666; margin: 0; font-size: 14px; flex: 1;">
                                                                                <input type="checkbox" name="blog_category[]" value="{{ $child->slug }}" 
                                                                                       class="category-checkbox"
                                                                                       {{ in_array($child->slug, (array) request('blog_category')) ? 'checked' : '' }}
                                                                                       style="margin-right: 8px; cursor: pointer; width: 16px; height: 16px;">
                                                                                <span class="category-name">{{ $child->name }}</span>
                                                                            </label>
                                                                            <span class="badge" style="background: #6c757d; color: white; padding: 2px 8px; border-radius: 10px; font-size: 10px; min-width: 24px; text-align: center;">
                                                                                {{ $child->blog_count }}
                                                                            </span>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                </div>
                                                
                                                <!-- Action Buttons -->
                                                <div class="filter-actions" style="display: flex; gap: 10px; margin-top: 15px;">
                                                    <button type="submit" class="btn btn-primary" style="flex: 1; background: var(--tp-brand-primary-color); border: none; padding: 10px 20px; border-radius: 6px; font-weight: 600; color: white; cursor: pointer; transition: all 0.3s;">
                                                        <i class="fas fa-check"></i> Áp dụng
                                                    </button>
                                                    <button type="button" id="clear-filters" class="btn btn-secondary" style="flex: 1; background: #6c757d; border: none; padding: 10px 20px; border-radius: 6px; font-weight: 600; color: white; cursor: pointer; transition: all 0.3s;">
                                                        <i class="fas fa-times"></i> Xóa bộ lọc
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        @endif

                                        <!-- Categories Widget -->
                                        @if($categories && $categories->count() > 0)
                                        <div class="sidebar-widget sidebar-widget-box mb-40">
                                            <h3 class="sidebar-widget-title sidebar-widget-title-styled mb-25">
                                                Danh mục
                                            </h3>
                                            <div class="sidebar-widget-category">
                                                <ul class="category-list">
                                                    @foreach($categories as $cat)
                                                    <li>
                                                        {{-- Apply 'active' class when this category route matches the current URL --}}
                                                        <a
                                                                class="d-flex align-items-center justify-content-between
                                                                    {{ url()->current() == route(current_locale() . '.blog.category', ['category' => $cat]) ? 'active' : '' }}"
                                                                href="{{ route(current_locale() . '.blog.category', ['category' => $cat]) }}"
                                                            >

                                                            <span class="category-icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                    <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
                                                                </svg>
                                                                {{ $cat }}
                                                            </span>
                                                            <span class="category-arrow">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 12 12" fill="none">
                                                                    <path d="M1 11L11 1M11 1H1M11 1V11" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                </svg>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        @endif

                                        <!-- Latest Posts Widget -->
                                        @if($latestPosts && $latestPosts->count() > 0)
                                        <div class="sidebar-widget sidebar-widget-box mb-40">
                                            <h3 class="sidebar-widget-title sidebar-widget-title-styled mb-25">
                                                Bài viết mới nhất
                                            </h3>
                                            <div class="rc-post-wrap">
                                                @foreach($latestPosts as $latest)
                                                <div class="rc-post d-flex align-items-start mb-20">
                                                    @if($latest->featured_image)
                                                    <div class="rc-post-thumb">
                                                        <a href="{{ route(current_locale() . '.blog.show', $latest->slug) }}">
                                                            <img src="{{ asset($latest->featured_image) }}" alt="{{ $latest->title }}">
                                                        </a>
                                                    </div>
                                                    @endif
                                                    <div class="rc-post-content">
                                                        @if($latest->category)
                                                        <div class="rc-post-category mb-1">
                                                            <a href="{{ route(current_locale() . '.blog.category', ['category' => $latest->category]) }}">
                                                                {{ $latest->category }}
                                                            </a>


                                                        </div>
                                                        @endif
                                                        <h3 class="rc-post-title mb-1">
                                                            <a href="{{ route(current_locale() . '.blog.show', $latest->slug) }}">{{ Str::limit($latest->title, 50) }}</a>
                                                        </h3>
                                                        <div class="rc-post-meta">
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                                                </svg>
                                                                {{ $latest->formatted_published_date }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        @endif

                                        <!-- Tags Widget -->
                                        @if($allTags && $allTags->count() > 0)
                                        <div class="sidebar-widget sidebar-widget-box">
                                            <h3 class="sidebar-widget-title sidebar-widget-title-styled mb-25">
                                                Thẻ tag
                                            </h3>
                                            <div class="sidebar-widget-content">
                                                <div class="tagcloud">
                                                    @foreach($allTags as $tag)
                                                    <a href="{{current_locale() . route('blog.search') }}?q={{ $tag }}">{{ $tag }}</a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <!-- Blog Masonry Grid -->
                            <div class="col-lg-8">
                                <div class="row">
                                    @forelse($blogs as $blog)
                                    <div class="col-md-6 mb-30">
                                        <div class="tp-blog-masonry-item h-100">
                                            @if($blog->featured_image)
                                            <div class="tp-blog-masonry-thumb position-relative">
                                                <a href="{{ route(current_locale() . '.blog.show', ['slug' => $blog->slug]) }}">
                                                    <img src="{{ asset($blog->featured_image) }}" alt="{{ $blog->title }}">
                                                </a>
                                                @if($blog->category)
                                                <div class="tp-blog-masonry-tag">
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 15 14" fill="none">
                                                            <path d="M4.39012 4.13048H4.39847M13.6056 8.14369L8.74375 12.6328C8.6178 12.7492 8.46823 12.8415 8.30359 12.9046C8.13896 12.9676 7.96248 13 7.78426 13C7.60604 13 7.42956 12.9676 7.26493 12.9046C7.10029 12.8415 6.95072 12.7492 6.82477 12.6328L1 7.2609V1H7.78087L13.6056 6.37811C13.8582 6.61273 14 6.93009 14 7.2609C14 7.59171 13.8582 7.90908 13.6056 8.14369Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            {{ $blog->category }}
                                                        </svg> 
                                                        {{ $blog->category }}
                                                        
                                                    </span>
                                                </div>
                                                @endif
                                            </div>
                                            @endif
                                            
                                            <div class="tp-blog-masonry-content">
                                                <div class="tp-blog-masonry-item-meta d-flex justify-content-between align-items-center mb-20">
                                                    {{-- <div class="tp-blog-masonry-item-user d-flex align-items-center">
                                                        <div class="tp-blog-masonry-item-user-thumb">
                                                            <img src="{{ asset('assets/img/blog/blog-masonry/blog-masonry-user-1.jpg') }}" alt="{{ $blog->author->name ?? 'Author' }}">
                                                        </div>
                                                        <div class="tp-blog-masonry-item-user-content">
                                                            <span>{{ $blog->author->name ?? 'Admin' }}</span>
                                                            <p>{{ $blog->author->role ?? 'Administrator' }}</p>
                                                        </div>
                                                    </div> --}}
                                                    <div class="tp-blog-masonry-item-time">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 18 18" fill="none">
                                                                <path d="M9 4.19997V8.99997L12.2 10.6M17 9C17 13.4183 13.4183 17 9 17C4.58172 17 1 13.4183 1 9C1 4.58172 4.58172 1 9 1C13.4183 1 17 4.58172 17 9Z" stroke="var(--tp-brand-primary-color)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg> 
                                                            {{ $blog->formatted_published_date }}
                                                        </span>
                                                    </div>
                                                </div>

                                                <h4 class="tp-blog-masonry-title mb-15">
                                                    <a class="tp-line-white" href="{{ route(current_locale() . '.blog.show', ['slug' => $blog->slug]) }}">
                                                        {{ Str::limit($blog->title, 60) }}
                                                    </a>
                                                </h4>
                                                @if($blog->excerpt)
                                                <p class="mb-20">{{ Str::limit($blog->excerpt, 120) }}</p>
                                                @endif
                                                
                                                <div class="d-flex justify-content-between align-items-center blog-footer">
                                                    <div class="tp-blog-masonry-btn">
                                                        <a href="{{ route(current_locale() . '.blog.show', ['slug' => $blog->slug]) }}">
                                                            <span style="color: var(--tp-brand-primary-color)">Đọc thêm</span>
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                                                    <path d="M1 11L11 1M11 1H1M11 1V11" stroke="#ff5722" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                            </span>
                                                        </a>
                                                    </div>
                                                    @if($blog->reading_time)
                                                    <span class="reading-time">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                                            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                                                        </svg>
                                                        {{ $blog->reading_time }}
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
                                                    <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                                    <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                                                </svg>
                                            </div>
                                            <h4>Chưa có bài viết nào</h4>
                                            <p class="mb-0">Hãy quay lại sau để đọc những bài viết mới nhất của chúng tôi!</p>
                                        </div>
                                    </div>
                                    @endforelse
                                </div>
                                
                                @if($blogs->hasPages())
                                <!-- Pagination (styled like shop) -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="shop-pagination">
                                            <nav aria-label="Phân trang bài viết">
                                                <ul class="pagination">
                                                    <!-- Previous Button -->
                                                    @if($blogs->onFirstPage())
                                                        <li class="disabled" aria-disabled="true">
                                                            <span><i class="fal fa-angle-left"></i> Trước</span>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <a href="{{ $blogs->previousPageUrl() }}" rel="prev">
                                                                <i class="fal fa-angle-left"></i> Trước
                                                            </a>
                                                        </li>
                                                    @endif

                                                    <!-- Page Numbers -->
                                                    @foreach($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                                                        @if($page == $blogs->currentPage())
                                                            <li class="active" aria-current="page">
                                                                <span>{{ $page }}</span>
                                                            </li>
                                                        @else
                                                            <li>
                                                                <a href="{{ $url }}">{{ $page }}</a>
                                                            </li>
                                                        @endif
                                                    @endforeach

                                                    <!-- Next Button -->
                                                    @if($blogs->hasMorePages())
                                                        <li>
                                                            <a href="{{ $blogs->nextPageUrl() }}" rel="next">
                                                                Sau <i class="fal fa-angle-right"></i>
                                                            </a>
                                                        </li>
                                                    @else
                                                        <li class="disabled" aria-disabled="true">
                                                            <span>Sau <i class="fal fa-angle-right"></i></span>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- blog masonry area end -->

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
        <script>
            window.blogIndexRoute = "{{ route(current_locale() . '.blog.index') }}";
        </script>
        <script src="{{ asset('assets/js/blogs.js') }}"></script>


    </body>
</html>