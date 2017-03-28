(function home($) {
    $(document).ready(function () {
        $('.uni--create-button').on('click', function (event) {
            event.preventDefault();
            var $this = $(this);

            if ($this.hasClass('uni--disabled')) {
                return;
            }
            $this.addClass('uni--disabled');
            $('.js-create-form').submit();
        });
    });
})(jQuery);

//# sourceMappingURL=home.js.map
