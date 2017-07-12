(function ($) {
    /**
     * REF select box; wrapper for select2. At the moment select options has to
     * be populated via AJAX call.
     * Parameters:
     *   - root: jQuery element of the simple file input outermost element
     *   - placeholder
     *   - minimumInputLength: Minimum query length to perform AJAX option
     *     search. Defaults to 0.
     *   - allowClear: Allow clearing of selections or not. Defaults to false.
     *   - multiple: Allowing multiple selections or not. Defaults to false.
     *   - optionsAjaxUrl: AJAX URL that handles querying of select options. The
     *     AJAX handler should return a list of options, each of which has the
     *     following format:
     *       - id: This will be used as the option's value
     *       - name: Text to be displayed on the UI
     *   - optionsAjaxField: The field name from which the AJAX handler fetch
     *     the query text to search option entries
     */
    window.REFSelectBox = (function () {
        function REFSelectBox (options) {
            var _this = this;
            this.$root = options.root;
            this.placeholder = options.placeholder ? options.placeholder : '';
            this.minimumInputLength = options.minimumInputLength ? options.minimumInputLength : 0;
            this.allowClear = !!options.allowClear;
            this.multiple = !!options.multiple;
            this.optionsAjaxUrl = options.optionsAjaxUrl ? options.optionsAjaxUrl : '';
            this.optionsAjaxField = options.optionsAjaxField ? options.optionsAjaxField : '';

            // Verify parameter
            if (typeof this.$root !== 'object') {
                throw 'REF select box root element is required';
            } if (!this.optionsAjaxUrl || !this.optionsAjaxField) {
                throw 'REF select box required options AJAX parameters to populate options';
            }

            // Initialize select2
            this.$root.select2({
                placeholder: this.placeholder,
                minimumInputLength: this.minimumInputLength,
                allowClear: this.allowClear,
                multiple: this.multiple,
                ajax: {
                    delay: 150,
                    url: this.optionsAjaxUrl,
                    data: function (params) {
                        var queryData = {};
                        queryData[params.optionsAjaxField] = params.term
                        return queryData;
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
        }

        return REFSelectBox;
    })();
})(jQuery);
