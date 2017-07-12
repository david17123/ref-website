{{--
    Template parameters:
    - class: Class name(s) to be appended on the root element
    - name: Input field's name
    - textName: Field's textual name to be displayed in the UI
    - defaultValue: Typically currently existing value
    - defaultValueText: Textual UI for the default value
    - placeholder
    - minimumInputLength
    - allowClear
    - multiple
    - optionsAjaxUrl
    - optionsAjaxField
--}}

<?php $uniqueId = uniqid(); ?>

@push('js')
    <script type="text/javascript">
        $(document).ready(function () {
            var refSelectBox = new REFSelectBox({
                root: $('.rsb_{{ $uniqueId }}'),
                placeholder: '{{ $placeholder or '' }}',
                minimumInputLength: {{ is_int($minimumInputLength) ? $minimumInputLength : 0 }},
                allowClear: {{ isset($allowClear) && $allowClear ? 'true' : 'false' }},
                multiple: {{ isset($multiple) && $multiple ? 'true' : 'false' }},
                optionsAjaxUrl: '{{ $optionsAjaxUrl or '' }}',
                optionsAjaxField: '{{ $optionsAjaxField or '' }}'
            });
        });
    </script>
@endpush

<div class="form-field {{ $class or '' }}">
    <div class="form-field__label">
        {{ $textName }}
    </div>
    <div class="form-field__input">
        <select class="rsb_{{ $uniqueId }}" name="{{ $name }}">
            @if ($defaultValue && $defaultValueText)
                <option value="{{ $defaultValue }}">{{ $defaultValueText }}</option>
            @endif
        </select>
    </div>
</div>
