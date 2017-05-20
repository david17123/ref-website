{{--
    Template parameters:
    - class: Class name(s) to be appended on the root element
    - fileInputClass: Class name(s) to be appended on the root element
    - name: Input field's name
    - textName: Field's textual name to be displayed in the UI
    - buttonText: Custom text for the add file button
    - assets: List of Asset objects
    - uploadUrl: Upload URL as we want to avoid CORS uploads
    - multiple: If allowing multiple file
--}}

<div class="form-field {{ $class or '' }}">
    <div class="form-field__label">
        {{ $textName }}
    </div>
    <div class="form-field__input">
        @include('component.simpleFileInput', [
            'class' => isset($fileInputClass) ? $fileInputClass : null,
            'name' => isset($name) ? $name : null,
            'buttonText' => isset($buttonText) ? $buttonText : null,
            'assets' => isset($assets) ? $assets : [],
            'uploadUrl' => isset($uploadUrl) ? $uploadUrl : null,
            'multiple' => isset($multiple) ? $multiple : false
        ])
        @if ($errors->has($name))
            <span class="form-field__error-message">
                {{ $errors->first($name) }}
            </span>
        @endif
    </div>
</div>
