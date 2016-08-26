(function header($) {
    window.SiteHeader = {
        dynamicHeader: true
    };

    /**
    * Updates the style of header based on scroll position
    */
    SiteHeader.updateStyle = function () {
        var $header = $('.js-site-header');
        var scrollTop = $('body').scrollTop() || $('html').scrollTop();
        var headerHeight = $header.height();

        if (!SiteHeader.dynamicHeader || scrollTop >= headerHeight)
        {
            $header.addClass('site-header--opaque');
        }
        else
        {
            $header.removeClass('site-header--opaque');
        }
    };

    $(document).ready(function () {

        // Universities header link
        $('.js-site-header-link').click(function (e) {
            var targetURL = $(this).attr('href');
            var urlParts = $.parseURL(targetURL);
            if (!urlParts)
            {
                return;
            }

            // Check if link refers to the current page
            var currentURLParts = $.parseURL(window.location.href);
            var samePage = urlParts.hostname === currentURLParts.hostname &&
                           urlParts.pathname === currentURLParts.pathname &&
                           urlParts.queryString === currentURLParts.queryString;
            if (samePage && urlParts.fragment !== '')
            {
                // Scroll to hash if reference is found on page
                var $scrollTo = $('#'+urlParts.fragment);
                if ($scrollTo.length === 1)
                {
                    $.scrollWindowTo($scrollTo, 500, 'swing', function () {
                        window.location.hash = urlParts.fragment;
                    });
                    e.preventDefault();
                }
            }
        });

        // Header on scroll
        $(document).on('scroll', function () {
            SiteHeader.updateStyle();
        });

        // Init
        SiteHeader.updateStyle();
    });
})(jQuery);
