(function footer($) {
    $(document).ready(function () {
        var $subscribeForm = $('.js-subscribe-form');
        $subscribeForm.on('submit', function (event) {
            event.preventDefault();

            var $email = $('.js-subscribe-email');
            if ( $(this).hasClass('disabled') )
            {
                return;
            }

            // Disable inputs
            $subscribeForm.find('input').prop('disabled', true);
            $email.removeClass('input-text--error');

            var onSuccess = function () {
                $subscribeForm.find('input').prop('disabled', false);
                $('.js-subscribe-form').addClass('subscribe-form--hidden');
                $('.js-success-indicator').removeClass('success--hidden');
            };

            var onError = function (error) {
                console.error(error);
                $subscribeForm.find('input').prop('disabled', false);
                $email.addClass('input-text--error');
            };

            var email = $('.js-subscribe-email').val();
            if ( !$.validateEmail(email) )
            {
                onError('Invalid email address to be used for subscription');
                return;
            }

            $.ajax({
                url: PageVars.subscribeAjaxUrl,
                method: 'POST',
                data: {
                    email: $email.val(),
                    _token: PageVars.csrfToken
                },
                dataType: 'json',
                success: function (data) {
                    if (data.subscribed) {
                        onSuccess();
                    } else {
                        onError('Failed to subscribe');
                    }
                },
                error: function (error) {
                    onError(error);
                }
            });
        });
    });
})(jQuery);
