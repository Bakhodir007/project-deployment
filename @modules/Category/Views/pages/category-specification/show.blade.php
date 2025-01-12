@extends('main')

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-dark">
            Category Specification: {{ $categorySpecification->name }}
        </span>
    </h4>

    <div class="card">
        <h6 class="card-header">
            Category Specification Information
        </h6>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-end">Name</th>
                    <th>{{ $categorySpecification->name }}</th>
                </tr>
                <tr>
                    <th class="text-end">Category</th>
                    <th>{{ $categorySpecification->category?->name }}</th>
                </tr>
                <tr>
                    <th class="text-end">Status</th>
                    <th><x-status-component :status="$categorySpecification->status"/></th>
                </tr>
            </thead>
        </table>

        <div class="card-footer d-flex justify-content-end">
            <x-list-sm-button-component :url="route('category-specification.index')"/>
            <x-edit-sm-button-component :url="route('category-specification.edit',$categorySpecification->id)"/>
            <x-delete-sm-button-component :url="route('category-specification.destroy',$categorySpecification->id)"/>
        </div>
    </div>

@endsection
