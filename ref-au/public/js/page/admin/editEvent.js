(function editEvent($) {
    $(document).ready(function () {
        $('.js-delete-button').click(function (event) {
            if ( !confirm('Are you sure? This cannot be undone.') ) {
                event.preventDefault();
            }
        });
    });
})(jQuery);

//# sourceMappingURL=editEvent.js.map
