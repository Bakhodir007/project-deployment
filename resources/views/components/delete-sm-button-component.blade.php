@if($disabled)
    <div class="d-grid">
        <button type="button" class="btn btn-danger" disabled>
            <i class="ti ti-trash me-1"></i>
            Delete
        </button>
    </div>
@else
    <form
            style="margin-left: 5px"
            class="d-inline"
            action="{{ $url }}"
            method="POST">
        @csrf
        @method('DELETE')
        <button onclick="return confirm('Please confirm your deletion')" type="submit" class="btn btn-danger">
            <i class="ti ti-trash me-1"></i>
            Delete
        </button>
    </form>
@endif
