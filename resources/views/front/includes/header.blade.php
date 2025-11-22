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
                                    <span>Menu</span>
                                    <span>
                                        <svg width="24" height="8" viewBox="0 0 24 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0 0H14V1.5H0V0Z" fill="currentcolor" />
                                            <path d="M0 6H24V7.5H0V6Z" fill="currentcolor" />
                                        </svg>
                                    </span>
                                </button>
                            </div>
                            {{-- <div class="tp-header-8-lang d-none d-md-block">
                                <a href="#">EN</a>
                                <a href="#">FR</a>
                            </div> --}}
                        </div>
                        <div class="tp-header-8-middle">
                            <div class="tp-header-logo">
                                <a href="{{ route('home') }}"><img data-width="200" src="{{ assets('assets/AIcontrol_imgs/mian_Icon/aicontrol-co-mau.svg') }}" alt=""></a>
                            </div>
                        </div>
                        <div class="tp-header-8-right d-flex align-items-center d-none d-md-inline-flex">
                            <div class="tp-header-8-search-box">
                                <button class="tp-header-8-search tp-search-open-btn">
                                    <span>
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M19.0004 18.9999L14.6504 14.6499M17.0001 9.00004C17.0001 13.4183 13.4183 17.0001 9.00004 17.0001C4.58174 17.0001 1 13.4183 1 9.00004C1 4.58174 4.58174 1 9.00004 1C13.4183 1 17.0001 4.58174 17.0001 9.00004Z" stroke="#191919" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </button>
                            </div>
                            <div class="tp-header-8-btn">
                                <a class="tp-btn-border-2" id="openPopupBtn">
                                    GỌI NGAY
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
                <a style="color: black" href="{{ route('home') }}">Trang chủ</a>
            </li>
            <li class="has-dropdown p-static is-active">
                <a href="#">Giải pháp</a>
                <ul class="tp-submenu submenu">
                    <li><a href="{{ route('lightingControl') }}">Điều khiển chiếu sáng</a></li>
                    <li><a href="{{ route('shade') }}">Rèm cửa tự động</a></li>
                    <li><a href="{{ route('hvacControl') }}">Điều khiển HVAC</a></li>
                    <li><a href="{{ route('security') }}">Hệ thống an ninh</a></li>
                </ul>
            </li>
            <li class="has-dropdown p-static is-active">
                <a href="#">Đối tác</a>
                <ul class="tp-submenu submenu">
                    <li><a href="{{ route('abb') }}">ABB</a></li>      
                    <li><a href="{{ route('legrand') }}">Legrand</a></li>
                    <li><a href="{{ route('vantage') }}">Vantage</a></li>
                    <li><a href="{{ route('cpElectronics') }}">CP Electronics</a></li>
                </ul>
            </li>
            <li class="is-active">
                <a href="{{ route('shop') }}">Sản phẩm</a>
            </li>
            <li class="is-active">
                <a href="{{ route('projects.index') }}">Dự án</a>
            </li>
            <li class="is-active">
                <a href="{{ route('blogs') }}">Blogs</a>
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
