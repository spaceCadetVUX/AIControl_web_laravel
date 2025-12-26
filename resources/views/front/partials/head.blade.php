    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{ url('/') }}/">
    <title>@yield('meta_title', __('home.meta_title'))</title>
    

    @include('front.partials.ga')

    <!-- SEO Meta Tags -->
    <meta name="description" content="@yield('meta_description', __('home.meta_description'))">
    <meta name="keywords" content="@yield('meta_keywords', __('home.meta_keywords'))">
    <meta name="author" content="@yield('meta_author', 'AIControl')">

    <!-- Canonical (avoid duplicate URLs) -->
    @php
         $path = ltrim(preg_replace('#^(vi|en)(/)?#', '', request()->path()), '/');
    @endphp
    <link rel="canonical" href="@yield('canonical', url()->current())">
    <link rel="alternate" hreflang="vi" href="{{ url('/vi/' . $path) }}">
    <link rel="alternate" hreflang="en" href="{{ url('/en/' . $path) }}">
    <link rel="alternate" hreflang="x-default" href="{{ url('/') }}">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css">

    <!-- Open Graph (Facebook, Zalo, etc.) -->
    <meta property="og:title" content="@yield('og_title', __('home.og_title'))">
    <meta property="og:description" content="@yield('og_description', __('home.og_description'))">
    <meta property="og:image" content="@yield('og_image', url(asset('assets/AIcontrol_imgs/ai_control_logo.png')))">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="@yield('og_image_alt', __('home.og_image_alt'))">
    <meta property="og:url" content="@yield('og_url', url()->current())">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="{{ app()->getLocale() === 'vi' ? 'vi_VN' : 'en_US' }}">


    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/AIcontrol_imgs/small_logo.png') }}">
    @include('front.partials.ga')
    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome-pro.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/shop.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    @yield('extra_styles')
