@if($disabled)
    <button class="btn btn-primary" disabled style="margin-left: 5px">
        <i class="ti ti-edit me-1"></i>
        Edit
    </button>
@else
    <a href="{{ $url }}" class="btn btn-primary" style="margin-left: 5px">
        <i class="ti ti-edit me-1"></i>
        Edit
    </a>
@endif
