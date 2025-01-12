@if($disabled)
    <div class="d-grid mx-1">
        <button type="button" disabled class="btn btn-primary">
            <i class="ti ti-circle-plus me-1"></i>
            Create item
        </button>
    </div>
@else
    <div class="d-grid mx-1">
        <a href="{{ $url }}" class="btn btn-primary">
            <i class="ti ti-circle-plus me-1"></i>
            Create item
        </a>
    </div>
@endif
