(function readSermonSummary($) {
    $(document).ready(function () {
        // Set sermon-summary content
        $('.js-sermon-summary-text-container').html(marked(PageVars.sermonSummaryContent));

        // Set PageHeader parameter
        SiteHeader.dynamicHeader = false;
        SiteHeader.updateStyle();
    });
})(jQuery);
