(function utils($) {
    /**
     * Splits and normalizes the given url into hostname, pathname, query string
     * and fragment.
     *
     * @param string url
     * @return Object Null or an object with structure as follows:
     * {
     *     hostname,
     *     pathname,
     *     queryString,
     *     fragment
     * }
     */
    $.parseURL = function (url) {
        var urlRegex = /^(?:https?:\/\/)?([A-Za-z0-9.-]+\.[A-Za-z]+)?(\/?[^?#\s]+)?(?:\?([^#]+)?)?(?:#(.*))?$/;
        var matches = url.match(urlRegex);
        if (!matches) {
            return null;
        }

        var parts = {
            hostname: matches[1] ? matches[1] : window.location.hostname,
            pathname: matches[2] ? matches[2] : window.location.pathname,
            queryString: matches[3] ? matches[3] : '',
            fragment: matches[4] ? matches[4] : ''
        };

        // Process relative pathnames
        if (parts.pathname[0] !== '/')
        {
            // Append current pathname to the specified pathname
            var prefix = window.location.pathname;
            prefix = prefix[prefix.length - 1] === '/' ? prefix : (prefix+'/');
            parts.pathname = prefix + parts.pathname;
        }

        // Make sure pathname ends with a '/'
        if (parts.pathname[parts.pathname.length - 1] !== '/')
        {
            parts.pathname += '/';
        }

        return parts;
    };

    /**
     * Scrolls window to the put given element on top of the page.
     *
     * @param jQueryCollection $el
     * @param int duration
     */
    $.scrollWindowTo = function ($el, duration, easing, callback) {
        duration = typeof(duration) !== 'number' ? 1000 : duration;
        easing = typeof(easing) !== 'string' || easing === '' ? 'swing' : easing;
        callback = typeof(callback) !== 'function' ? (function () {}) : callback;

        $('html, body').animate({
            scrollTop: $el.offset().top
        }, duration, easing, callback);
    };
})(jQuery);

(function header($) {
    $(document).ready(function () {
        /**
         * Updates the style of header based on scroll position
         */
        var updateStyle = function () {
            var $header = $('.js-site-header');
            var scrollTop = $('body').scrollTop();
            var headerHeight = $header.height();

            if (scrollTop >= headerHeight)
            {
                $header.addClass('site-header--opaque');
            }
            else
            {
                $header.removeClass('site-header--opaque');
            }
        };

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
            updateStyle();
        });

        // Init
        updateStyle();
    });
})(jQuery);


//# sourceMappingURL=base.js.map
