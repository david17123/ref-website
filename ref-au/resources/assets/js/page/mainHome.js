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
    });
})(jQuery);
