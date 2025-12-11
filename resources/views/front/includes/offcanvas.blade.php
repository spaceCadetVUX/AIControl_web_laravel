<!-- offcanvas start -->
<div class="tp-offcanvas-2-area p-relative offcanvas-2-white-bg">
    <div class="tp-offcanvas-2-bg is-left left-box"></div>
    <div class="tp-offcanvas-2-bg is-right right-box d-none d-md-block"></div>
    <div class="tp-offcanvas-2-wrapper">
        <div class="tp-offcanvas-2-left left-box">
            <div class="tp-offcanvas-2-left-wrap d-flex justify-content-between align-items-center">
                <div class="tp-offcanvas-2-logo">
                    <a href="index.html">
                        <img class="logo-1" data-width="140" src="{{ assets('assets/AIcontrol_imgs/mian_Icon/aicontrol-co-mau.svg') }}" alt="">
                        <img class="logo-2" data-width="140" src="{{ assets('assets/AIcontrol_imgs/mian_Icon/aicontrol-co-mau.svg') }}" alt="">
                    </a>
                </div>
                <div class="tp-offcanvas-2-close d-md-none text-end">
                    <button class="tp-offcanvas-2-close-btn">
                        <span class="text">
                            <span>{{ __('header.offcanvas_close') }}</span>
                        </span>
                        <span class="d-inline-block">
                            <span>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="32.621" height="1.00918" transform="matrix(0.704882 0.709325 -0.704882 0.709325 1.0061 0)" fill="currentcolor"></rect>
                                    <rect width="32.621" height="1.00918" transform="matrix(0.704882 -0.709325 0.704882 0.709325 0 23.2842)" fill="currentcolor"></rect>
                                </svg>
                            </span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="tp-offcanvas-menu counter-row">
                <nav></nav>
            </div>
        </div>
        <div class="tp-offcanvas-2-right right-box d-none d-md-block p-relative">
            <div class="tp-offcanvas-2-close text-end">
                <button class="tp-offcanvas-2-close-btn">
                    <span class="text"><span>{{ __('header.offcanvas_close') }}</span></span>
                    <span class="d-inline-block">
                        <span>
                            <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.80859 9.80762L28.1934 28.1924" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M9.80859 28.1924L28.1934 9.80761" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                    </span>
                </button>
            </div>
            <div class="tp-offcanvas-2-right-info-box mt-160">
                <h4 class="tp-offcanvas-2-right-info-title">{{ __('header.offcanvas_contact_title') }}</h4>
                <div class="tp-offcanvas-2-right-info-item">
                    <label class="mb-10">{{ __('header.offcanvas_hotline') }}</label>
                    <a class="tp-line-white" href="tel:02873007475">0287.3007.475</a>
                </div>
                <div class="tp-offcanvas-2-right-info-item">
                    <label class="mb-10">{{ __('header.offcanvas_email') }}</label>
                    <a class="tp-line-white" href="mailto:hello@aicontrol.vn">hello@aicontrol.vn</a>
                </div>
                <div class="tp-offcanvas-2-right-info-item">
                    <label class="mb-10">{{ __('header.offcanvas_address') }}</label>
                    <a class="tp-line-white" href="https://www.google.com/maps/search/+The+Sun+Avenue+S5.01.02+28+-+Mai+Ch%C3%AD+Th%E1%BB%8D/@10.7851206,106.748232,166m/data=!3m1!1e3?entry=ttu&g_ep=EgoyMDI1MTExNy4wIKXMDSoASAFQAw%3D%3D" target="_blank">
                       The Sun Avenue S5.01.02 28 - Mai Chí Thọ <br>
                    </a>
                </div>
                {{-- <div class="tp-offcanvas-2-right-info-item">
                    <label class="mb-15"></label>
                    <div class="tp-offcanvas-2-right-social">
                        <a href="https://www.facebook.com/aicontrol.vn" aria-label="Facebook">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                            d="M22 12C22 6.48 17.52 2 12 2S2 6.48 2 12c0 4.84 3.44 8.84 7.93 9.77v-6.92H7.47v-2.85h2.46V9.41c0-2.43 1.45-3.77 3.67-3.77 1.06 0 2.17.19 2.17.19v2.39h-1.22c-1.2 0-1.57.75-1.57 1.52v1.81h2.67l-.43 2.85h-2.24v6.92C18.56 20.84 22 16.84 22 12z"
                            fill="currentColor" />
                        </svg>
                        </a>
                        <a href="https://www.youtube.com/@aicontrol9411" aria-label="YouTube">
                        <svg width="18" height="13" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                            d="M23.498 6.186a2.999 2.999 0 0 0-2.113-2.12C19.146 3.5 12 3.5 12 3.5s-7.146 0-9.385.566A2.999 2.999 0 0 0 .502 6.186C0 8.436 0 12 0 12s0 3.564.502 5.814a2.999 2.999 0 0 0 2.113 2.12C4.854 20.5 12 20.5 12 20.5s7.146 0 9.385-.566a2.999 2.999 0 0 0 2.113-2.12C24 15.564 24 12 24 12s0-3.564-.502-5.814z"
                            fill="currentColor" />
                            <path d="M9.75 16.02V7.98L16.5 12l-6.75 4.02z" fill="#fff" />
                        </svg>
                        </a>

                        <a href="https://zalo.me/0918918755">
                        <svg width="60" height="20" viewBox="0 0 300 100" xmlns="http://www.w3.org/2000/svg">
                        <text x="50%" y="50%" font-size="80" font-family="Arial, sans-serif" fill="#000" text-anchor="middle" dominant-baseline="middle">
                            Zalo
                        </text>
                        </svg>

                        </a>
                    </div>
                    </div> --}}

            </div>
        </div>
    </div>
</div>
<!-- offcanvas end -->
