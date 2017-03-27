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
    $.scrollWindowTo = function ($el, duration, easing, callback, respectHeader) {
        duration = typeof(duration) !== 'number' ? 1000 : duration;
        easing = typeof(easing) !== 'string' || easing === '' ? 'swing' : easing;
        callback = typeof(callback) !== 'function' ? (function () {}) : callback;
        respectHeader = typeof(respectHeader) === 'boolean' ? respectHeader : true;

        $('html, body').animate({
            scrollTop: $el.offset().top - (respectHeader ? $('.js-site-header').outerHeight() : 0)
        }, duration, easing, callback);
    };

    /**
     * Checks if email address is valid. Regex is taken from:
     * http://jsfiddle.net/ghvj4gy9/embedded/result,js/ as pointed by:
     * http://stackoverflow.com/a/46181
     */
    $.validateEmail = function (email) {
        var emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return emailRegex.test(email);
    };

    /**
     * Formats filesize to be displayed on front-end
     *
     * @param numeric size File size in bytes. This has to be numeric.
     * @return string
     */
    $.formatFileSize = function (size) {
        var size = parseInt(size);
        var sizeText = '';
        var sizeUnit = '';

        if ( isNaN(size) ) {
            throw 'Size must be integer';
        } else {
            if (size < 1000) { // < ~1KB
                sizeText = size;
                sizeUnit = 'B';
            } else if (size < 1024*1000) { // < ~1MB
                sizeText = (size / 1024).toFixed(2);
                sizeUnit = 'KB';
            } else if (size < 1024*1024*1000) { // < ~1GB
                sizeText = (size / (1024*1024)).toFixed(2);
                sizeUnit = 'MB';
            } else {
                sizeText = (size / (1024*1024*1024)).toFixed(2);
                sizeUnit = 'GB';
            }
        }

        return sizeText + sizeUnit;
    };
})(jQuery);
