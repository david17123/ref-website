(function ($) {
    /**
     * Simple file input JS interface. This is a wrapper for jQueryFileUpload.
     * Parameters:
     *   - uploadUrl
     *   - root: jQuery element of the simple file input outermost element
     *   - multiple: Allowing multiple file uploads or not
     *   - files: List of files in JSON format, with the following attributes:
     *            - filename
     *            - url
     *            - size (in bytes)
     *            - id
     */
    window.SimpleFileInput = (function () {
        function SimpleFileInput (options) {
            var _this = this;
            this.$root = options.root;
            this.multiple = !!options.multiple;

            // Verify parameter
            if (typeof this.$root !== 'object') {
                throw 'Simple file input container root element is required';
            }
            if (typeof options.uploadUrl !== 'string') {
                throw 'Invalid upload URL';
            } else if (options.uploadUrl === '') {
                throw 'Missing upload URL';
            }

            // Set files
            options.files = options.files && Array.isArray(options.files) ? options.files : [];
            this.setFilesList(options.files);

            // Initialize jQueryFileUpload
            this.$root.find('input[type=file]').fileupload({
                url: options.uploadUrl,
                type: 'POST',
                dataType: 'json',
                dropZone: this.$root,
                singleFileUploads: true,
                add: function (e, data) {
                    data.context = data.context || {};
                    data.context.$fileEntry = _this.addToFilesList({
                        filename: data.files[0].name, // This assumes singleFileUploads is true
                        size: data.files[0].size
                    });

                    var jqXHR = data.submit();
                    data.context.$fileEntry.data('jqXHR', jqXHR);
                },
                done: function (e, data) {
                    // Update fileData attached to $fileEntry
                    var $fileEntry = data.context.$fileEntry;
                    var fileData = $fileEntry.data('fileData');
                    var returnedFileData = data.result.files[0];
                    fileData.id = returnedFileData.asset.id;

                    updateFileEntryBasedOnStatus($fileEntry);
                },
                fail: function (e, data) {
                    var $fileEntry = data.context.$fileEntry;
                    updateFileEntryBasedOnStatus($fileEntry);
                },
                progress: function (e, data) {
                    // TODO @David data.loaded / data.total * 100
                }
            });
        }

        /**
        * @param Object file fileData
        * @return jQueryElement The newly appended $fileEntry
        */
        SimpleFileInput.prototype.addToFilesList = function (file) {
            var $template = this.$root.find('.js-file-entry-template');

            // Remove existing file entries if non-multiple Model
            if (!this.multiple) {
                this.clearFilesList();
            }

            // Construct $fileEntry
            var $fileEntry = $($template.html());
            $fileEntry.data('fileData', file);

            updateFileEntryBasedOnStatus($fileEntry);

            // Set event handler
            $fileEntry.find('.js-remove-file-button').click(function (e) {
                e.preventDefault();

                var $fileEntry = $(e.target).parents('.js-file-entry');
                removeFileEntry($fileEntry);
            });

            // Attach to UI
            this.$root.find('.js-files-list').append($fileEntry);

            return $fileEntry;
        };

        // TODO @David [test]
        SimpleFileInput.prototype.clearFilesList = function (callback) {
            var $fileEntries = this.$root.find('.js-files-list .js-file-entry');
            var entriesToDelete = $fileEntries.length;
            var removedCallback = function () {
                deletedEntriesCount--;
                if (deletedEntriesCount <= 0) {
                    callback();
                }
            };

            $fileEntries.each(function () {
                var $fileEntry = $(this);
                removeFileEntry($fileEntry, removedCallback);
            });
        };

        // TODO @David [test]
        SimpleFileInput.prototype.getFilesList = function () {
            var files = [];
            this.$root.find('.js-files-list .js-file-entry').each(function () {
                var $fileEntry = $(this);
                files.push($fileEntry.data('fileData'));
            });

            return files;
        };

        /**
         * If more than 1 file is given on non-multiple setting, only the first
         * file will be populated.
         *
         * @param [fileData] files Files list to set as uploaded
         */
        SimpleFileInput.prototype.setFilesList = function (files) {
            var filesToSet = files;
            if (!this.multiple && files.length > 0) {
                filesToSet = [files[0]];
            }

            for (var i=0; i<files.length; i++) {
                this.addToFilesList(files[i]);
            }
        };

        //////////////////////////// Helper methods ////////////////////////////

        function removeFileEntry($fileEntry, callback) {
            // TODO Deal with jQueryFileUpload. Behave according to upload status. Parameterize this behavior? This may not be desired sometimes.
            $fileEntry.remove();
        }

        var updateFileEntryBasedOnStatus = function ($fileEntry) {
            var fileData = $fileEntry.data('fileData');
            var status = getFileEntryStatus($fileEntry);

            if (status === 'uploaded') {
                $fileEntry.find('.js-filename').text(fileData.filename).attr('href', fileData.url);
                $fileEntry.find('.js-filesize').text( $.formatFileSize(fileData.size) );
                $fileEntry.find('input[type=hidden]').val(fileData.id);

                $fileEntry.removeClass('file-entry--uploading');
                $fileEntry.removeClass('file-entry--error');
            } else if (status === 'uploading') {
                $fileEntry.find('.js-filename').text(fileData.filename).attr('href', '');
                $fileEntry.find('.js-filesize').text('');
                $fileEntry.find('input[type=hidden]').val('');

                $fileEntry.addClass('file-entry--uploading');
                $fileEntry.removeClass('file-entry--error');
            } else if (status === 'failed') {
                $fileEntry.find('.js-filename').text(fileData.filename).attr('href', '');
                $fileEntry.find('.js-filesize').text('');
                $fileEntry.find('input[type=hidden]').val('');

                $fileEntry.removeClass('file-entry--uploading');
                $fileEntry.addClass('file-entry--error');
            } else {
                console.error('Unknown status:', status);
            }
        };

        /**
         * Gets the file entry upload status based on jqXHR object attached to
         * it.
         *
         * @return string uploaded, uploading, or failed
         */
        var getFileEntryStatus = function ($fileEntry) {
            var jqXHR = $fileEntry.data('jqXHR');
            if (jqXHR) {
                var state = jqXHR.state();
                if (state === 'resolved') {
                    return 'uploaded';
                } else if (state === 'pending') {
                    return 'uploading';
                } else {
                    return 'failed';
                }
            } else {
                return 'uploaded';
            }
        };

        return SimpleFileInput;
    })();
})(jQuery);
