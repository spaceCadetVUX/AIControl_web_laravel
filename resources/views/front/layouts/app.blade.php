<!doctype html>
<html class="no-js agntix-light" lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Giải pháp điều khiển thông minh cho mọi công trình thương mại | AIControl')</title>
    

    <!-- SEO Meta Tags -->
    <meta name="description" content="@yield('description', 'AIControl cung cấp giải pháp điều khiển thông minh giúp tối ưu năng lượng, chiếu sáng và an ninh cho mọi công trình thương mại, văn phòng, và nhà máy.')">
    <meta name="keywords" content="@yield('keywords', 'giải pháp điều khiển, nhà thông minh, điều khiển chiếu sáng, Điều khiển HVAC, Rèm thông minh, tiết kiệm năng lượng, AIControl, BMS, smart building, automation, Điều khiển khách sạn, ABB, Legrand, cp electronics, vantage')">
    <meta name="author" content="AIControl">

    <!-- Canonical -->
    <link rel="canonical" href="@yield('canonical', url()->current())">


    <!-- Open Graph (Facebook, Zalo, etc.) -->
    <meta property="og:title" content="@yield('og_title', 'Giải pháp điều khiển thông minh cho mọi công trình thương mại | AIControl')">
    <meta property="og:description" content="@yield('og_description', 'Giải pháp tự động hóa, tiết kiệm năng lượng và nâng cao tiện ích cho công trình thương mại, văn phòng và nhà máy.')">
    <meta property="og:image" content="@yield('og_image', asset('assets/img/preview.jpg'))">
    <meta property="og:url" content="@yield('og_url', url()->current())">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="vi_VN">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ assets('assets/img/favicon/favicon.png') }}">
    
    <!-- Styles -->
    @include('front.partials.styles')
    
    @yield('extra_styles')
</head>

<body class="" data-bg-color="#F2F1EE">

    <!-- Magic cursor -->
    @include('front.partials.cursor')

    <!-- Preloader -->
    @include('front.partials.preloader')

    <!-- Back to top -->
    @include('front.partials.back-to-top')

    <!-- Offcanvas menu -->
    @include('front.partials.offcanvas')

    <!-- Header -->
    @include('front.partials.header')

    <!-- Contact modal -->
    @include('front.partials.contact-modal')

    <!-- Search modal -->
    @include('front.partials.search-modal')

    <div id="smooth-wrapper">
        <div id="smooth-content">

            <main>
                @yield('content')
            </main>

            <!-- Footer -->
            @include('front.partials.footer')

        </div>
    </div>

    <!-- Scripts -->
    @include('front.partials.scripts')
    
    @yield('extra_scripts')

</body>

</html>
