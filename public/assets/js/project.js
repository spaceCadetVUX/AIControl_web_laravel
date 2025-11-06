$(document).ready(function() {
    // Mobile sidebar toggle
    $('#mobile-sidebar-toggle').on('click', function() {
        const $sidebar = $('#projects-sidebar');
        const $icon = $(this).find('.toggle-icon');
        const $filterText = $(this).find('.filter-text');

        if ($sidebar.is(':visible')) {
            $sidebar.slideUp(300);
            $icon.removeClass('fa-chevron-up').addClass('fa-chevron-down');
            $filterText.text('Hiển thị bộ lọc');
            $(this).removeClass('active');
        } else {
            $sidebar.slideDown(300);
            $icon.removeClass('fa-chevron-down').addClass('fa-chevron-up');
            $filterText.text('Ẩn bộ lọc');
            $(this).addClass('active');
        }
    });

    // Auto-hide sidebar on mobile on page load
    if ($(window).width() < 992) {
        $('#projects-sidebar').hide();
    }

    // Show/hide sidebar on window resize
    $(window).resize(function() {
        if ($(window).width() >= 992) {
            $('#projects-sidebar').show();
            $('#mobile-sidebar-toggle').removeClass('active');
        } else {
            // Reset to hidden state on mobile
            if (!$('#mobile-sidebar-toggle').hasClass('active')) {
                $('#projects-sidebar').hide();
            }
        }
    });

    // Search form enhancement
    $('.sidebar-search input[name="search"]').on('keypress', function(e) {
        if (e.which === 13) { // Enter key
            $(this).closest('form').submit();
        }
    });

    // Preserve search and category filters in pagination
    $('.pagination a').each(function() {
        const url = new URL($(this).attr('href'), window.location.origin);
        const currentSearch = new URLSearchParams(window.location.search).get('search');
        const currentCategory = new URLSearchParams(window.location.search).get('category');

        if (currentSearch) {
            url.searchParams.set('search', currentSearch);
        }
        if (currentCategory) {
            url.searchParams.set('category', currentCategory);
        }

        $(this).attr('href', url.toString());
    });

    // Highlight active category
    $('.category-list a').on('click', function() {
        $('.category-list a').removeClass('active');
        $(this).addClass('active');
    });

    // Smooth scroll animation when opening sidebar
    $('#mobile-sidebar-toggle').on('click', function() {
        if (!$(this).hasClass('active')) {
            setTimeout(function() {
                $('html, body').animate({
                    scrollTop: $('#projects-sidebar').offset().top - 100
                }, 500);
            }, 100);
        }
    });
});