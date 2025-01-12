<div class="form-floating mb-3">
    <select
        {{ $attributes }}
        class="form-control @error($name) is-invalid @enderror"
        id="{{ $id }}"
        aria-describedby="{{ $name }}-help"
        name="{{ $name }}"
        @if($required) required @endif
        @if($disabled) disabled @endif
    >
        <option @isset($default) @else hidden @endisset value="{{ (isset($default)) ? $default : null }}">
            @isset($default)
                Select all
            @else
                Select
            @endisset
        </option>
        @forelse($collection as $key => $collection_value)
            <option value="{{ $key }}" @selected($key == old($name,$value))>{{ $collection_value }}</option>
        @empty
        @endforelse
    </select>
    <label for="{{ $id }}">
        {{$label}} @if($required)
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
