<div>
    @if($status->value == \App\Support\Enums\Status::ACTIVE->value)
        <span class="badge bg-success">
            Active
        </span>
    @else
        <span class="badge bg-danger">
           Inactive
        </span>
    @endif
</div>
