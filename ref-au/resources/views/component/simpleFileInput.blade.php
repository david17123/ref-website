{{--
    Template parameters:
    - class: Class name(s) to be appended on the root element
    - name: Input field's name
    - buttonText: Custom text for the add file button
    - assets: List of Asset objects
    - uploadUrl: Upload URL as we want to avoid CORS uploads
    - multiple: If allowing multiple file
--}}
<?php $uniqueId = uniqid(); ?>
<div class="simple-file-input {{ $class or '' }} sfi_{{ $uniqueId }}">
    <div class="files-list js-files-list"></div>
    <label class="add-file__button input-button">
        <input type="file" name="files" {{ isset($multiple) && $multiple ? 'multiple' : '' }}/>
        <span>{{ $buttonText or 'Add file' }}</span>
    </label>
    <div class="file-entry-template js-file-entry-template">
        <div class="file-entry js-file-entry">
            <input type="hidden" name="{{ $name or 'simpleFileUpload' }}" value="" />
            <div class="file-entry__remove js-remove-file-button">
                <i class="material-icons">&#xE5CD;</i>
            </div>
            <div class="file-entry__details">
                <a href="#" class="file-entry__details__filename js-filename" target="_blank"></a>
                <span class="file-entry__details__filesize js-filesize"></span>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var fileInput = new SimpleFileInput({
            uploadUrl: '{{ $uploadUrl or '' }}',
            root: $('.sfi_{{ $uniqueId }}'),
            multiple: {{ isset($multiple) && $multiple ? 'true' : 'false' }},
            files: {!! isset($assets) && is_array($assets) ? json_encode($assets) : '[]' !!}
        });
    </script>
</div>
