{{--
    Template parameters:
    - class: Class name(s) to be appended on the root element
    - name: Input field's name
    - textName: Field's textual name to be displayed in the UI
    - defaultValue: Typically currently existing value
    - required
--}}

<div class="form-field {{ $class or '' }}">
    <div class="form-field__label">
        {{ $textName }}
    </div>
    <div class="form-field__input">
        <textarea name="{{ $name }}" class="input-text" {{ $required ? 'required' : '' }}>{{ old($name) ? old($name) : $defaultValue }}</textarea>

        @if ($errors->has($name))
            <span class="form-field__error-message">
                {{ $errors->first($name) }}
            </span>
        @endif
    </div>
</div>
