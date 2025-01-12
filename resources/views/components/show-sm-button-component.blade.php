@if($disabled)
    <button class="btn btn-info" disabled style="margin-left: 5px">
        <i class="ti ti-eye me-1"></i>
        Show
    </button>
@else
    <a href="{{ $url }}" class="btn btn-info" style="margin-left: 5px">
        <i class="ti ti-eye me-1"></i>
        Show
    </a>
@endif
