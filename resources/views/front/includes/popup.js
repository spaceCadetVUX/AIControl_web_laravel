document.addEventListener('DOMContentLoaded', function () {
    const overlay   = document.getElementById('contactOverlay');
    const closeBtn  = document.getElementById('contactClose');

    // Kiểm tra xem các phần tử cần thiết có tồn tại không
    if (!overlay || !closeBtn) {
        console.warn('Contact popup: Không tìm thấy #contactOverlay hoặc #contactClose');
        return;
    }

    // Hàm mở popup
    function openPopup() {
        overlay.classList.add('active');
        document.body.style.overflow = 'hidden'; // Ngăn scroll nền
    }

    // Hàm đóng popup
    function closePopup() {
        overlay.classList.remove('active');
        document.body.style.overflow = '';
    }

    // === 1. Mở popup bằng CLASS (nút nổi mặc định) ===
    document.querySelectorAll('.contact-float-btn').forEach(btn => {
        btn.addEventListener('click', e => {
            e.preventDefault();
            openPopup();
        });
    });

    // === 2. Mở popup bằng ID cụ thể (rất hữu ích khi có nhiều nút khác nhau) ===
    // Thêm ID vào nút nào bạn muốn: id="openContactPopup"
    const openByIdBtn = document.getElementById('openContactPopup');
    if (openByIdBtn) {
        openByIdBtn.addEventListener('click', e => {
            e.preventDefault();
            openPopup();
        });
    }

    // Nếu bạn muốn nhiều ID khác nhau cùng mở popup, thêm vào mảng này:
    /*
    const openPopupIds = ['openContactPopup', 'menuContactBtn', 'footerContactLink'];
    openPopupIds.forEach(id => {
        const el = document.getElementById(id);
        if (el) {
            el.addEventListener('click', e => {
                e.preventDefault();
                openPopup();
            });
        }
    });
    */

    // === 3. Đóng popup khi bấm nút đóng ===
    closeBtn.addEventListener('click', closePopup);

    // === 4. Đóng khi click ra ngoài vùng nội dung popup ===
    overlay.addEventListener('click', e => {
        if (e.target === overlay) {
            closePopup();
        }
    });

    // === 5. Đóng bằng phím Escape ===
    document.addEventListener('keydown', e => {
        if (e.key === 'Escape' && overlay.classList.contains('active')) {
            closePopup();
        }
    });

    // === TÙY CHỌN: Hàm public để gọi từ nơi khác (onclick hoặc JS khác) ===
    // Ví dụ: onclick="openContactPopup()" trong HTML
    window.openContactPopup = openPopup;
    window.closeContactPopup = closePopup;
});