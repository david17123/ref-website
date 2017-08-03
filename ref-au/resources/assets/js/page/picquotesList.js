(function picquotesList($) {
    $(document).ready(function () {
        // Set PageHeader parameter
        SiteHeader.dynamicHeader = false;
        SiteHeader.updateStyle();

        $('.js-picquotes-container').magnificPopup({
            delegate: '.js-picquote',
            type: 'image',
            gallery: {
                enabled: true
            },
            zoom: {
                enabled: true,
                duration: 150,
                easing: 'ease-in-out',
                opener: function (openerElement) {
                    return openerElement;
                }
            }
        });
    });
})(jQuery);
