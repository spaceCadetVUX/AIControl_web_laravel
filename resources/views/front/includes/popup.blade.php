<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AIControl Contact Popup</title>
    
    <!-- Font Awesome cho icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <!-- CSS đặt trực tiếp trong HTML -->
    <style>
        /* Nút nổi mở popup (góc dưới phải) */
        .contact-float-btn {
            position: fixed;
            right: 50px;
            bottom: 120px;
            width: 44px;
            height: 44px;
            line-height: 44px;
            text-align: center;
            border-radius: 50%;
            background: #ffffff;
            color: #000000;
            box-shadow: 0px 8px 16px rgba(3, 4, 28, 0.3);
            cursor: pointer;
            z-index: 99;
            transition: all 0.3s ease-in-out;
            opacity: 1;
            visibility: visible;
        }

        .contact-float-btn:hover {
            transform: translateY(-3px);
        }

        @media (max-width: 767px) {
            .contact-float-btn {
                right: 20px;
                bottom: 120px;
            }
        }

        /* Overlay */
        .popup-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(10px);
            display: none;
            place-items: center;
            z-index: 1000;
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .popup-overlay.active {
            display: grid;
            opacity: 1;
        }

        /* Card popup */
        .popup-card {
            width: 90%;
            max-width: 420px;
            background: white;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.2);
            transform: scale(0.9) translateY(40px);
            opacity: 0;
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .popup-overlay.active .popup-card {
            transform: scale(1) translateY(0);
            opacity: 1;
        }

        /* Header image */
        .popup-header {
            position: relative;
            height: 220px;
        }

        .popup-header img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Text overlay trên ảnh */
        .popup-header-text {
            position: absolute;
            bottom: 24px;
            left: 0;
            right: 0;
            text-align: center;
            color: white;
        }

        .popup-header-text h2 {
            font-size: 32px;
            font-weight: 800;
            margin: 0 0 8px;
            text-shadow: 0 2px 8px rgba(0,0,0,0.6);
        }

        .popup-header-text p {
            font-size: 17px;
            margin: 0;
            opacity: 0.95;
            text-shadow: 0 1px 6px rgba(0,0,0,0.5);
        }

        /* Nút đóng */
        .popup-close {
            position: absolute;
            top: 16px;
            right: 16px;
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.25);
            border: none;
            border-radius: 50%;
            color: white;
            font-size: 20px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(6px);
            transition: all 0.3s ease;
            z-index: 10;
        }

        .popup-close:hover {
            background: rgba(255,255,255,0.4);
            transform: rotate(90deg);
        }

        /* Nội dung dưới */
        .popup-content {
            padding: 32px 24px;
            text-align: center;
        }

        .popup-content p {
            font-size: 16px;
            color: #4b5563;
            margin-bottom: 32px;
            line-height: 1.6;
        }

        /* Nhóm nút liên lạc */
        .contact-buttons {
            display: flex;
            justify-content: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .contact-btn {
            flex: 1;
            min-width: 60px;
            padding: 14px 12px;
            background: transparent;
            border: none;
            border-radius: 12px;
            font-size: 14px;
            color: #374151;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
            text-decoration: none;
        }

        .contact-btn i {
            font-size: 20px;
            color: #1f2937;
        }

        .contact-btn:hover {
            background: #e5e7eb;
            transform: translateY(-4px);
        }

        @media (max-width: 480px) {
            .popup-header { height: 180px; }
            .popup-header-text h2 { font-size: 28px; }
            .popup-content { padding: 24px 16px; }
        }
    </style>
    
    <!-- Link to external JavaScript -->
    <script src="{{ asset('assets/js/popup.js') }}"></script>
</head>
<body>

    <!-- Nút nổi mở popup -->
    <a class="contact-float-btn" aria-label="Liên hệ hỗ trợ">
        <i class="fas fa-headset"></i>
    </a>

    <!-- Popup Overlay -->
    <div class="popup-overlay" id="contactOverlay">
        <div class="popup-card">
            <div class="popup-header">
                <img src="https://www.architecturecourses.org/sites/default/files/2024-06/modern-minimalist-living-room.webp" alt="AIControl Smart Home">
                
                <div class="popup-header-text">
                    <h2>Ai Control</h2>
                    <p>Thông tin liên lạc và hỗ trợ</p>
                </div>
                
                <button class="popup-close" id="contactClose" aria-label="Đóng">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="popup-content">
                <p>Chọn một trong các kênh dưới đây để được hỗ trợ nhanh nhất từ đội ngũ AIControl.</p>
                
                <div class="contact-buttons">
                    <a href="https://www.facebook.com/yourpage" target="_blank" class="contact-btn">
                        <i class="fab fa-facebook-f"></i>
                        <span>Facebook</span>
                    </a>
                    <a href="https://zalo.me/0918918755" target="_blank" class="contact-btn">
                        <i class="fas fa-comment-alt"></i>
                        <span>Zalo</span>
                    </a>
                    <a href="tel:02873007475" class="contact-btn">
                        <i class="fas fa-phone-alt"></i>
                        <span>Hotline</span>
                    </a>
                    <a href="mailto:info@aicontrol.vn" class="contact-btn">
                        <i class="fas fa-envelope"></i>
                        <span>Email</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>