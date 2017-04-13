(function home($) {
    $(document).ready(function () {
        $('.js-preacher-select').select2({
            placeholder: 'Select a preacher',
            allowClear: false,
            multiple: false,
            ajax: {
                delay: 150,
                url: PageVars.preachersAjaxUrl,
                data: function (params) {
                    return {
                        name: params.term
                    };
                },
                processResults: function (data) {
                    var selectData = [];
                    for (var i=0; i<data.length; i++) {
                        selectData.push({
                            text: data[i].name,
                            id: data[i].id
                        });
                    }

                    return {
                        results: selectData
                    };
                }
            }
        });

        $('.js-summarizer-select').select2({
            placeholder: 'Select a summarizer',
            allowClear: false,
            multiple: false,
            ajax: {
                delay: 150,
                url: PageVars.preachersAjaxUrl,
                data: function (params) {
                    return {
                        name: params.term
                    };
                },
                processResults: function (data) {
                    var selectData = [];
                    for (var i=0; i<data.length; i++) {
                        selectData.push({
                            text: data[i].name,
                            id: data[i].id
                        });
                    }

                    return {
                        results: selectData
                    };
                }
            }
        });

        $('.js-delete-button').click(function (event) {
            if ( !confirm('Are you sure? This cannot be undone.') ) {
                event.preventDefault();
            }
        });
    });
})(jQuery);
