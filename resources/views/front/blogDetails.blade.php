<!doctype html>
<html class="no-js agntix-light" lang="vi">

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    {{-- SEO Meta Tags --}}
    <title>{{ $blog->seo_title }} | AIControl</title>
    <meta name="description" content="{{ $blog->seo_description }}">
    @if($blog->meta_keywords)
    <meta name="keywords" content="{{ $blog->meta_keywords }}">
    @endif
    
    <meta name="author" content="{{ $blog->author->name ?? 'AIControl' }}">
    
    {{-- Canonical URL --}}
    <link rel="canonical" href="{{ $blog->canonical_url ?? url()->current() }}">
    
    {{-- Robots Meta --}}
    <meta name="robots" content="{{ $blog->indexable ? 'index, follow' : 'noindex, nofollow' }}">
    
    {{-- Open Graph Meta Tags (Facebook, LinkedIn) --}}
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $blog->seo_title }}">
    <meta property="og:description" content="{{ $blog->seo_description }}">
    <meta property="og:url" content="{{ $blog->canonical_url ?? url()->current() }}">
    @if($blog->featured_image)
    <meta property="og:image" content="{{ asset($blog->featured_image) }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    @endif
    <meta property="og:site_name" content="AIControl">
    <meta property="article:published_time" content="{{ $blog->published_at->toIso8601String() }}">
    <meta property="article:modified_time" content="{{ $blog->updated_at->toIso8601String() }}">
    @if($blog->author)
    <meta property="article:author" content="{{ $blog->author->name }}">
    @endif
    @if($blog->category)
    <meta property="article:section" content="{{ $blog->category }}">
    @endif
    @if($blog->tags)
    @foreach($blog->tags as $tag)
    <meta property="article:tag" content="{{ $tag }}">
    @endforeach
    @endif
    
    {{-- Twitter Card Meta Tags --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $blog->seo_title }}">
    <meta name="twitter:description" content="{{ $blog->seo_description }}">
    @if($blog->featured_image)
    <meta name="twitter:image" content="{{ asset($blog->featured_image) }}">
    @endif
    
    {{-- JSON-LD Structured Data for Rich Snippets --}}
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BlogPosting",
        "headline": "{{ $blog->title }}",
        "description": "{{ $blog->seo_description }}",
        "image": "{{ $blog->featured_image ? asset($blog->featured_image) : '' }}",
        "datePublished": "{{ $blog->published_at->toIso8601String() }}",
        "dateModified": "{{ $blog->updated_at->toIso8601String() }}",
        "author": {
            "@type": "Person",
            "name": "{{ $blog->author->name ?? 'AIControl' }}"
        },
        "publisher": {
            "@type": "Organization",
            "name": "AIControl",
            "logo": {
                "@type": "ImageObject",
                "url": "{{ asset('assets/img/logo/logo-black.png') }}"
            }
        },
        "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "{{ $blog->canonical_url ?? url()->current() }}"
        }
        @if($blog->category)
        ,
        "articleSection": "{{ $blog->category }}"
        @endif
        @if($blog->tags)
        ,
        "keywords": "{{ implode(', ', $blog->tags) }}"
        @endif
    }
    </script>

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
    <link rel="stylesheet" href="{{ asset('assets/css/blog.css') }}">

    <style>
        /* Ensure TinyMCE tables inside blog content render correctly and responsively */
        .tp-postbox-content .table-responsive { width:100%; overflow-x:auto; -webkit-overflow-scrolling:touch; }
        .tp-postbox-content .table-responsive table { width:100%; border-collapse:collapse; table-layout:auto; max-width:100%; }
        .tp-postbox-content table { display: table !important; width:100% !important; }
        .tp-postbox-content table thead { display: table-header-group !important; }
        .tp-postbox-content table tbody { display: table-row-group !important; }
        .tp-postbox-content table tr { display: table-row !important; }
        .tp-postbox-content table th,
        .tp-postbox-content table td { display: table-cell !important; padding:.6rem; border:1px solid #e6e6e6; vertical-align:top; text-align:left; word-break:break-word; }
        .tp-postbox-content table img { max-width:100%; height:auto; display:block; }
        @media (max-width:768px){
            .tp-postbox-content .table-responsive { -ms-overflow-style: -ms-autohiding-scrollbar; }
        }
    </style>

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
    <!-- tp-offcanvus-area-start -->
    
    <div class="body-overlay"></div>

    <!-- offcanvas start -->
    @include('front.includes.offcanvas')
    <!-- offcanvas end -->

     <!-- header area start -->
    @include('front.includes.header')
    <!-- header area end -->

    <div id="smooth-wrapper">
        <div id="smooth-content">

            <main>
                <!-- breadcurmb area start -->
                <div class="tp-breadcrumb-area tp-breadcrumb-ptb">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xxl-12">
                                <div class="tp-breadcrumb-content text-center">
                                    <h1 class="tp-breadcrumb-title">{{ $blog->title }}</h1>
                                    <div class="tp-breadcrumb-list mb-35">
                                        <span><a href="{{ route(current_locale() . '.index') }}">Trang chủ</a></span>
                                        <span class="dvdr"><i>|</i></span>
                                        <span><a href="{{ route(current_locale() . '.blog.index') }}">Tin tức</a></span>
                                        <span class="dvdr"><i>|</i></span>
                                        {{-- <span>{{ Str::limit($blog->title, 50) }}</span> --}}
                                    </div>
                                    <div class="tp-breadcrumb-scrolldown smooth">
                                        <a href="#postbox">
                                            <span>
                                                <svg width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 1L8 8L15 1" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- breadcurmb area end -->

                <!-- blog detail area start -->
                <div id="postbox" class="tp-postbox-area pt-120 pb-120">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <article class="tp-postbox-item mb-50">
                                    {{-- Featured Image --}}
                                    @if($blog->featured_image)
                                    <div class="tp-postbox-thumb mb-40">
                                        <img src="{{ asset($blog->featured_image) }}" alt="{{ $blog->title }}" class="w-100">
                                    </div>
                                    @endif

                                    {{-- Post Meta --}}
                                    <div class="tp-postbox-meta mb-30">
                                        {{-- <span class="tp-postbox-meta-author">
                                            <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7.4104 8C9.81731 8 11.7708 6.20914 11.7708 4C11.7708 1.79086 9.81731 0 7.4104 0C5.00349 0 3.04993 1.79086 3.04993 4C3.04993 6.20914 5.00349 8 7.4104 8Z" fill="currentColor"/>
                                                <path d="M14.0611 15.25C14.0611 15.664 13.7065 16 13.2708 16C12.8352 16 12.4805 15.664 12.4805 15.25C12.4805 12.903 10.3294 11 7.6104 11H7.2104C4.49142 11 2.34033 12.903 2.34033 15.25C2.34033 15.664 1.98565 16 1.54993 16C1.11422 16 0.759537 15.664 0.759537 15.25C0.759537 12.0745 3.61891 9.5 7.2104 9.5H7.6104C11.2019 9.5 14.0611 12.0745 14.0611 15.25Z" fill="currentColor"/>
                                            </svg>
                                            Bởi <a href="#">{{ $blog->author->name ?? 'Admin' }}</a>
                                        </span> --}}
                                        <span class="tp-postbox-meta-date">
                                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15 7.6087V14.7391C15 15.4304 14.4404 16 13.7609 16H2.23913C1.54783 16 1 15.4304 1 14.7391V7.6087M15 7.6087V4.13043C15 3.43913 14.4404 2.86957 13.7609 2.86957H2.23913C1.54783 2.86957 1 3.43913 1 4.13043V7.6087M15 7.6087H1M11.5217 1V4.73913M4.47826 1V4.73913" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            {{ $blog->formatted_published_date }}
                                        </span>
                                        @if($blog->category)
                                        <span class="tp-postbox-meta-category">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4.5 4.5H4.50714M14.5 8.5L9.5 13.5C9.36739 13.6326 9.20993 13.7379 9.03638 13.8099C8.86282 13.8819 8.67677 13.9194 8.48883 13.9202C8.3009 13.921 8.11453 13.8852 7.94036 13.8148C7.76618 13.7445 7.60783 13.6408 7.47403 13.509C7.34023 13.3772 7.23379 13.2199 7.16177 13.0466C7.08975 12.8732 7.05355 12.6873 7.05272 12.4993C7.05189 12.3114 7.08645 12.1252 7.15723 11.9512C7.22802 11.7773 7.33329 11.619 7.46571 11.4857L11.9657 7H1V1H15V15L14.5 8.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            <a href="{{ route(current_locale() . '.blog.category', ['category' => $blog->category]) }}">{{ $blog->category }}</a>

                                            

                                        </span>
                                        @endif
                                        @if($blog->reading_time)
                                        <span class="tp-postbox-meta-reading">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2 1H6C7.06087 1 8.07828 1.42143 8.82843 2.17157C9.57857 2.92172 10 3.93913 10 5V15C10 14.2044 9.68393 13.4413 9.12132 12.8787C8.55871 12.3161 7.79565 12 7 12H2V1Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M14 1H10C8.93913 1 7.92172 1.42143 7.17157 2.17157C6.42143 2.92172 6 3.93913 6 5V15C6 14.2044 6.31607 13.4413 6.87868 12.8787C7.44129 12.3161 8.20435 12 9 12H14V1Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            {{ $blog->reading_time }}
                                        </span>
                                        @endif
                                    </div>

                                    {{-- Post Title --}}
                                    <h2 class="tp-postbox-title mb-30">{{ $blog->title }}</h2>

                                    {{-- Post Content --}}
                                    <div class="tp-postbox-content">
                                        <div class="table-responsive">
                                            {!! $blog->content !!}
                                        </div>
                                    </div>

                                    {{-- Tags --}}
                                    @if($blog->tags && count($blog->tags) > 0)
                                    <div class="tp-postbox-tag mt-40">
                                        <h4 class="tp-postbox-tag-title">Tags:</h4>
                                        <div class="tagcloud">
                                            @foreach($blog->tags as $tag)
                                            <a  href="{{ route(current_locale() . '.blog.search') }}?q={{ urlencode($tag) }}">{{ $tag }}</a>
                                           

                                            @endforeach
                                        </div>
                                    </div>
                                    @endif

                                    {{-- Social Share --}}s
                                    <div class="tp-postbox-share mt-40 d-flex align-items-center justify-content-between">
                                        <h4 class="tp-postbox-share-title">Chia sẻ:</h4>
                                        <div class="tp-postbox-share-social">
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($blog->canonical_url ?? url()->current()) }}" target="_blank" rel="noopener">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                            
                                            <a href="https://twitter.com/intent/tweet?url={{ urlencode($blog->canonical_url ?? url()->current()) }}&text={{ urlencode($blog->title) }}" target="_blank" rel="noopener">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode($blog->canonical_url ?? url()->current()) }}&title={{ urlencode($blog->title) }}" target="_blank" rel="noopener">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                            <a href="mailto:?subject={{ urlencode($blog->title) }}&body={{ urlencode($blog->canonical_url ?? url()->current()) }}">
                                                <i class="far fa-envelope"></i>
                                            </a>
                                        </div>
                                    </div>
                                </article>

                                {{-- Related Posts --}}
                                @if(isset($relatedPosts) && $relatedPosts->count() > 0)
                                <div class="tp-related-post mt-80">
                                    <h3 class="tp-related-post-title mb-40">Bài viết liên quan</h3>
                                    <div class="row">
                                        @foreach($relatedPosts as $related)
                                        <div class="col-md-6 mb-30">
                                            <div class="tp-blog-masonry-item">
                                                @if($related->featured_image)
                                                <div class="tp-blog-masonry-thumb position-relative">
                                                    <a href="{{ route(current_locale() . '.blog.show', $related->slug) }}">
                                                        <img src="{{ asset($related->featured_image) }}" alt="{{ $related->title }}">
                                                    </a>

                                                    @if($related->category)
                                                    <div class="tp-blog-masonry-tag">
                                                        <span>{{ $related->category }}</span>
                                                    </div>
                                                    @endif
                                                </div>
                                                @endif
                                                <div class="tp-blog-masonry-content">
                                                    <h4 class="tp-blog-masonry-title mb-15">
                                                        <a href="{{ route(current_locale() . '.blog.show', $related->slug) }}">
                                                            {{ Str::limit($related->title, 60) }}
                                                        </a>

                                                    </h4>
                                                    @if($related->excerpt)
                                                    <p>{{ Str::limit($related->excerpt, 100) }}</p>
                                                    @endif
                                                    <div class="tp-blog-masonry-btn">
                                                        <a href="{{ route(current_locale() . '.blog.show', $related->slug) }}">
                                                            Đọc thêm
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                                                    <path d="M1 11L11 1M11 1H1M11 1V11" stroke="#ff5722" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
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
                                @endif
                            </div>

                            {{-- Sidebar --}}
                            <div class="col-lg-4">
                                <div class="sidebar-blog-grid-wrap">
                                    <div class="sidebar-wrapper">
                                        
                                        {{-- Search Widget --}}
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

                                        {{-- Categories Widget --}}
                                        @if(isset($categories) && $categories->count() > 0)
                                        <div class="sidebar-widget sidebar-widget-box mb-40">
                                            <h3 class="sidebar-widget-title sidebar-widget-title-styled mb-25">
                                                Danh mục
                                            </h3>
                                            <div class="sidebar-widget-category">
                                                <ul class="category-list">
                                                    @foreach($categories as $cat)
                                                    <li>
                                                        {{-- Add 'active' class when the category link matches the current URL --}}
                                                        <a class="d-flex align-items-center justify-content-between
                                                            {{ url()->current() == route(current_locale() . '.blog.category', $cat) ? 'active' : '' }}"
                                                            href="{{ route(current_locale() . '.blog.category', $cat) }}">
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

                                        {{-- Latest Posts Widget --}}
                                        @if(isset($latestPosts) && $latestPosts->count() > 0)
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
                                                            <a href="{{ route(current_locale() . '.blog.category', ['category' => $latest->category]) }}">>{{ $latest->category }}</a>
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
                                            </div><div class="rc-post-wrap">
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
                                                            <a         {{ $latest->category }}>{{ $latest->category }}</a>
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
                                        <div class="sidebar-widget sidebar-widget-box">
                                            <h3 class="sidebar-widget-title sidebar-widget-title-styled mb-25">
                                                Thẻ tag
                                            </h3>
                                            <div class="sidebar-widget-content">
                                                <div class="tagcloud">
                                                    @foreach($allTags as $tag)
                                                   <a href="{{ route(current_locale() . '.blog.search', ['q' => $tag]) }}">
                                                        {{ $tag }}
                                                    </a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- blog detail area end -->

            </main>
            <!-- footer area start -->
            @include('front.includes.footer')
            <!-- footer area end -->
            

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
    <script src="{{ asset('assets/js/popup.js') }}"></script>
    <script src="{{ asset('assets/js/header-search.js') }}"></script>
    <script src="{{ asset('assets/js/tp-cursor.js') }}"></script>
    <script src="{{ asset('assets/js/portfolio-slider-1.js') }}"></script>
    <script type="module" src="{{ asset('assets/js/distortion-img.js') }}"></script>
    <script type="module" src="{{ asset('assets/js/skew-slider/index.js') }}"></script>
    <script type="module" src="{{ asset('assets/js/img-revel/index.js') }}"></script>


</body>

</html>