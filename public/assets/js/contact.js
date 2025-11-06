// Get elements
const callNowBtn = document.getElementById('callNowBtn');
const popup = document.getElementById('callPopup');
const closeBtn = document.querySelector('.popup-close');
const callOption = document.getElementById('callOption');
const zaloOption = document.getElementById('zaloOption');

// Show popup when button clicked (only if button exists)
if (callNowBtn && popup) {
    callNowBtn.addEventListener('click', (e) => {
        e.preventDefault(); // prevent default link behavior
        popup.style.display = 'flex';
    });
}

// Close popup (only if elements exist)
if (closeBtn && popup) {
    closeBtn.addEventListener('click', () => {
        popup.style.display = 'none';
    });
}

// Close popup if click outside content (only if popup exists)
if (popup) {
    window.addEventListener('click', (e) => {
        if (e.target === popup) {
            popup.style.display = 'none';
        }
    });
}

// Call option (only if element exists)
if (callOption) {
    callOption.addEventListener('click', () => {
        window.location.href = 'tel:0918918755';
    });
}

// Zalo option (only if element exists)
if (zaloOption) {
    zaloOption.addEventListener('click', () => {
        window.open('https://zalo.me/0918918755', '_blank');
    });
}


