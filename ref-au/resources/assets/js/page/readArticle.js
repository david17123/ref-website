(function readArticle($) {
    $(document).ready(function () {
        // Set article content
        $('.js-article-text-container').html(marked(PageVars.articleContent));
    });
})(jQuery);
