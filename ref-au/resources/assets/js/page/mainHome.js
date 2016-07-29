(function mainHome($) {
    /**
     * @param string uniSlice The class name that points to the uni slice
     */
    var openUniSlice = function (uniSlice) {
        $('.slice--university .slice-cover').removeClass('slice-cover--opened');
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
            autoplaySpeed: 3000
        });

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
    });
})(jQuery);
