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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>


</head>

<body>
    @include('front.includes.offcanvas')
    @include('front.includes.header')
    
    <div id="smooth-wrapper">
        <div id="smooth-content">
            <main>
                
                <!-- Shop Page -->
                <section class="shop-area pt-120 pb-120">
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
                                                            {{ $brand->name }}
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
                                                        $selectedCategories = request('category') ? explode(',', request('category')) : [];
                                                    @endphp
                                                    @foreach($categories ?? [] as $rootCategory)
                                                        <li>
                                                            <div style="display: flex; align-items: center; justify-content: space-between;">
                                                                <label class="filter-checkbox" style="flex: 1;">
                                                                    <input type="checkbox" name="category[]" value="{{ $rootCategory->id }}" {{ in_array($rootCategory->id, $selectedCategories) ? 'checked' : '' }}>
                                                                    <span class="checkmark"></span>
                                                                    <i class="fal fa-folder"></i> <span style="font-weight: 700">{{ $rootCategory->name }}</span>
                                                                    <span class="count">({{ $rootCategory->total_product_count }})</span>
                                                                </label>
                                                                @if($rootCategory->children->count() > 0)
                                                                    <button type="button" class="category-toggle" data-category-id="{{ $rootCategory->id }}" style="background: none; border: none; cursor: pointer; padding: 5px; color: #666;">
                                                                        <i class="fal fa-chevron-down"></i>
                                                                    </button>
                                                                @endif
                                                            </div>
                                                            @if($rootCategory->children->count() > 0)
                                                                <ul class="subcategory-list" id="subcategory-{{ $rootCategory->id }}" style="margin-left: 20px; list-style: none; display: block;">
                                                                    @foreach($rootCategory->children as $child)
                                                                        <li>
                                                                            <label class="filter-checkbox">
                                                                                <input type="checkbox" name="category[]" value="{{ $child->id }}" {{ in_array($child->id, $selectedCategories) ? 'checked' : '' }}>
                                                                                <span class="checkmark"></span>
                                                                                {{ $child->name }}
                                                                                <span class="count">({{ $child->product_count }})</span>
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

                                <div class="shop-products">
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

<!-- Module scripts -->
<script type="module" src="{{ asset('assets/js/distortion-img.js') }}"></script>
<script type="module" src="{{ asset('assets/js/skew-slider/index.js') }}"></script>
<script type="module" src="{{ asset('assets/js/img-revel/index.js') }}"></script>


    
    
 
    
    <!-- Offcanvas Toggle -->
    <script>
        // Offcanvas functionality
        $(document).ready(function() {
            const $offcanvas = $('.tp-offcanvas-2-area');
            const $body = $('body');

            // Open offcanvas
            $('.tp-offcanvas-open-btn').on('click', function(e) {
                e.preventDefault();
                $offcanvas.addClass('opened');
                $body.addClass('offcanvas-opened');
            });

            // Close offcanvas
            $('.tp-offcanvas-2-close-btn').on('click', function(e) {
                e.preventDefault();
                $offcanvas.removeClass('opened');
                $body.removeClass('offcanvas-opened');
            });

            // Close on outside click
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.tp-offcanvas-2-area, .tp-offcanvas-open-btn').length) {
                    $offcanvas.removeClass('opened');
                    $body.removeClass('offcanvas-opened');
                }
            });

            // Category expand/collapse toggle
            $('.category-toggle').on('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                const categoryId = $(this).data('category-id');
                const $subcategoryList = $('#subcategory-' + categoryId);
                const $icon = $(this).find('i');
                
                if ($subcategoryList.is(':visible')) {
                    $subcategoryList.slideUp(200);
                    $icon.removeClass('fa-chevron-up').addClass('fa-chevron-down');
                } else {
                    $subcategoryList.slideDown(200);
                    $icon.removeClass('fa-chevron-down').addClass('fa-chevron-up');
                }
            });
        });
    </script>
</body>
</html>