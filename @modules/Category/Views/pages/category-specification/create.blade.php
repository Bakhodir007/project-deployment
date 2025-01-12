@extends('main')

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-dark">
            Create category specification
        </span>
    </h4>

    <div class="card">
        <div class="card-header">
            Category Specification Information
        </div>
        <div class="card-body">
            <form action="{{ route('category-specification.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <x-html.input-component
                            label="Name"
                            name="name"
                            placeholder="Enter name"
                        />
                    </div>
                    <div class="col-md-4">
                        <x-html.select-component
                            label="Category"
                            name="category_id"
                            :collection="collect(\Modules\Category\Models\Category::getMapped())"
                        />
                    </div>
                    <div class="col-md-4">
                        <x-html.status-select-component />
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <x-cancel-button-component :url="route('category-specification.index')"/>
                    <x-submit-button-component />
                </div>
            </form>
        </div>
    </div>

@endsection
