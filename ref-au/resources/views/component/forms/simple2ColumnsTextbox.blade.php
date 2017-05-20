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
        <input class="input-text{{ $errors->has($name) ? ' input-text--error' : '' }}" type="text" name="{{ $name }}" value="{{ old($name) ? old($name) : $defaultValue }}" {{ $required ? 'required' : '' }} />

        @if ($errors->has($name))
            <span class="form-field__error-message">
                {{ $errors->first($name) }}
            </span>
        @endif
    </div>
</div>
