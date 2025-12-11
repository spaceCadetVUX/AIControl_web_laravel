<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <!-- Adding Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <style>


        /* --- New Button Style --- */
        .open-popup-button {
            position: absolute;
            top: 20px;
            left: 20px;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: 600;
            background-color: #0052d4;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            z-index: 99; /* Below popup */
            transition: all 0.2s ease;
        }
        .open-popup-button:hover {
            background-color: #0041a8;
        }


        /* --- Popup Styles --- */

        /* 1. The dark background overlay */
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.65); /* Dark semi-transparent */
            
            /* Center the card */
            display: none; /* CHANGED: Hidden by default */
            place-items: center;
            z-index: 1000;
        }

        /* 2. The main popup card */
        .popup-card {
            position: relative;
            width: 90%;
            max-width: 400px;
            /* Updated: Removed white background, set to light gray */
            background-color: #f0f2f5; 
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            
            /* This clips the image to the rounded corners */
            overflow: hidden; 
            
            /* Pop-in animation */
            animation: popup-fade-in 0.3s ease-out;
        }

        /* 3. The 'x' close button */
        .popup-close {
            position: absolute;
            top: 12px;
            right: 12px;
            
            /* Style reset */
            background: none;
            border: none;
            
            /* Icon style */
            color: white;
            font-size: 26px;
            font-weight: 300;
            line-height: 1;
            cursor: pointer;
            
            /* Makes the white 'x' visible on light/busy backgrounds */
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
            
            z-index: 10; /* Above the image */
        }

        .popup-close:hover {
            opacity: 0.8;
        }

        /* 4. The top image section */
   

        .popup-image {
    width: 100%;
    height: auto;
    border-top-left-radius: 16px;
    border-top-right-radius: 16px;
    overflow: hidden;
}

.popup-image img {
    width: 100%;
    display: block;
}


        /* 5. The white content area */
        .popup-content {
            padding: 28px;
            text-align: center;
            /* Updated: Set background to white, distinct from card bg */
            background-color: #ffffff; 
        }

        .popup-content h2 {
            font-size: 26px;
            font-weight: 600;
            color: #1a1a1a;
            margin: 0 0 12px 0;
        }

        .popup-content p {
            font-size: 16px;
            color: #555555;
            line-height: 1.5;
            margin: 0 0 24px 0;
        }

        /* 6. Button Styles */

        /* A container for the buttons */
        .popup-button-group {
            display: flex;
            flex-direction: column;
            gap: 12px; /* Spacing between buttons */
            width: 100%;
        }

        /* Base style for all buttons */
        .popup-button {
            /* Style reset */
            border: none;
            cursor: pointer;
            
            /* Sizing & Font */
            font-size: 16px;
            font-weight: 600;
            padding: 13px 24px;
            border-radius: 8px;
            width: 100%; /* Make it full-width */
            
            /* Transitions */
            transition: all 0.2s ease;
            
            /* For icon alignment */
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* Add gap between icon and text */
        .popup-button i {
            margin-right: 8px;
        }

        .popup-button:hover {
            transform: translateY(-2px); /* Slight lift on hover */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }

        /* * UPDATED COLORS
         * These now match the header image
         */

        /* Specific style for the Call button (Matches header dark blue) */
        .popup-button-call {
            background-color: #0548b4;
            color: #ffffff;
        
        }
        .popup-button-call:hover {
            background-color: #0041a8; /* Darker blue */
        }
        
        /* Specific style for the Zalo button (Matches header light blue) */
        .popup-button-zalo {
             background-color: #0548b4;
            color: #ffffff;
        }
        .popup-button-zalo:hover {
            background-color: #0041a8; /* Darker blue */
        }

        /* 7. Animation keyframes */
        @keyframes popup-fade-in {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
</head>
<body>



    <!-- This is the popup HTML -->
    <!-- The overlay is set to display: grid for demo. 
         In a real app, you'd set it to 'none' and show it with JS. 
    -->
    <div class="popup-overlay" id="popupOverlay">
        <div class="popup-card">
            
            <!-- 1. Close Button -->
            <button class="popup-close" id="popupCloseBtn" aria-label="Close popup">&times;</button>
            
            <!-- 2. Image Section -->
            <!-- 2. Image Section -->
            <div class="popup-image">
                <img src="../assets/AIcontrol_imgs/sociallogo/popupimg.jpg" alt="Popup Image">
            </div>



            <!-- 3. Content Section -->
            <div class="popup-content" id="popupStep1">
                <h2>Thông tin liên lạc</h2>
                <p>Vui lòng chọn phương thức liên lạc</p>
                <!-- Button Group -->
                <div class="popup-button-group">
                    <button id="callButton" class="popup-button popup-button-call">
                        <i class="fas fa-phone-alt"></i> Gọi đến số hotline
                    </button>

                    <button id="zaloButton" class="popup-button popup-button-zalo">
                        <i class="fas fa-comment-dots"></i> Zalo
                    </button>

                </div>
            </div>
            
        </div>
    </div>
    <!-- End of popup HTML -->

    <script>
        // --- Simple JavaScript to make the popup close ---
        const overlay = document.getElementById('popupOverlay');
        const closeBtn = document.getElementById('popupCloseBtn');
        const openBtn = document.getElementById('openPopupBtn'); // Added open button

        function openPopup() {
            // Check if overlay exists
            if (overlay) {
                overlay.style.display = 'grid'; // Show the popup
            }
        }

        function closePopup() {
            // Check if overlay exists
            if (overlay) {
                // In a real app, you'd add a class, but for demo we'll hide it
                overlay.style.display = 'none'; 
            }
        }

        if (openBtn) { // Add listener for the new button
            openBtn.addEventListener('click', openPopup);
        }

        if (closeBtn) {
            closeBtn.addEventListener('click', closePopup);
        }
        
        if (overlay) {
            // Click on the dark background to close
            overlay.addEventListener('click', function(event) {
                // Check if the clicked target is the overlay itself, not a child
                if (event.target === overlay) {
                    closePopup();
                }
            });
        }

        document.getElementById('zaloButton').addEventListener('click', function () {
            window.open('https://zalo.me/0918918755', '_blank');
        });


        document.getElementById('callButton').addEventListener('click', function () {
            window.location.href = 'tel:02873007475';
        });



    </script>

</body>
</html>