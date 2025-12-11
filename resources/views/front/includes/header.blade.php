<!-- header area start -->
<header>
    <!-- header area start -->
    <div class="tp-header-8-area header-transparent tp-header-8-border" data-bg-color="#ffffffff">
        <div class="container container-1750">
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-header-8-wrapper d-flex align-items-center justify-content-between">
                        <div class="tp-header-8-left d-flex align-items-center">
                            <div class="tp-header-8-bar-wrap">
                                <button class="tp-header-8-bar tp-offcanvas-open-btn">
                                    <span>{{ __('header.menu') }}</span>
                                    <span>
                                        <svg width="24" height="8" viewBox="0 0 24 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0 0H14V1.5H0V0Z" fill="currentcolor" />
                                            <path d="M0 6H24V7.5H0V6Z" fill="currentcolor" />
                                        </svg>
                                    </span>
                                </button>
                            </div>
                            <div class="tp-header-8-lang d-none d-md-block">
                                @php
                                    $currentPath = request()->path();
                                    $isEnglish = str_starts_with($currentPath, 'en/') || $currentPath === 'en';
                                    
                                    // Get path without locale prefix
                                    if ($isEnglish) {
                                        // Remove 'en' or 'en/' prefix
                                        if ($currentPath === 'en') {
                                            $pathWithoutLocale = '';
                                        } else {
                                            $pathWithoutLocale = substr($currentPath, 3); // Remove 'en/'
                                        }
                                    } else {
                                        $pathWithoutLocale = $currentPath === '/' ? '' : $currentPath;
                                    }
                                    
                                    // Generate URLs
                                    $viUrl = url($pathWithoutLocale ? '/' . $pathWithoutLocale : '/');
                                    $enUrl = url($pathWithoutLocale ? '/en/' . $pathWithoutLocale : '/en');
                                @endphp
                                <a href="{{ $viUrl }}" class="{{ !$isEnglish ? 'active' : '' }}">VI</a>
                                <a href="{{ $enUrl }}" class="{{ $isEnglish ? 'active' : '' }}">EN</a>
                            </div>
                        </div>
                        <div class="tp-header-8-middle">
                            <div class="tp-header-logo">
                              <a href="{{ route('home') }}">
                                    <img data-width="200" src="{{ assets('assets/AIcontrol_imgs/mian_Icon/aicontrol-co-mau.svg') }}" alt="AIControl Homepage">
                                </a>
                            </div>
                        </div>
                        <div class="tp-header-8-right d-flex align-items-center d-none d-md-inline-flex">
                            <div class="tp-header-8-search-box">
                                <button class="tp-header-8-search tp-search-open-btn" aria-label="Open search">
                                    <span>
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path d="M19.0004 18.9999L14.6504 14.6499M17.0001 9.00004C17.0001 13.4183 13.4183 17.0001 9.00004 17.0001C4.58174 17.0001 1 13.4183 1 9.00004C1 4.58174 4.58174 1 9.00004 1C13.4183 1 17.0001 4.58174 17.0001 9.00004Z" stroke="#191919" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </button>
                            </div>
                            <div class="tp-header-8-btn">
                                <a class="tp-btn-border-2" id="openPopupBtn">
                                    {{ __('header.call_now') }}
                                    <span>
                                        <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 9L5 5L1 1" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="tp-mobile-menu-active d-none">
        <ul>
            <li>
                <a style="color: black" href="{{ route('home') }}">{{ __('header.nav_home') }}</a>
            </li>
            <li class="has-dropdown p-static is-active">
                <a href="#">{{ __('header.nav_solutions') }}</a>
                <ul class="tp-submenu submenu">
                    <li><a href="{{ route('lightingControl') }}">{{ __('header.solution_lighting') }}</a></li>
                    <li><a href="{{ route('shade') }}">{{ __('header.solution_shade') }}</a></li>
                    <li><a href="{{ route('hvacControl') }}">{{ __('header.solution_hvac') }}</a></li>
                    <li><a href="{{ route('security') }}">{{ __('header.solution_security') }}</a></li>
                    <li><a href="{{ route('bms') }}">{{ __('header.solution_bms') }}</a></li>
                    <li><a href="{{ route('hotelControl') }}">{{ __('header.solution_hotel') }}</a></li>
                </ul>
            </li>
            <li class="has-dropdown p-static is-active">
                <a href="#">{{ __('header.nav_partners') }}</a>
                <ul class="tp-submenu submenu">
                    <li><a href="{{ route('abb') }}">{{ __('header.partner_abb') }}</a></li>      
                    <li><a href="{{ route('legrand') }}">{{ __('header.partner_legrand') }}</a></li>
                    <li><a href="{{ route('vantage') }}">{{ __('header.partner_vantage') }}</a></li>
                    <li><a href="{{ route('cpElectronics') }}">{{ __('header.partner_cp') }}</a></li>
                </ul>
            </li>
            <li class="is-active">
                <a href="{{ route('shop') }}">{{ __('header.nav_products') }}</a>
            </li>
            <li class="is-active">
                <a href="{{ route('projects.index') }}">{{ __('header.nav_projects') }}</a>
            </li>
            <li class="is-active">
                <a href="{{ route('blogs') }}">{{ __('header.nav_blogs') }}</a>
            </li>
            {{-- <li class="has-dropdown is-active">
                <a href="#">Về chúng tôi</a>
                <ul class="tp-submenu submenu">
                    <li><a href="#">Giới thiệu</a></li>
                    <li><a href="#">Dịch vụ</a></li>
                    <li><a href="{{ route('contact') }}">Liên hệ</a></li>
                    <li><a href="#">FAQ's</a></li>
                </ul>
            </li> --}}
        </ul>
    </nav>
        <!-- contact_modal -->
    <!-- header area end -->
</header>
<!-- header area end -->

<!-- search area start -->
<div class="tp-search-area p-relative">
    <div class="tp-search-close">
        <button class="tp-search-close-btn" aria-label="Close search">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14 2L2 14M2 2L14 14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10">
                <div class="tp-search-content">
                    <h3 class="tp-search-title mb-40">{{ __('header.search_title') }}</h3>
                    <div class="tp-search-form-wrapper p-relative">
                        <form action="{{ route('shop') }}" method="GET" id="headerSearchForm">
                            <div class="tp-search-input-box position-relative">
                                <input type="text" 
                                       name="q"
                                       id="header-search-input"
                                       class="tp-search-input" 
                                       placeholder="{{ __('header.search_placeholder') }}"
                                       autocomplete="off"
                                       data-autocomplete-url="{{ route('product.autocomplete') }}"
                                       data-shop-url="{{ route('shop') }}">
                                <button type="submit" class="tp-search-submit-btn" aria-label="Search">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19.0004 18.9999L14.6504 14.6499M17.0001 9.00004C17.0001 13.4183 13.4183 17.0001 9.00004 17.0001C4.58174 17.0001 1 13.4183 1 9.00004C1 4.58174 4.58174 1 9.00004 1C13.4183 1 17.0001 4.58174 17.0001 9.00004Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </div>
                        </form>
                        
                        <!-- Autocomplete Dropdown -->
                        <div id="header-autocomplete-dropdown" class="autocomplete-dropdown" style="display: none;">
                            <div class="autocomplete-list"></div>
                        </div>
                    </div>
                    <div class="tp-search-hint mt-30">
                        <p class="text-muted">{{ __('header.search_hint') }} <span class="tp-search-keyword">ABB</span>, <span class="tp-search-keyword">Legrand</span>, <span class="tp-search-keyword">Vantage</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="body-overlay"></div>
<!-- search area end -->
