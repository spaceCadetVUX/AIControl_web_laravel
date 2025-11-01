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
    <link rel="stylesheet" href="{{ assets('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ assets('assets/css/font-awesome-pro.css') }}">
    <link rel="stylesheet" href="{{ assets('assets/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ assets('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ assets('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ assets('assets/css/shop.css') }}">

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
                                <div class="shop-sidebar">
                                    
                                    <!-- Search Bar -->
                                    <div class="sidebar-widget">
                                        <h3 class="widget-title">
                                            <i class="fal fa-search"></i> Tìm kiếm
                                        </h3>
                                        <div class="search-form">
                                            <form action="{{ route('shop') }}" method="GET" id="searchForm">
                                                <input type="text" name="q" placeholder="Tìm kiếm sản phẩm..." value="{{ request('q') }}" aria-label="Tìm kiếm sản phẩm">
                                                <button type="submit" aria-label="Tìm kiếm">
                                                    <i class="fal fa-search"></i>
                                                </button>
                                            </form>
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
                                            <div class="sidebar-widget">
                                                <h3 class="widget-title">
                                                    <i class="fal fa-copyright"></i> Hãng
                                                </h3>
                                                <ul class="filter-list">
                                                    @php
                                                        $selectedBrands = request('brand') ? explode(',', request('brand')) : [];
                                                    @endphp
                                                    <li>
                                                        <label class="filter-checkbox">
                                                            <input type="checkbox" name="brand[]" value="ABB" {{ in_array('ABB', $selectedBrands) ? 'checked' : '' }}>
                                                            <span class="checkmark"></span>
                                                            ABB
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="filter-checkbox">
                                                            <input type="checkbox" name="brand[]" value="Legrand" {{ in_array('Legrand', $selectedBrands) ? 'checked' : '' }}>
                                                            <span class="checkmark"></span>
                                                            Legrand
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="filter-checkbox">
                                                            <input type="checkbox" name="brand[]" value="Vantage" {{ in_array('Vantage', $selectedBrands) ? 'checked' : '' }}>
                                                            <span class="checkmark"></span>
                                                            Vantage
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="filter-checkbox">
                                                            <input type="checkbox" name="brand[]" value="CP Electronics" {{ in_array('CP Electronics', $selectedBrands) ? 'checked' : '' }}>
                                                            <span class="checkmark"></span>
                                                            CP Electronics
                                                        </label>
                                                    </li>
                                                </ul>
                                            </div>

                                            <!-- Filter: Điều khiển -->
                                            <div class="sidebar-widget">
                                                <h3 class="widget-title">
                                                    <i class="fal fa-list"></i> Điều khiển
                                                </h3>
                                                <ul class="filter-list">
                                                    @php
                                                        $selectedCategories = request('category') ? explode(',', request('category')) : [];
                                                    @endphp
                                                    <li>
                                                        <label class="filter-checkbox">
                                                            <input type="checkbox" name="category[]" value="Chiếu sáng" {{ in_array('Chiếu sáng', $selectedCategories) ? 'checked' : '' }}>
                                                            <span class="checkmark"></span>
                                                            <i class="fal fa-lightbulb"></i> Chiếu sáng
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="filter-checkbox">
                                                            <input type="checkbox" name="category[]" value="Rèm cửa" {{ in_array('Rèm cửa', $selectedCategories) ? 'checked' : '' }}>
                                                            <span class="checkmark"></span>
                                                            <i class="fal fa-blinds"></i> Rèm cửa
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="filter-checkbox">
                                                            <input type="checkbox" name="category[]" value="HVAC" {{ in_array('HVAC', $selectedCategories) ? 'checked' : '' }}>
                                                            <span class="checkmark"></span>
                                                            <i class="fal fa-temperature-high"></i> HVAC
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="filter-checkbox">
                                                            <input type="checkbox" name="category[]" value="Cảm biến" {{ in_array('Cảm biến', $selectedCategories) ? 'checked' : '' }}>
                                                            <span class="checkmark"></span>
                                                            <i class="fal fa-sensor"></i> Cảm biến
                                                        </label>
                                                    </li>
                                                </ul>
                                            </div>

                                            <!-- Hidden field for search query -->
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
                                                            <img src="{{ assets('assets/img/product/default.jpg') }}" alt="{{ $product->name }}" loading="lazy">
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
                                                        
                                                        @if($product->in_stock)
                                                        <span class="stock-status in-stock">
                                                            <i class="fal fa-check-circle"></i> Còn hàng
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
    
    <!-- JS -->
    <script src="{{ assets('assets/js/vendor/jquery.js') }}"></script>
    <script src="{{ assets('assets/js/bootstrap-bundle.js') }}"></script>
    <script src="{{ assets('assets/js/main.js') }}"></script>
    
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
        });
    </script>
    
    <!-- Filter Functionality -->
    <script>
        $(document).ready(function() {
            // Auto-submit on sort change
            $('.sort-select').on('change', function() {
                $('#filterForm').submit();
            });

            // Auto-submit on filter checkbox change (optional - remove if you want manual apply)
            $('.filter-checkbox input[type="checkbox"]').on('change', function() {
                // Uncomment the line below if you want auto-submit on checkbox change
                // $('#filterForm').submit();
            });

            // Convert brand[] and category[] arrays to comma-separated before submit
            $('#filterForm').on('submit', function(e) {
                e.preventDefault();
                
                const form = $(this);
                const formData = new FormData(this);
                const params = new URLSearchParams();

                // Get sort
                const sort = formData.get('sort');
                if (sort && sort !== 'newest') {
                    params.append('sort', sort);
                }

                // Get search query
                const searchQuery = formData.get('q');
                if (searchQuery) {
                    params.append('q', searchQuery);
                }

                // Get selected brands
                const brands = formData.getAll('brand[]').filter(Boolean);
                if (brands.length > 0) {
                    params.append('brand', brands.join(','));
                }

                // Get selected categories
                const categories = formData.getAll('category[]').filter(Boolean);
                if (categories.length > 0) {
                    params.append('category', categories.join(','));
                }

                // Build URL and redirect
                const baseUrl = '{{ route("shop") }}';
                const queryString = params.toString();
                const url = queryString ? `${baseUrl}?${queryString}` : baseUrl;
                
                window.location.href = url;
            });
        });
    </script>
</body>
</html>
