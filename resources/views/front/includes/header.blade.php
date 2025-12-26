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
                                <a href="{{ switch_locale_url('vi') }}" class="{{ current_locale() === 'vi' ? 'active' : '' }}">VI</a>
                                <a href="{{ switch_locale_url('en') }}" class="{{ current_locale() === 'en' ? 'active' : '' }}">EN</a>
                            </div>


                        </div>
                        <div class="tp-header-8-middle">
                            <div class="tp-header-logo">
                              <a href="{{ route(current_locale() . '.index') }}">

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
                                <a class="tp-btn-border-2" href="#" id="openContactPopup">
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
                <a style="color: black" href="{{ url(current_locale()) }}">{{ __('header.nav_home') }}</a>
            </li>
            <li class="has-dropdown p-static is-active">
                <a href="#">{{ __('header.nav_solutions') }}</a>
                <ul class="tp-submenu submenu">
                    <li><a href="{{ route(current_locale() . '.solution.lighting') }}">{{ __('header.solution_lighting') }}</a></li>
                    <li><a href="{{ route(current_locale() . '.solution.shade') }}">{{ __('header.solution_shade') }}</a></li>
                    <li><a href="{{ route(current_locale() . '.solution.hvac') }}">{{ __('header.solution_hvac') }}</a></li>
                    <li><a href="{{ route(current_locale() . '.solution.security') }}">{{ __('header.solution_security') }}</a></li>
                    <li><a href="{{ route(current_locale() . '.solution.bms') }}">{{ __('header.solution_bms') }}</a></li>
                    <li><a href="{{ route(current_locale() . '.solution.hotel') }}">{{ __('header.solution_hotel') }}</a></li>
                </ul>
            </li>
            <li class="has-dropdown p-static is-active">
                <a href="#">{{ __('header.nav_partners') }}</a>
                <ul class="tp-submenu submenu">
                <li><a href="{{ route(current_locale() . '.abb') }}">ABB</a></li>
                <li><a href="{{ route(current_locale() . '.legrand') }}">Legrand</a></li>
                <li><a href="{{ route(current_locale() . '.vantage') }}">Vantage</a></li>
                <li><a href="{{ route(current_locale() . '.cpElectronics') }}">CP Electronics</a></li>
                </ul>
            </li>
            <li class="is-active">
                <a href="{{ route(current_locale().'.product.shop') }}">{{ __('header.nav_products') }}</a>
            </li>
            <li class="is-active">
                <a href="{{ route(current_locale() . '.projects.index') }}">{{ __('header.nav_projects') }}</a>
            </li>
            <li class="is-active">
                <a href="{{ url(current_locale().'/blog') }}">{{ __('header.nav_blogs') }}</a>
            </li>
            {{-- <li class="">
              
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
                        <form action="{{ route(current_locale() . '.product.shop') }}" method="GET" id="headerSearchForm">
                            <div class="tp-search-input-box position-relative">
                                <input type="text"
                                    name="q"
                                    id="header-search-input"
                                    class="tp-search-input"
                                    placeholder="{{ __('header.search_placeholder') }}"
                                    autocomplete="off"
                                    data-autocomplete-url="{{ route(current_locale() . '.product.autocomplete') }}"
                                    data-shop-url="{{ route(current_locale() . '.product.shop') }}">
                                <button type="submit" class="tp-search-submit-btn" aria-label="Search">
                                    <!-- SVG -->
                                     <i class="fal fa-search"></i>
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
<script src="{{ asset('assets/js/popup.js') }}" defer></script>
<div class="body-overlay"></div>

<!-- search area end -->
