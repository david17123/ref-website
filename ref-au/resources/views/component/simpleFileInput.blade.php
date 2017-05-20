{{--
    This component will upload file directly to back-end and create Asset object
    and return the ID as hidden input. The asset IDs are always sent in the form
    as arrays even though the `multiple` attribute is set to `false`.

    The UI has a remove button, however assets are not immediately removed upon
    clicking the button. It will simply be removed from the UI but actual
    removal should be saved by the form submit back-end handler.

    Template parameters:
    - class: Class name(s) to be appended on the root element
    - name: Input field's name
    - buttonText: Custom text for the add file button
    - assets: List of Asset objects
    - uploadUrl: Upload URL as we want to avoid CORS uploads
    - multiple: If allowing multiple file
--}}

<?php $uniqueId = uniqid(); ?>

@push('js')
    <script type="text/x-template" id="sfi_{{ $uniqueId }}_tpl">
        <div class="file-entry js-file-entry">
            <input type="hidden" name="{{ $name or 'simpleFileUpload' }}[]" value="" />
            <div class="file-entry__remove js-remove-file-button">
                <i class="material-icons">&#xE5CD;</i>
            </div>
            <div class="file-entry__details">
                <a href="#" class="file-entry__details__filename js-filename" target="_blank"></a>
                <span class="file-entry__details__filesize js-filesize"></span>
            </div>
        </div>
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            var fileInput = new SimpleFileInput({
                uploadUrl: '{{ $uploadUrl or '' }}',
                root: $('.sfi_{{ $uniqueId }}'),
                template: $('#sfi_{{ $uniqueId }}_tpl'),
                multiple: {{ isset($multiple) && $multiple ? 'true' : 'false' }},
                files: {!! isset($assets) && (is_array($assets) || $assets instanceof \Illuminate\Support\Collection) ? json_encode($assets) : '[]' !!}
            });
        });
    </script>
@endpush

<div class="simple-file-input {{ $class or '' }} sfi_{{ $uniqueId }}">
    <div class="files-list js-files-list"></div>
    <label class="add-file__button input-button">
        <input type="file" name="files" {{ isset($multiple) && $multiple ? 'multiple' : '' }}/>
        <span>{{ $buttonText or 'Add file' }}</span>
    </label>
</div>
