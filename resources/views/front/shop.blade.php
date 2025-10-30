<!doctype html>
<html class="no-js" lang="vi">

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sản phẩm điều khiển thông minh | AIControl Vietnam</title>
    <meta name="description" content="Khám phá các sản phẩm điều khiển thông minh cao cấp từ ABB, Legrand, CP Electronics. Công tắc cảm ứng, dimmer, hệ thống KNX chính hãng.">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.png') }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome-pro.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/atropos.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/products.css') }}">

</head>
<!-- tp-magic-cursor -->
<body class="" data-bg-color="#F4F0EA">

    <!-- Begin magic cursor -->
    <div id="magic-cursor" class="cursor-bg-red">
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


    <div id="smooth-wrapper">
        <div id="smooth-content">

            <main>

                <!-- breadcrumb area start -->
                <section class="breadcrumb__area pt-120 pb-120">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="breadcrumb__content text-center">
                                    <h3 class="breadcrumb__title">Sản phẩm</h3>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb justify-content-center">
                                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
                                        </ol>
                                    </nav>
                                    @if(isset($brand))
                                        <p class="mt-3">Hiển thị sản phẩm từ: <strong>{{ $brand }}</strong></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- breadcrumb area end -->

                <!-- product area start -->
                <div class="tp-product-ptb pt-80 pb-30">
                    <div class="container container-1750">
                        
                        <!-- Product Count & Filters -->
                        <div class="row mb-40">
                            <div class="col-lg-12">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p>Hiển thị {{ $products->count() }} / {{ $products->total() }} sản phẩm</p>
                                    <div class="filter-buttons">
                                        <a href="{{ route('shop') }}" class="btn btn-sm {{ !isset($brand) ? 'btn-primary' : 'btn-outline-secondary' }}">Tất cả</a>
                                        <a href="{{ route('brand.products', 'ABB') }}" class="btn btn-sm {{ isset($brand) && $brand == 'ABB' ? 'btn-primary' : 'btn-outline-secondary' }}">ABB</a>
                                        <a href="{{ route('brand.products', 'Legrand') }}" class="btn btn-sm {{ isset($brand) && $brand == 'Legrand' ? 'btn-primary' : 'btn-outline-secondary' }}">Legrand</a>
                                        <a href="{{ route('brand.products', 'CP Electronics') }}" class="btn btn-sm {{ isset($brand) && $brand == 'CP Electronics' ? 'btn-primary' : 'btn-outline-secondary' }}">CP Electronics</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Products Grid -->
                        <div class="row">
                            @forelse($products as $product)
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-40">
                                <div class="product-item h-100">
                                    
                                    <!-- Product Image -->
                                    <div class="product-thumb position-relative">
                                        @if($product->image_url)
                                            <img src="{{ asset('storage/' . $product->image_url) }}" 
                                                 alt="{{ $product->name }}">
                                        @else
                                            <div class="product-placeholder">
                                                <i class="fa fa-image"></i>
                                            </div>
                                        @endif
                                        
                                        <!-- Badges -->
                                        @if($product->is_new)
                                            <span class="badge bg-success position-absolute badge-new">Mới</span>
                                        @endif
                                        @if($product->featured)
                                            <span class="badge bg-danger position-absolute badge-featured">Nổi bật</span>
                                        @endif
                                        @if($product->sale_price && $product->sale_price < $product->price)
                                            <span class="badge bg-warning position-absolute badge-sale">Giảm giá</span>
                                        @endif
                                    </div>

                                    <!-- Product Info -->
                                    <div class="product-content p-3">
                                        <!-- Brand -->
                                        <div class="product-brand mb-2">
                                            <span class="badge bg-light text-dark">{{ $product->brand }}</span>
                                        </div>

                                        <!-- Product Name -->
                                        <h4 class="product-title mb-2">
                                            <a href="{{ route('product.detail', $product->slug) }}">
                                                {{ Str::limit($product->name, 60) }}
                                            </a>
                                        </h4>

                                        <!-- Short Description -->
                                        @if($product->short_description)
                                            <p class="product-desc mb-3">
                                                {{ Str::limit($product->short_description, 80) }}
                                            </p>
                                        @endif

                                        <!-- Price -->
                                        <div class="product-price mb-3">
                                            @if($product->sale_price && $product->sale_price < $product->price)
                                                <span class="old-price text-muted text-decoration-line-through me-2">
                                                    {{ number_format($product->price, 0, ',', '.') }}đ
                                                </span>
                                                <span class="new-price fw-bold">
                                                    {{ number_format($product->sale_price, 0, ',', '.') }}đ
                                                </span>
                                            @else
                                                <span class="price fw-bold">
                                                    {{ number_format($product->price, 0, ',', '.') }}đ
                                                </span>
                                            @endif
                                        </div>

                                        <!-- Stock Status -->
                                        <div class="stock-status mb-3">
                                            @if($product->stock_status == 'in_stock')
                                                <small class="text-success"><i class="fa fa-check-circle"></i> Còn hàng</small>
                                            @elseif($product->stock_status == 'out_of_stock')
                                                <small class="text-danger"><i class="fa fa-times-circle"></i> Hết hàng</small>
                                            @else
                                                <small class="text-warning"><i class="fa fa-clock"></i> Đặt trước</small>
                                            @endif
                                        </div>

                                        <!-- View Button -->
                                        <a href="{{ route('product.detail', $product->slug) }}" 
                                           class="btn btn-sm w-100 btn-view-detail">
                                            Xem chi tiết
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-12">
                                <div class="text-center py-5 empty-state">
                                    <i class="fa fa-box-open"></i>
                                    <h4 class="mt-3">Không tìm thấy sản phẩm</h4>
                                    <p>Vui lòng thử lại với bộ lọc khác</p>
                                    <a href="{{ route('shop') }}" class="btn btn-primary mt-3">Xem tất cả sản phẩm</a>
                                </div>
                            </div>
                            @endforelse
                            
                        </div>
                    </div>
                </div>
                <!-- product area end -->


                <!-- product pagination start -->
                <div class="tp-product-pagination-ptb pb-100">
                    <div class="basic-pagination-wrap">
                        <div class="container container-1750">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="basic-pagination product-pagination mb-0 d-flex justify-content-center">
                                        {{ $products->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- product pagination end -->

            </main>
            <!-- main area end -->
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
    <script src="{{ asset('assets/js/tp-cursor.js') }}"></script>
    <script src="{{ asset('assets/js/portfolio-slider-1.js') }}"></script>
    <script type="module" src="{{ asset('assets/js/distortion-img.js') }}"></script>
    <script type="module" src="{{ asset('assets/js/skew-slider/index.js') }}"></script>
    <script type="module" src="{{ asset('assets/js/img-revel/index.js') }}"></script>

</body>

</html>