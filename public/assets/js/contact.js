// Get elements
const callNowBtn = document.getElementById('callNowBtn');
const popup = document.getElementById('callPopup');
const closeBtn = document.querySelector('.popup-close');
const callOption = document.getElementById('callOption');
const zaloOption = document.getElementById('zaloOption');

// Show popup when button clicked
callNowBtn.addEventListener('click', (e) => {
    e.preventDefault(); // prevent default link behavior
    popup.style.display = 'flex';
});

// Close popup
closeBtn.addEventListener('click', () => {
    popup.style.display = 'none';
});

// Close popup if click outside content
window.addEventListener('click', (e) => {
    if (e.target === popup) {
        popup.style.display = 'none';
    }
});

// Call option
callOption.addEventListener('click', () => {
    window.location.href = 'tel:0918918755';
});

// Zalo option
zaloOption.addEventListener('click', () => {
    window.open('https://zalo.me/0918918755', '_blank');
});


