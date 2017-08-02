(function mainHome($) {
    /**
     * @param string uniSlice The class name that points to the uni slice
     */
    var openUniSlice = function (uniSlice) {
        // $('.slice--university .slice-cover').removeClass('slice-cover--opened');
        $('.'+uniSlice+' .slice-cover').addClass('slice-cover--opened');
    };

    var closeUniSlice = function (uniSlice) {
        $('.'+uniSlice+' .slice-cover').removeClass('slice-cover--opened');
    };

    var uniSliceIsOpened = function (uniSlice) {
        return $('.'+uniSlice+' .slice-cover').hasClass('slice-cover--opened');
    };

    $(document).ready(function () {

        ///////////////////////
        // University slices //
        ///////////////////////

        $('.js-photos-carousel').slick({
            arrows: false,
            dots: true,
            autoplay: true,
            autoplaySpeed: 5000,
            pauseOnHover: false
        });
        // Make each carousel start playing at different times
        $('.js-photos-carousel').slick('slickPause');
        setTimeout(function () { $('.js-photos-carousel:nth(0)').slick('slickPlay'); }, 1000);
        setTimeout(function () { $('.js-photos-carousel:nth(1)').slick('slickPlay'); }, 250);
        setTimeout(function () { $('.js-photos-carousel:nth(2)').slick('slickPlay'); }, 1500);


        $('.js-slice-cover-toggle').click(function (e) {
            e.preventDefault();

            var target = $(this).data('target');
            if ( uniSliceIsOpened(target) )
            {
                closeUniSlice(target);
            }
            else
            {
                openUniSlice(target);
            }
        });

        $(document).on('scroll.uniSlice', $.debounce(function () {
            var scrollTop = $('body').scrollTop() || $('html').scrollTop();
            var threshold = $('#universities').position().top - $('.js-site-header').height();
            if (scrollTop >= threshold) {
                $('.slice-cover').addClass('slice-cover--opened');
                $(document).off('scroll.uniSlice');
            }
        }, 300));
        $(document).trigger('scroll.uniSlice');


        /////////////////////
        // Picquotes slice //
        /////////////////////

        var $picquotesContainer = $('.js-picquotes-container');
        var $cloneBase = $('.js-picquotes-set').clone().addClass('picquotes-set--clones');
        for (var i=0; i<4; i++) { // Duplicate picquotes 2 times to either side
            var $clone = $cloneBase.clone();
            var leftOffset = 0;
            if ( i % 2 === 0 ) {
                leftOffset = -(i/2 + 1) * 100;
            } else {
                leftOffset = ( (i+1)/2 ) * 100;
            }
            $clone.css('left', leftOffset+'%');
            $picquotesContainer.append($clone);
        }


        /////////////////////
        // Subscribe slice //
        /////////////////////

        var $subscribeForm = $('.js-subscribe-form');
        var $subscribeSuccess = $('.js-subscribe-success');

        $subscribeForm.on('submit', function (event) {
            event.preventDefault();
            $subscribeForm.find('input').prop('disabled', true);

            $.ajax({
                url: PageVars.subscribeAjaxUrl,
                method: 'POST',
                data: {
                    email: $subscribeForm.find('input[name=email]').val(),
                    _token: PageVars.csrfToken
                },
                dataType: 'json',
                success: function (data) {
                    if (data.subscribed) {
                        $subscribeSuccess.css('display', 'block');
                        $subscribeForm.css('display', 'none');
                    }
                },
                complete: function () {
                    $subscribeForm.find('input').prop('disabled', false);
                }
            });
        });


        //////////////////////
        // Contact Us slice //
        //////////////////////

        var $contactUsForm = $('.js-contact-us-form');
        var $contactUsSuccess = $('.js-contact-us-success');

        $contactUsForm.on('submit', function (event) {
            event.preventDefault();
            $contactUsForm.find('input, textarea').prop('disabled', true);

            $.ajax({
                url: PageVars.contactUsAjaxUrl,
                method: 'POST',
                data: {
                    name: $contactUsForm.find('input[name=name]').val(),
                    email: $contactUsForm.find('input[name=email]').val(),
                    subject: $contactUsForm.find('input[name=subject]').val(),
                    message: $contactUsForm.find('textarea[name=message]').val(),
                    _token: PageVars.csrfToken
                },
                dataType: 'json',
                success: function (data) {
                    if (data.success) {
                        $contactUsSuccess.css('display', 'block');
                        $contactUsForm.css('display', 'none');
                    }
                },
                complete: function () {
                    $contactUsForm.find('input, textarea').prop('disabled', false);
                }
            });
        });
    });
})(jQuery);
