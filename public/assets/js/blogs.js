$(document).ready(function() {

    // Blog category expand/collapse toggle
    $('.blog-category-toggle').on('click', function(e) {
        e.preventDefault();
        const categoryId = $(this).data('category-id');
        const $subcategoryList = $('.subcategory-' + categoryId);
        const $icon = $(this).find('i');

        if ($subcategoryList.is(':visible')) {
            $subcategoryList.slideUp(200);
            $icon.removeClass('fa-chevron-up').addClass('fa-chevron-down');
        } else {
            $subcategoryList.slideDown(200);
            $icon.removeClass('fa-chevron-down').addClass('fa-chevron-up');
        }
    });

    // Mobile filter toggle
    $('#mobile-filter-toggle').on('click', function() {
        $('#blog-categories-widget').slideToggle(300);
        $(this).find('i').toggleClass('fa-filter fa-times');
    });

    // Submit filter form as clean slug param: ?blog_category=slug1,slug2
    $('#blog-category-filter-form').on('submit', function(e) {
        e.preventDefault();

        const checked = $(this)
            .find('input.category-checkbox:checked')
            .map(function() { return $(this).val(); })
            .get();

        const base = window.blogIndexRoute; // <-- Provided by Blade

        if (!checked.length) {
            window.location.href = base;
            return;
        }

        const params = new URLSearchParams(window.location.search);
        params.delete('blog_category');
        params.delete('blog_category[]');
        params.set('blog_category', checked.join(','));

        const qs = params.toString();
        window.location.href = base + (qs ? ('?' + qs) : '');
    });

    // Clear filters button
    $('#clear-filters').on('click', function() {
        $('.category-checkbox').prop('checked', false);
        window.location.href = window.blogIndexRoute;
    });

    // Button hover effects
    $('.filter-actions button').hover(
        function() {
            $(this).css('transform', 'translateY(-2px)');
            $(this).css('box-shadow', '0 4px 12px rgba(0,0,0,0.15)');
        },
        function() {
            $(this).css('transform', 'translateY(0)');
            $(this).css('box-shadow', 'none');
        }
    );

    // Auto-hide filters on mobile
    if ($(window).width() < 768) {
        $('#blog-categories-widget').hide();
    }

    // Show/hide on resize
    $(window).resize(function() {
        if ($(window).width() >= 768) {
            $('#blog-categories-widget').show();
            $('#mobile-filter-toggle').hide();
        } else {
            $('#mobile-filter-toggle').show();
            if (!$('#blog-categories-widget').hasClass('user-toggled')) {
                $('#blog-categories-widget').hide();
            }
        }
    });

    // Track user toggle
    $('#mobile-filter-toggle').on('click', function() {
        $('#blog-categories-widget').toggleClass('user-toggled');
    });
});
