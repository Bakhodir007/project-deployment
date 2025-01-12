@if($disabled)
    <button class="btn btn-outline-primary" disabled>
        <i class="ti ti-list me-1"></i>
        List
    </button>
@else
    <a href="{{ $url }}" class="btn btn-outline-primary">
        <i class="ti ti-list me-1"></i>
        List
    </a>
@endif
