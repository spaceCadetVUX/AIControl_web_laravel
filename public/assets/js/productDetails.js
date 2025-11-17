/**
 * Product Details Page JavaScript
 * AIControl Vietnam
 */

(function() {
    'use strict';

    /**
     * Change main image when clicking gallery thumbnail
     * @param {HTMLImageElement} imgElement - The clicked thumbnail image element
     */
    window.changeMainImage = function(imgElement) {
        // Update main image
        const mainImage = document.getElementById('mainImage');
        if (mainImage) {
            mainImage.src = imgElement.src;
        }
        
        // Remove active class from all thumbnails
        document.querySelectorAll('.gallery-item').forEach(item => {
            item.style.borderColor = 'transparent';
            item.classList.remove('active');
        });
        
        // Add active class to clicked thumbnail
        imgElement.parentElement.style.borderColor = 'rgba(228, 87, 44, 1)ff';
        imgElement.parentElement.classList.add('active');
    };

    /**
     * Initialize product detail page functionality
     */
    function initProductDetail() {
        // Add hover effect to thumbnails
        document.querySelectorAll('.gallery-item').forEach(item => {
            item.addEventListener('mouseenter', function() {
                if (!this.classList.contains('active')) {
                    this.style.borderColor = '#ddd';
                }
            });
            
            item.addEventListener('mouseleave', function() {
                if (!this.classList.contains('active')) {
                    this.style.borderColor = 'transparent';
                }
            });
        });
    }

    // Initialize on DOM ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initProductDetail);
    } else {
        initProductDetail();
    }

})();
