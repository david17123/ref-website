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
