<!doctype html>
<html class="no-js" lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    {{-- SEO Meta Tags --}}
    <title>{{ $product->meta_title ?? $product->name . ' - AIControl Vietnam' }}</title>
    <meta name="description" content="{{ $product->meta_description ?? Str::limit($product->short_description, 160) }}">
    <meta name="keywords" content="{{ $product->meta_keywords ?? $product->brand . ', ' . $product->name }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    {{-- Canonical URL --}}
    <link rel="canonical" href="{{ route('product.detail', $product->slug) }}">
    
    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="product">
    <meta property="og:title" content="{{ $product->og_title ?? $product->meta_title ?? $product->name }}">
    <meta property="og:description" content="{{ $product->og_description ?? $product->meta_description ?? $product->short_description }}">
    <meta property="og:image" content="{{ $product->image_url ? asset('storage/' . $product->image_url) : asset('assets/img/default-product.jpg') }}">
    <meta property="og:url" content="{{ route('product.detail', $product->slug) }}">
    <meta property="og:site_name" content="AIControl Vietnam">
    <meta property="product:price:amount" content="{{ $product->sale_price ?? $product->price }}">
    <meta property="product:price:currency" content="{{ $product->currency }}">
    
    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $product->meta_title ?? $product->name }}">
    <meta name="twitter:description" content="{{ $product->meta_description ?? $product->short_description }}">
    <meta name="twitter:image" content="{{ $product->image_url ? asset('storage/' . $product->image_url) : asset('assets/img/default-product.jpg') }}">
    
    {{-- Schema.org JSON-LD --}}
    <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "Product",
      "name": "{{ $product->name }}",
      "image": [
        "{{ $product->image_url ? asset('storage/' . $product->image_url) : '' }}"
        @if($product->gallery_images)
        @foreach($product->gallery_images as $image)
        ,"{{ asset('storage/' . $image) }}"
        @endforeach
        @endif
      ],
      "description": "{{ $product->meta_description ?? $product->short_description }}",
      "sku": "{{ $product->sku }}",
      "brand": {
        "@type": "Brand",
        "name": "{{ $product->brand }}"
      },
      "offers": {
        "@type": "Offer",
        "url": "{{ route('product.detail', $product->slug) }}",
        "priceCurrency": "{{ $product->currency }}",
        "price": "{{ $product->sale_price ?? $product->price }}",
        "availability": "https://schema.org/{{ $product->stock_status == 'in_stock' ? 'InStock' : 'OutOfStock' }}",
        "seller": {
          "@type": "Organization",
          "name": "AIControl Vietnam"
        }
      }
      @if($product->rating)
      ,"aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "{{ $product->rating }}",
        "bestRating": "5",
        "worstRating": "1",
        "ratingCount": "{{ $product->review_count ?? 1 }}"
      }
      @endif
    }
    </script>
    
    {{-- Breadcrumb Schema --}}
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "BreadcrumbList",
      "itemListElement": [
        {
          "@type": "ListItem",
          "position": 1,
          "name": "Trang chủ",
          "item": "{{ route('home') }}"
        },
        {
          "@type": "ListItem",
          "position": 2,
          "name": "Sản phẩm",
          "item": "{{ route('shop') }}"
        },
        {
          "@type": "ListItem",
          "position": 3,
          "name": "{{ $product->brand }}",
          "item": "{{ route('brand.products', $product->brand) }}"
        },
        {
          "@type": "ListItem",
          "position": 4,
          "name": "{{ $product->name }}"
        }
      ]
    }
    </script>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.png') }}">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome-pro.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/products.css') }}">
</head>

<body class="" data-bg-color="#fff">

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
                
                <!-- Breadcrumb -->
                <section class="breadcrumb__area pt-120 pb-60" style="background: #f5f5f5;">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('shop') }}">Sản phẩm</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('brand.products', $product->brand) }}">{{ $product->brand }}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Product Detail -->
                <section class="product-detail pt-80 pb-80">
                    <div class="container">
                        <div class="row">
                            
                            <!-- Product Images -->
                            <div class="col-lg-6">
                                <div class="product-images sticky-top" style="top: 100px;">
                                    <!-- Main Image -->
                                    <div class="main-image mb-3" style="background: #f8f8f8; border-radius: 8px; padding: 40px; min-height: 500px; display: flex; align-items: center; justify-content: center;">
                                        @if($product->image_url)
                                            <img src="{{ asset('storage/' . $product->image_url) }}" 
                                                 alt="{{ $product->name }}" 
                                                 id="mainImage"
                                                 style="max-width: 100%; max-height: 500px; object-fit: contain;">
                                        @else
                                            <div style="text-align: center; color: #ccc;">
                                                <i class="fa fa-image" style="font-size: 100px;"></i>
                                                <p class="mt-3">Chưa có hình ảnh</p>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Gallery Images -->
                                    @if($product->gallery_images && count($product->gallery_images) > 0)
                                    <div class="gallery-images d-flex gap-2">
                                        @foreach($product->gallery_images as $image)
                                        <div class="gallery-item" style="width: 80px; height: 80px; background: #f8f8f8; border-radius: 4px; cursor: pointer; overflow: hidden;">
                                            <img src="{{ asset('storage/' . $image) }}" 
                                                 alt="{{ $product->name }}" 
                                                 onclick="changeMainImage(this.src)"
                                                 style="width: 100%; height: 100%; object-fit: cover;">
                                        </div>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Product Info -->
                            <div class="col-lg-6">
                                <div class="product-info">
                                    
                                    <!-- Brand Badge -->
                                    <div class="mb-3">
                                        <span class="badge bg-primary">{{ $product->brand }}</span>
                                        @if($product->featured)
                                            <span class="badge bg-danger ms-2">Nổi bật</span>
                                        @endif
                                        @if($product->is_new)
                                            <span class="badge bg-success ms-2">Mới</span>
                                        @endif
                                    </div>

                                    <!-- Product Name -->
                                    <h1 class="product-title mb-3" style="font-size: 32px; font-weight: 600;">
                                        {{ $product->name }}
                                    </h1>

                                    <!-- SKU -->
                                    <p class="text-muted mb-3">SKU: {{ $product->sku }}</p>

                                    <!-- Rating -->
                                    @if($product->rating)
                                    <div class="rating mb-3">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $product->rating)
                                                <i class="fa fa-star text-warning"></i>
                                            @else
                                                <i class="fa fa-star-o text-muted"></i>
                                            @endif
                                        @endfor
                                        <span class="ms-2">({{ $product->review_count ?? 0 }} đánh giá)</span>
                                    </div>
                                    @endif

                                    <!-- Price -->
                                    <div class="product-price mb-4 p-3" style="background: #f8f8f8; border-radius: 8px;">
                                        @if($product->sale_price && $product->sale_price < $product->price)
                                            <div class="d-flex align-items-center gap-3">
                                                <span class="old-price text-muted text-decoration-line-through" style="font-size: 20px;">
                                                    {{ number_format($product->price, 0, ',', '.') }}đ
                                                </span>
                                                <span class="new-price fw-bold" style="color: #FF5722; font-size: 32px;">
                                                    {{ number_format($product->sale_price, 0, ',', '.') }}đ
                                                </span>
                                                <span class="badge bg-danger">
                                                    Giảm {{ round((($product->price - $product->sale_price) / $product->price) * 100) }}%
                                                </span>
                                            </div>
                                        @else
                                            <span class="price fw-bold" style="font-size: 32px; color: #FF5722;">
                                                {{ number_format($product->price, 0, ',', '.') }}đ
                                            </span>
                                        @endif
                                    </div>

                                    <!-- Short Description -->
                                    @if($product->short_description)
                                    <div class="short-description mb-4">
                                        <p style="font-size: 16px; line-height: 1.6;">
                                            {{ $product->short_description }}
                                        </p>
                                    </div>
                                    @endif

                                    <!-- Stock Status -->
                                    <div class="stock-status mb-4">
                                        <strong>Tình trạng: </strong>
                                        @if($product->stock_status == 'in_stock')
                                            <span class="text-success"><i class="fa fa-check-circle"></i> Còn hàng</span>
                                        @elseif($product->stock_status == 'out_of_stock')
                                            <span class="text-danger"><i class="fa fa-times-circle"></i> Hết hàng</span>
                                        @else
                                            <span class="text-warning"><i class="fa fa-clock"></i> Đặt trước</span>
                                        @endif
                                    </div>

                                    <!-- Product Attributes -->
                                    <div class="product-attributes mb-4">
                                        @if($product->warranty_period)
                                        <p><strong>Bảo hành:</strong> {{ $product->warranty_period }}</p>
                                        @endif
                                        @if($product->manufacturer_country)
                                        <p><strong>Xuất xứ:</strong> {{ $product->manufacturer_country }}</p>
                                        @endif
                                        @if($product->color)
                                        <p><strong>Màu sắc:</strong> {{ $product->color }}</p>
                                        @endif
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="action-buttons d-flex gap-3 mb-4">
                                        <a href="tel:0918918755" class="btn btn-lg" style="background: #FF5722; color: white; flex: 1;">
                                            <i class="fa fa-phone"></i> Gọi ngay: 0918918755
                                        </a>
                                        <a href="{{ route('contact') }}" class="btn btn-lg btn-outline-primary" style="flex: 1;">
                                            <i class="fa fa-envelope"></i> Liên hệ tư vấn
                                        </a>
                                    </div>

                                    <!-- View Count -->
                                    <p class="text-muted"><i class="fa fa-eye"></i> {{ $product->view_count }} lượt xem</p>

                                </div>
                            </div>

                        </div>

                        <!-- Product Description & Specifications -->
                        <div class="row mt-5">
                            <div class="col-lg-12">
                                <ul class="nav nav-tabs mb-4" id="productTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button">
                                            Mô tả chi tiết
                                        </button>
                                    </li>
                                    @if($product->specifications)
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="specs-tab" data-bs-toggle="tab" data-bs-target="#specs" type="button">
                                            Thông số kỹ thuật
                                        </button>
                                    </li>
                                    @endif
                                    @if($product->manual_url || $product->datasheet_url)
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="downloads-tab" data-bs-toggle="tab" data-bs-target="#downloads" type="button">
                                            Tài liệu tải về
                                        </button>
                                    </li>
                                    @endif
                                </ul>

                                <div class="tab-content" id="productTabContent">
                                    <!-- Description -->
                                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                                        <div class="description-content">
                                            {!! $product->description ?? '<p>Đang cập nhật thông tin chi tiết...</p>' !!}
                                        </div>
                                    </div>

                                    <!-- Specifications -->
                                    @if($product->specifications)
                                    <div class="tab-pane fade" id="specs" role="tabpanel">
                                        <div class="specifications-content">
                                            <table class="table table-bordered">
                                                @foreach($product->specifications as $key => $value)
                                                <tr>
                                                    <td style="width: 200px;"><strong>{{ $key }}</strong></td>
                                                    <td>{{ $value }}</td>
                                                </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                    @endif

                                    <!-- Downloads -->
                                    @if($product->manual_url || $product->datasheet_url)
                                    <div class="tab-pane fade" id="downloads" role="tabpanel">
                                        <div class="downloads-content">
                                            @if($product->manual_url)
                                            <p><a href="{{ asset('storage/' . $product->manual_url) }}" target="_blank" class="btn btn-outline-primary">
                                                <i class="fa fa-download"></i> Tải hướng dẫn sử dụng
                                            </a></p>
                                            @endif
                                            @if($product->datasheet_url)
                                            <p><a href="{{ asset('storage/' . $product->datasheet_url) }}" target="_blank" class="btn btn-outline-primary">
                                                <i class="fa fa-download"></i> Tải tài liệu kỹ thuật
                                            </a></p>
                                            @endif
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Related Products -->
                        @if($relatedProducts->count() > 0)
                        <div class="row mt-5">
                            <div class="col-lg-12">
                                <h3 class="mb-4">Sản phẩm liên quan</h3>
                                <div class="row">
                                    @foreach($relatedProducts as $relatedProduct)
                                    <div class="col-lg-3 col-md-6 mb-4">
                                        <div class="product-card" style="border: 1px solid #e5e5e5; border-radius: 8px; padding: 15px;">
                                            <div class="product-image mb-3" style="background: #f8f8f8; height: 200px; display: flex; align-items: center; justify-content: center;">
                                                @if($relatedProduct->image_url)
                                                    <img src="{{ asset('storage/' . $relatedProduct->image_url) }}" 
                                                         alt="{{ $relatedProduct->name }}" 
                                                         style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                                @else
                                                    <i class="fa fa-image" style="font-size: 48px; color: #ccc;"></i>
                                                @endif
                                            </div>
                                            <h5 style="font-size: 14px; min-height: 40px;">{{ Str::limit($relatedProduct->name, 50) }}</h5>
                                            <p class="text-primary fw-bold">{{ number_format($relatedProduct->price, 0, ',', '.') }}đ</p>
                                            <a href="{{ route('product.detail', $relatedProduct->slug) }}" class="btn btn-sm btn-outline-primary w-100">Xem chi tiết</a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif

                    </div>
                </section>

            </main>

            <!-- Footer -->
            @include('front.includes.footer')
        </div>
    </div>

    <!-- JS -->
    <script src="{{ asset('assets/js/vendor/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-bundle.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script>
        // Change main image when clicking gallery
        function changeMainImage(src) {
            document.getElementById('mainImage').src = src;
        }
    </script>

</body>
</html>
