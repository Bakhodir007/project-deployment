<div>
    <form action="{{ $url }}" method="GET">
{{--        @csrf--}}
        <div class="input-group input-group-merge">
            <input type="search"
                   class="form-control"
                   placeholder="Search..."
                   aria-label="Search..."
                   aria-describedby="basic-addon-search31"
                   name="search"
                   value="{{ request()->get('search') }}"
            />
            <button type="submit" class="btn btn-outline-primary">
                <i class="ti ti-search"></i>
            </button>
        </div>
    </form>
</div>
