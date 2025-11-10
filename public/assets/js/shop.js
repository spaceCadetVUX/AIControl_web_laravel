/**
 * Shop Page JavaScript
 * Handles filter form submission, mobile sidebar toggle, and autocomplete search
 */

(function($) {
    'use strict';

    // ========================================
    // FILTER FORM SUBMISSION
    // ========================================
    
    /**
     * Handle form submissions for filters
     * Updates URL with filter parameters instead of traditional POST
     * Converts checkbox arrays to comma-separated values
     */
    function initFilterForm() {
        // Auto-submit on sort change
        $('.sort-select').on('change', function() {
            $('#filterForm').submit();
        });

        // Convert brand[] and category[] arrays to comma-separated before submit
        $('#filterForm').on('submit', function(e) {
            e.preventDefault();
            
            const form = $(this);
            const formData = new FormData(this);
            const params = new URLSearchParams();

            // Get sort
            const sort = formData.get('sort');
            if (sort && sort !== 'newest') {
                params.append('sort', sort);
            }

            // Get search query
            const searchQuery = formData.get('q');
            if (searchQuery) {
                params.append('q', searchQuery);
            }

            // Get selected brands
            const brands = formData.getAll('brand[]').filter(Boolean);
            console.log('Selected brands:', brands);
            if (brands.length > 0) {
                params.append('brand', brands.join(','));
            }

            // Get selected categories
            const categories = formData.getAll('category[]').filter(Boolean);
            console.log('Selected categories:', categories);
            if (categories.length > 0) {
                params.append('category', categories.join(','));
            }

            // Build URL and redirect
            // Remove both query string and hash from current URL to get clean base
            const baseUrl = window.location.origin + window.location.pathname;
            const queryString = params.toString();
            const url = queryString ? `${baseUrl}?${queryString}` : baseUrl;
            
            console.log('Redirecting to:', url);
            window.location.href = url;
        });
    }

    // ========================================
    // MOBILE SIDEBAR TOGGLE
    // ========================================
    
    /**
     * Mobile sidebar functionality
     * - Toggle sidebar open/close
     * - Close on overlay click
     * - Close on ESC key
     */
    function initMobileSidebar() {
        const $sidebar = $('.shop-sidebar-wrapper');
        const $overlay = $('.sidebar-overlay');
        const $openBtn = $('.mobile-filter-toggle');
        const $closeBtn = $('.sidebar-close-btn');
        
        // Open sidebar
        $openBtn.on('click', function() {
            $sidebar.addClass('active');
            $overlay.addClass('active');
            $('body').css('overflow', 'hidden');
        });
        
        // Close sidebar - close button
        $closeBtn.on('click', function() {
            closeSidebar();
        });
        
        // Close sidebar - overlay click
        $overlay.on('click', function() {
            closeSidebar();
        });
        
        // Close sidebar - ESC key
        $(document).on('keydown', function(e) {
            if (e.key === 'Escape' && $sidebar.hasClass('active')) {
                closeSidebar();
            }
        });
        
        // Close sidebar when filter is applied
        $('.btn-apply-filter').on('click', function() {
            closeSidebar();
        });
        
        function closeSidebar() {
            $sidebar.removeClass('active');
            $overlay.removeClass('active');
            $('body').css('overflow', '');
        }
    }

    // ========================================
    // AUTOCOMPLETE SEARCH
    // ========================================
    
    /**
     * Live search autocomplete functionality
     * - Debounced AJAX search (300ms)
     * - Displays max 7 results
     * - Shows "xem thêm" button
     * - Highlights matching text
     */
    function initAutocomplete() {
        const $searchInput = $('#search-input');
        const $dropdown = $('#autocomplete-dropdown');
        let debounceTimer;
        let currentRequest = null;
        
        // Get autocomplete URL from data attribute
        const autocompleteUrl = $searchInput.data('autocomplete-url');
        const shopUrl = $searchInput.data('shop-url');
        
        if (!autocompleteUrl || !shopUrl) {
            console.warn('Search URLs not configured');
            return;
        }
        
        // Search input handler with debounce
        $searchInput.on('input', function() {
            const keyword = $(this).val().trim();
            
            clearTimeout(debounceTimer);
            
            if (keyword.length < 2) {
                $dropdown.hide().empty();
                return;
            }
            
            debounceTimer = setTimeout(function() {
                performSearch(keyword);
            }, 300);
        });
        
        // Perform AJAX search
        function performSearch(keyword) {
            // Cancel previous request if still pending
            if (currentRequest) {
                currentRequest.abort();
            }
            
            // Show loading state
            $dropdown.html('<div class="autocomplete-loading">Đang tìm kiếm...</div>').show();
            
            // Make AJAX request
            currentRequest = $.ajax({
                url: autocompleteUrl,
                type: 'GET',
                data: { q: keyword },
                success: function(response) {
                    displayResults(response, keyword);
                },
                error: function(xhr) {
                    if (xhr.statusText !== 'abort') {
                        $dropdown.html('<div class="autocomplete-no-results">Lỗi khi tìm kiếm</div>');
                    }
                },
                complete: function() {
                    currentRequest = null;
                }
            });
        }
        
        // Display search results
        function displayResults(data, keyword) {
            if (!data.products || data.products.length === 0) {
                $dropdown.html('<div class="autocomplete-no-results">Không tìm thấy sản phẩm</div>').show();
                return;
            }
            
            let html = '<div class="autocomplete-list">';
            
            data.products.forEach(function(product) {
                const highlightedName = highlightText(product.name, keyword);
                const highlightedSku = highlightText(product.sku || '', keyword);
                const highlightedBrand = highlightText(product.brand || '', keyword);
                const productUrl = `/san-pham/${product.slug}`;
                const imageUrl = product.image_url || '/assets/img/no-image.png';
                
                html += `
                    <a href="${productUrl}" class="autocomplete-item">
                        <img src="${imageUrl}" alt="${product.name}" class="autocomplete-item-image" onerror="this.src='/assets/img/no-image.png'">
                        <div class="autocomplete-item-info">
                            <div class="autocomplete-item-name">${highlightedName}</div>
                            <div class="autocomplete-item-meta">
                                ${product.sku ? `<span class="autocomplete-item-sku">SKU: ${highlightedSku}</span>` : ''}
                                ${product.brand ? `<span class="autocomplete-item-brand">${highlightedBrand}</span>` : ''}
                            </div>
                        </div>
                    </a>
                `;
            });
            
            html += '</div>';
            
            // Add "view all" button if there are more results
            if (data.hasMore) {
                html += `<a href="${shopUrl}?q=${encodeURIComponent(keyword)}" class="autocomplete-view-all">
                    Xem thêm ${data.total} sản phẩm →
                </a>`;
            }
            
            $dropdown.html(html).show();
        }
        
        // Highlight matching text
        function highlightText(text, keyword) {
            if (!text || !keyword) return text;
            
            const regex = new RegExp(`(${escapeRegex(keyword)})`, 'gi');
            return text.replace(regex, '<strong>$1</strong>');
        }
        
        // Escape special regex characters
        function escapeRegex(str) {
            return str.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
        }
        
        // Close dropdown when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.search-form').length) {
                $dropdown.hide();
            }
        });
        
        // Prevent dropdown from closing when clicking inside
        $dropdown.on('click', function(e) {
            e.stopPropagation();
        });
        
        // Show dropdown again when focusing on input with existing value
        $searchInput.on('focus', function() {
            if ($(this).val().trim().length >= 2 && $dropdown.children().length > 0) {
                $dropdown.show();
            }
        });
    }

    // ========================================
    // INITIALIZATION
    // ========================================
    
    $(document).ready(function() {
        initFilterForm();
        initMobileSidebar();
        initAutocomplete();
    });

})(jQuery);