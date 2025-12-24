document.addEventListener('DOMContentLoaded', function () {
    const overlay = document.getElementById('contactOverlay');
    const closeBtn = document.getElementById('contactClose');
    function openPopup() {
        if (!overlay) return;
        overlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closePopup() {
        if (!overlay) return;
        overlay.classList.remove('active');
        document.body.style.overflow = '';
    }

    // Mở popup khi click nút nổi hoặc nút trong header (id #openContactPopup)
    const openButtons = Array.from(document.querySelectorAll('.contact-float-btn'));
    const headerOpen = document.getElementById('openContactPopup');
    if (headerOpen) openButtons.push(headerOpen);

    openButtons.forEach(btn => {
        btn.addEventListener('click', e => {
            e.preventDefault();
            openPopup();
        });
    });

    // Đóng popup (safety checks)
    if (closeBtn) {
        closeBtn.addEventListener('click', closePopup);
    }

    // Đóng khi click ngoài nội dung popup
    if (overlay) {
        overlay.addEventListener('click', e => {
            if (e.target === overlay) {
                closePopup();
            }
        });
    }

    // Đóng bằng phím Escape
    document.addEventListener('keydown', e => {
        if (e.key === 'Escape' && overlay && overlay.classList.contains('active')) {
            closePopup();
        }
    });
});