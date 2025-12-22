<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    {{-- SEO Meta Tags --}}
    <title>{{ $product->meta_title ?? $product->name . ' - AIControl Vietnam' }}</title>
    <meta name="description" content="{{ $product->meta_description ?? Str::limit($product->short_description, 160) }}">
    <meta name="keywords" content="{{ is_array($product->tags) ? implode(', ', $product->tags) : $product->tags }}">
    
    {{-- Canonical URL --}}
    <link rel="canonical" href="{{ route('product.detail', $product->slug) }}">
    
    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="product">
    <meta property="og:title" content="{{ $product->meta_title ?? $product->name }}">
    <meta property="og:description" content="{{ $product->meta_description ?? $product->short_description }}">
    <meta property="og:image" content="{{ asset('storage/' . $product->image_url) }}">
    <meta property="og:url" content="{{ route('product.detail', $product->slug) }}">
    <meta property="og:site_name" content="AIControl Vietnam">
    <meta property="product:price:amount" content="{{ $product->price }}">
    <meta property="product:price:currency" content="{{ $product->currency }}">
    
    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $product->meta_title ?? $product->name }}">
    <meta name="twitter:description" content="{{ $product->meta_description ?? $product->short_description }}">
    <meta name="twitter:image" content="{{ asset('storage/' . $product->image_url) }}">
    
    {{-- Schema.org JSON-LD --}}
    <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "Product",
      "name": "{{ $product->name }}",
      "image": [
        "{{ asset('storage/' . $product->image_url) }}"
        @if($product->gallery_images)
        @foreach($product->gallery_images as $image)
        @php
            $imageUrl = is_array($image) ? ($image['url'] ?? '') : $image;
        @endphp
        @if(!empty($imageUrl))
        ,"{{ asset('storage/' . $imageUrl) }}"
        @endif
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
        "price": "{{ $product->price }}",
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
        "worstRating": "1"
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
          "item": "{{ route(current_locale() . '.shop') }}"
        },
        {
          "@type": "ListItem",
          "position": 3,
          "name": "{{ $product->brand }}",
          "item": "{{ route('brand.products', strtolower($product->brand)) }}"
        },
        {
          "@type": "ListItem",
          "position": 4,
          "name": "{{ $product->name }}"
        }
      ]
    }
    </script>
    
    @yield('extra-meta')
    
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>
<body>
    
    @yield('content')
    
    {{-- JS --}}
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
