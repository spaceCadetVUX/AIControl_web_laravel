<footer>
    <!-- footer area start -->
    <div class="ar-footer-area pt-115 pb-75" data-bg-color="#111214" style="background-color: #111214;">
        <div class="container container-1430">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-8">
                    <div class="ar-footer-widget ar-footer-col-1 mb-40 tp_fade_anim" data-delay=".3">
                        <div class="ar-footer-logo mb-30">
                            <a href="{{ route('home') }}"><img data-width="300" src="{{ assets('assets/AIcontrol_imgs/landing/AICONTROL LOGO.svg') }}" alt=""></a>
                        </div>
                        <div class="ar-footer-widget-content">
                            <p>
                                {{-- Our goal is to exceed expectations <br>
                                and create spaces that are both beautiful <br>
                                and practical. --}}
                            </p>
                        </div>
                        <div class="ar-footer-widget-form">
                            <div class="ar-footer-widget-input p-relative">
                                <input type="text" placeholder="Enter your email">
                                <span class="ar-footer-widget-envelop">
                                    <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16 2.5C16 1.675 15.325 1 14.5 1H2.5C1.675 1 1 1.675 1 2.5M16 2.5V11.5C16 12.325 15.325 13 14.5 13H2.5C1.675 13 1 12.325 1 11.5V2.5M16 2.5L8.5 7.75L1 2.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <button class="ar-footer-widget-btn" type="submit">subscribe</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4">
                    <div class="ar-footer-widget ar-footer-col-2 mb-40 tp_fade_anim" data-delay=".4">
                        <h4 class="ar-footer-widget-title">Về chúng tôi</h4>
                        <div class="ar-footer-widget-menu">
                            <ul>
                                <li><a href="">Giới thiệu</a></li>
                                <li><a href="{{ route('blog.index') }}">Blogs</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4">
                    <div class="ar-footer-widget ar-footer-col-3 mb-40 tp_fade_anim" data-delay=".5">
                        <h4 class="ar-footer-widget-title">Chăm sóc khách hàng</h4>
                        <div class="ar-footer-widget-menu">
                            <ul>
                                <li><a href="#">Liên hệ & tư vấn</a></li>
                                <li><a href="#">Các chính sách</a></li>
                        
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-5">
                    <div class="ar-footer-widget ar-footer-col-4 mb-40 tp_fade_anim" data-delay=".6">
                        <h4 class="ar-footer-widget-title">Địa chỉ & liên lạc</h4>
                        <div class="ar-footer-widget-info-box">
                            <div class="ar-footer-widget-info mb-20">
                                <a class="https://www.google.com/maps" target="_blank" href="#">
                                    SDT: 0918.918.755
                                </a>
                                <a class="https://www.google.com/maps" target="_blank" href="#">
                                    ZALO: Tư vấn & Nhận phản hồi
                                </a>
                            </div>
                            <div class="ar-footer-widget-info">
                                <a class="" target="_blank" href="tel:(+068)56819696">Địa chỉ: 56 Trần Cao Vân, Phường Hiệp Phú, TP. Thủ Đức, TP. Hồ Chí Minh</a>
                                <a class="" target="_blank" href="mailto:hello@agncy.com">Email: sales@knxstore.vn</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ar-copyright-area ar-copyright-ptb" data-bg-color="#111214" style="background-color: #111214;">
        <div class="container container-1430">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="ar-copyright-text text-lg-start text-center">
                        <p>ThemePure © {{ date('Y') }}. All rights reserved.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ar-copyright-social text-center text-lg-end">
                        <a href="#">ZALO</a>
                        <a href="#">FaceBook</a>
                        <a href="#">YouTube</a>
                        <a href="#">LinkedIn</a>
                        <a href="{{ route('admin.login') }}" class="text-xs opacity-50">Admin</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer area end -->
</footer>
