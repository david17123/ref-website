(function articlesList($) {
    $(document).ready(function () {
        // Set PageHeader parameter
        SiteHeader.dynamicHeader = false;
        SiteHeader.updateStyle();

        $('.js-article-entry').click(function (event) {
            event.preventDefault();
            var target = $(this).data('url');
            if (target) {
                window.location = target;
            }
        });
    });
})(jQuery);

//# sourceMappingURL=articlesList.js.map
