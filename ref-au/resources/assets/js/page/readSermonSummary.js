(function readSermonSummary($) {
    $(document).ready(function () {
        // Set sermon-summary content
        $('.js-sermon-summary-text-container').html(marked(PageVars.sermonSummaryContent));
    });
})(jQuery);
