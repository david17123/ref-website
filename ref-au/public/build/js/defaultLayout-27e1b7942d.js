(function header($) {
    window.SiteHeader = {
        dynamicHeader: false
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

(function footer($) {
    $(document).ready(function () {
        $('.js-subscribe-button').click(function (e) {
            e.preventDefault();

            var $button = $(this);
            var $inputField = $('.js-subscribe-email');
            if ( $(this).hasClass('disabled') )
            {
                return;
            }

            // Disable inputs
            $button.addClass('subscribe-form__submit--disabled');
            $inputField.prop('disabled', true);
            $inputField.removeClass('input-text--error');

            var onSuccess = function () {
                $button.removeClass('subscribe-form__submit--disabled');
                $inputField.prop('disabled', false);
                $('.js-subscribe-form').addClass('subscribe-form--hidden');
                $('.js-success-indicator').removeClass('success--hidden');
            };

            var onError = function (error) {
                console.error(error);
                $button.removeClass('subscribe-form__submit--disabled');
                $inputField.prop('disabled', false);
                $inputField.addClass('input-text--error');
            };

            var email = $('.js-subscribe-email').val();
            if ( !$.validateEmail(email) )
            {
                onError('Invalid email address to be used for subscription');
                return;
            }

            // $.ajax({
            //     url: '',
            //     data: {
            //         email: email
            //     },
            //     method: 'POST',
            //     dataType: 'json',
            //     success: function (data, textStatus, jqXHR) {},
            //     error: function (jqXHR, textStatus, errorThrown) {}
            // });
        });
    });
})(jQuery);

//# sourceMappingURL=defaultLayout.js.map
