<!--<div class="form-floating mb-3">
    <input  
        type="text"   
        class="form-control {{ $errors->has('$value') ? 'is-invalid' : '{{ $value }}' }}" 
        name="{{ $name }}" 
        placeholder="{{ $placeholder }}"
        value="{{ $value }}"
    />
    @if($errors->has($value))
        <div class='invalid-feedback'>
            {{ $errors->first($value ) }}
        </div>
    @endif
    <label for="nome">{{ $label }}</label>
</div>-->