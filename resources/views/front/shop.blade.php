<!doctype html>
<html class="no-js" lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sản phẩm - Hệ thống nhà thông minh | AIControl Vietnam</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Khám phá các sản phẩm hệ thống nhà thông minh cao cấp từ ABB, Legrand, Vantage, CP Electronics. Giải pháp điều khiển chiếu sáng, rèm cửa, HVAC, cảm biến thông minh.">
    <meta name="keywords" content="nhà thông minh, smart home, ABB, Legrand, điều khiển chiếu sáng, automation">
    
    <!-- Open Graph -->
    <meta property="og:title" content="Sản phẩm - Hệ thống nhà thông minh | AIControl Vietnam">
    <meta property="og:description" content="Khám phá các sản phẩm hệ thống nhà thông minh cao cấp từ ABB, Legrand, Vantage, CP Electronics">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.png') }}">
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome-pro.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/shop.css') }}">
    

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script> --}}



</head>

<body>
    @include('front.includes.offcanvas')
    @include('front.includes.header')
    @include('front.includes.popup')
    
    <div id="smooth-wrapper">
        <div id="smooth-content">
            <main>
                <!-- breadcrumb area start -->
                <div class="tp-breadcrumb-area tp-breadcrumb-ptb include-bg" data-background="{{ asset('assets/img/about-us/about-us-4/about-us-4-bg.png') }}">
                    <div class="container container-1330">
                        <div class="row justify-content-center">
                            <div class="col-xxl-12">
                                <div class="tp-blog-heading-wrap p-relative">
                                    <span class="tp-section-subtitle pre tp_fade_anim" style="color: black">AIControl<svg xmlns="http://www.w3.org/2000/svg" width="81" height="9" viewBox="0 0 81 9" fill="none">
                                            <rect y="4.04333" width="80" height="1" fill="black" />
                                            <path d="M77 8.00783L80.5 4.52527L77 1.04271" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    <h3 class="tp-blog-title tp_fade_anim smooth">Trang sản phẩm <img src="{{ asset('assets/AIcontrol_imgs/Lighting_control_solution/headinglogo.svg') }}" alt=""> <br>
                                               </h3>
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
                
                <!-- Shop Page -->
                <section class="shop-area pb-10">
                    <div class="container">
                        <div class="row">
                            <!-- Sidebar -->
                            <div class="col-lg-3">
                                <!-- Mobile Filter Toggle Button -->
                                <button class="mobile-filter-toggle" id="mobileFilterToggle">
                                    <i class="fal fa-filter"></i> Bộ lọc & Tìm kiếm
                                </button>

                                <!-- Sidebar Overlay for Mobile -->
                                <div class="sidebar-overlay" id="sidebarOverlay"></div>

                                <!-- Sidebar Wrapper -->
                                <div class="shop-sidebar-wrapper" id="shopSidebar">
                                    <!-- Close Button for Mobile -->
                                    <button class="sidebar-close-btn" id="sidebarCloseBtn">
                                        <i class="fal fa-times"></i>
                                    </button>

                                    <div class="shop-sidebar">
                                    
                                    <!-- Search Bar -->
                                    <div class="sidebar-widget">
                                        <h3 class="widget-title">
                                            <i class="fal fa-search"></i> Tìm kiếm
                                        </h3>
                                        <div class="search-form" style="position: relative;">
                                            <form action="{{ route('shop') }}" method="GET" id="searchForm">
                                                <input type="text" 
                                                       name="q" 
                                                       id="search-input" 
                                                       placeholder="Tìm kiếm sản phẩm, SKU..." 
                                                       value="{{ request('q') }}" 
                                                       aria-label="Tìm kiếm sản phẩm" 
                                                       autocomplete="off"
                                                       data-autocomplete-url="{{ route('product.autocomplete') }}"
                                                       data-shop-url="{{ route('shop') }}">
                                                <button type="submit" aria-label="Tìm kiếm">
                                                    <i class="fal fa-search"></i>
                                                </button>
                                            </form>
                                            
                                            <!-- Autocomplete Dropdown -->
                                            <div id="autocomplete-dropdown" class="autocomplete-dropdown" style="display: none;">
                                                <div class="autocomplete-list"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Sort By -->
                                    <div class="sidebar-widget">
                                        <h3 class="widget-title">
                                            <i class="fal fa-sort"></i> Sắp xếp theo
                                        </h3>
                                        <form id="filterForm" method="GET" action="{{ route('shop') }}">
                                            <select class="sort-select" name="sort" aria-label="Sắp xếp sản phẩm">
                                                <option value="newest" {{ request('sort', 'newest') == 'newest' ? 'selected' : '' }}>Mới nhất</option>
                                                <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Phổ biến nhất</option>
                                                <option value="price-low" {{ request('sort') == 'price-low' ? 'selected' : '' }}>Giá: Thấp đến cao</option>
                                                <option value="price-high" {{ request('sort') == 'price-high' ? 'selected' : '' }}>Giá: Cao đến thấp</option>
                                            </select>

                                            <!-- Filter: Hãng -->
                                            <div class="sidebar-widget pt-20">
                                                <h3 class="widget-title">
                                                    <i class="fal fa-copyright"></i> Hãng
                                                </h3>
                                                <ul class="filter-list">
                                                    @php
                                                        $selectedBrands = request('brand') ? explode(',', request('brand')) : [];
                                                    @endphp
                                                    @forelse($brands ?? [] as $brand)
                                                    <li>
                                                        <label class="filter-checkbox">
                                                            <input type="checkbox" name="brand[]" value="{{ $brand->name }}" {{ in_array($brand->name, $selectedBrands) ? 'checked' : '' }}>
                                                            <span class="checkmark"></span>
                                                            @if(!empty($brand->logo_url))
                                                                @php
                                                                    $logoSrc = str_starts_with($brand->logo_url, 'http') ? $brand->logo_url : asset($brand->logo_url);
                                                                @endphp
                                                                <img src="{{ $logoSrc }}" alt="{{ $brand->name }}" style="max-height:20px; display:inline-block; vertical-align:middle; margin-left:8px; object-fit:contain;" />
                                                            @else
                                                                <span style="margin-left:8px;">{{ $brand->name }}</span>
                                                            @endif
                                                        </label>
                                                    </li>
                                                    @empty
                                                    <li class="text-muted text-sm">Chưa có hãng nào</li>
                                                    @endforelse
                                                </ul>
                                            </div>

                                            <!-- Filter: Phân loại (Categories) -->
                                            <div class="sidebar-widget">
                                                <h3 class="widget-title">
                                                    <i class="fal fa-list"></i> Phân loại
                                                </h3>
                                                <ul class="filter-list">
                                                    @php
                                                        // Selected categories are slugs now (comma-separated)
                                                        $selectedCategories = request('category') ? explode(',', request('category')) : [];
                                                    @endphp

                                                    <ul class="filter-list">
                                                        @foreach($categories ?? [] as $rootCategory)
                                                            <li>
                                                                <label class="filter-checkbox">
                                                                    <input type="checkbox" name="category[]" value="{{ $rootCategory->slug }}" 
                                                                        {{ in_array($rootCategory->slug, $selectedCategories) ? 'checked' : '' }}>
                                                                    <span class="checkmark"></span>
                                                                    {{ $rootCategory->name }}
                                                                </label>

                                                                @if($rootCategory->children->count() > 0)
                                                                    <ul class="subcategory-list" style="margin-left: 20px; list-style: none;">
                                                                        @foreach($rootCategory->children as $child)
                                                                            <li>
                                                                                <label class="filter-checkbox">
                                                                                    <input type="checkbox" name="category[]" value="{{ $child->slug }}" 
                                                                                        {{ in_array($child->slug, $selectedCategories) ? 'checked' : '' }}>
                                                                                    <span class="checkmark"></span>
                                                                                    {{ $child->name }}
                                                                                </label>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                            </div>                                            <!-- Hidden field for search query -->
                                            @if(request('q'))
                                                <input type="hidden" name="q" value="{{ request('q') }}">
                                            @endif

                                            <!-- Filter Actions -->
                                            <div class="filter-actions">
                                                <button type="submit" class="btn-apply-filter">
                                                    <i class="fal fa-check"></i> Áp dụng
                                                </button>
                                                <a href="{{ route('shop') }}" class="btn-clear-filter">
                                                    <i class="fal fa-redo"></i> Xóa bộ lọc
                                                </a>
                                                <!-- Mobile-only Done/Close button -->
                                                <button type="button" id="mobileFilterDone" class="btn-apply-filter" style="display:none;">
                                                    <i class="fal fa-times"></i> Đóng
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                                </div><!-- End shop-sidebar-wrapper -->
                            </div>

                            <!-- Products Grid -->
                            <div class="col-lg-9">
                                <!-- Results Header -->
                                <div class="shop-header mb-4">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            <p class="results-count">
                                                Hiển thị <strong>{{ $products->firstItem() ?? 0 }}</strong> - <strong>{{ $products->lastItem() ?? 0 }}</strong> 
                                                của <strong>{{ $products->total() }}</strong> sản phẩm
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="shop-products pb-150">
                                    <div class="row">
                                        
                                        @forelse($products as $product)
                                        <!-- Product Card -->
                                        <div class="col-lg-4 col-md-6 col-sm-6 mb-30">
                                            <div class="product-card">
                                                <div class="product-image">
                                                    <a href="{{ route('product.show', $product->slug) }}" title="{{ $product->name }}">
                                                        @if($product->image_url)
                                                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" loading="lazy">
                                                        @else
                                                            <img src="{{ asset('assets/img/product/default.jpg') }}" alt="{{ $product->name }}" loading="lazy">
                                                        @endif
                                                    </a>
                                                    
                                                    @if($product->featured)
                                                    <span class="badge-featured">Nổi bật</span>
                                                    @endif
                                                    
                                                    @if($product->sale_price && $product->sale_price < $product->price)
                                                    <span class="badge-sale">Giảm giá</span>
                                                    @endif
                                                </div>
                                                
                                                <div class="product-info">
                                                    <div class="product-brand">{{ $product->brand }}</div>
                                                    <h4 class="product-title">
                                                        <a href="{{ route('product.show', $product->slug) }}" title="{{ $product->name }}">
                                                            {{ $product->name }}
                                                        </a>
                                                    </h4>
                                                    
                                                    @if($product->short_description)
                                                    <p class="product-description">{{ Str::limit($product->short_description, 80) }}</p>
                                                    @endif
                                                    
                                                    <div class="product-meta">
                                                        @if($product->sku)
                                                        <span class="product-sku">SKU: {{ $product->sku }}</span>
                                                        @endif
                                                        
                                                        @if($product->stock_status === 'in_stock')
                                                        <span class="stock-status in-stock">
                                                            <i class="fal fa-check-circle"></i> Còn hàng
                                                        </span>
                                                        @elseif($product->stock_status === 'pre_order')
                                                        <span class="stock-status pre-order">
                                                            <i class="fal fa-check-circle"></i> đặt hàng trước
                                                        </span>
                                                        @else
                                                        <span class="stock-status out-stock">
                                                            <i class="fal fa-times-circle"></i> Hết hàng
                                                        </span>
                                                        @endif
                                                    </div>
                                                    
                                                    <div class="product-bottom">
                                                        <div class="product-price">
                                                            @if($product->sale_price && $product->sale_price < $product->price)
                                                                <span class="price-sale">{{ number_format($product->sale_price, 0, ',', '.') }}đ</span>
                                                                <span class="price-regular">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                                                            @else
                                                                <span class="price-current">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                                                            @endif
                                                        </div>
                                                        
                                                        <a href="{{ route('product.show', $product->slug) }}" class="btn-view-detail" title="Xem chi tiết {{ $product->name }}">
                                                            <i class="fal fa-arrow-right"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                        <div class="col-12">
                                            <div class="no-products">
                                                <i class="fal fa-box-open"></i>
                                                <h3>Không tìm thấy sản phẩm</h3>
                                                <p>Vui lòng thử điều chỉnh bộ lọc hoặc tìm kiếm với từ khóa khác.</p>
                                            </div>
                                        </div>
                                        @endforelse
                                        
                                    </div>
                                    
                                    <!-- Pagination -->
                                    @if($products->hasPages())
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="shop-pagination">
                                                <nav aria-label="Phân trang sản phẩm">
                                                    <ul class="pagination">
                                                        <!-- Previous Button -->
                                                        @if($products->onFirstPage())
                                                            <li class="disabled" aria-disabled="true">
                                                                <span><i class="fal fa-angle-left"></i> Trước</span>
                                                            </li>
                                                        @else
                                                            <li>
                                                                <a href="{{ $products->previousPageUrl() }}" rel="prev">
                                                                    <i class="fal fa-angle-left"></i> Trước
                                                                </a>
                                                            </li>
                                                        @endif
                                                        
                                                        <!-- Page Numbers -->
                                                        @foreach($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                                                            @if($page == $products->currentPage())
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
                                                        @if($products->hasMorePages())
                                                            <li>
                                                                <a href="{{ $products->nextPageUrl() }}" rel="next">
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
                </section>
                
            </main>
            
            @include('front.includes.footer')
        </div>
    </div>
    
 


<script src="{{ asset('assets/js/vendor/jquery.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-bundle.js') }}"></script>
<script src="{{ asset('assets/js/swiper-bundle.js') }}"></script>
<script src="{{ asset('assets/js/plugin.js') }}"></script>
<script src="{{ asset('assets/js/three.js') }}"></script>
<script src="{{ asset('assets/js/slick.js') }}"></script>
<script src="{{ asset('assets/js/scroll-magic.js') }}"></script>
<script src="{{ asset('assets/js/hover-effect.umd.js') }}"></script>
<script src="{{ asset('assets/js/parallax-slider.js') }}"></script>
<script src="{{ asset('assets/js/purecounter.js') }}"></script>
<script src="{{ asset('assets/js/isotope-pkgd.js') }}"></script>
<script src="{{ asset('assets/js/imagesloaded-pkgd.js') }}"></script>
<script src="{{ asset('assets/js/Observer.min.js') }}"></script>
<script src="{{ asset('assets/js/splitting.min.js') }}"></script>
<script src="{{ asset('assets/js/webgl.js') }}"></script>
<script src="{{ asset('assets/js/parallax-scroll.js') }}"></script>
<script src="{{ asset('assets/js/atropos.js') }}"></script>
<script src="{{ asset('assets/js/slider-active.js') }}"></script>
<script src="{{ asset('assets/js/magnific-popup.js') }}"></script>
<script src="{{ asset('assets/js/nice-select.js') }}"></script>
<script src="{{ asset('assets/js/ajax-form.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/tp-cursor.js') }}"></script>
<script src="{{ asset('assets/js/portfolio-slider-1.js') }}"></script>
<script src="{{ asset('assets/js/contact.js') }}"></script>
<script src="{{ asset('assets/js/shop.js') }}"></script>
<script src="{{ asset('assets/js/productDetails.js') }}"></script>
<script src="{{ asset('assets/js/contact.js') }}"></script>

<!-- Module scripts -->
<script type="module" src="{{ asset('assets/js/distortion-img.js') }}"></script>
<script type="module" src="{{ asset('assets/js/skew-slider/index.js') }}"></script>
<script type="module" src="{{ asset('assets/js/img-revel/index.js') }}"></script>


</body>
</html>