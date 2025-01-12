@if($disabled)
    <div class="d-grid mx-1">
        <button type="button" disabled class="btn btn-outline-secondary">
            <i class="ti ti-circle-plus me-1"></i>
            Cancel
        </button>
    </div>
@else
    <div class="d-grid">
        <a href="{{ $url }}"
           class="btn btn-outline-secondary btn-lg">
            <i class="ti ti-arrow-back me-1"></i>
            Cancel
        </a>
    </div>
@endif
