<div class="form-floating mb-3">
    <input
        {{ $attributes }}
        type="{{ $type }}"
        class="form-control form-control-sm @error($name) is-invalid @enderror"
        id="{{ $id }}"
        placeholder="{{ $label }}"
        aria-describedby="{{ $name }}-help"
        name="{{ $name }}"
        value="{{ str(old($name, $value))->toString() }}"
        @if($disabled) disabled @endif
        @if($required) required @endif
    @if($pattern !== null)
        {!! $pattern !!}
        @endif
    />
    <label for="{{ $id }}">{{ $label }} @if($required)
            <span class="text-danger">*</span>
        @endif
    </label>
    @if($note)
        <div id="{{ $name }}-help" class="form-text">
            {{ $note }}
        </div>
    @endif
    @error($name)
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
    @enderror
    @if($disabled)
        <input type="hidden" name="{{ $name }}" value="{{ $value }}" {{ $attributes }}>
    @endif
</div>
