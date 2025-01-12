@extends('main')

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-dark">
            Category: {{ $category->name }}
        </span>
    </h4>

    <div class="card">
        <h6 class="card-header">
            Category Information
        </h6>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-end">Name</th>
                    <th>{{ $category->name }}</th>
                </tr>
                <tr>
                    <th class="text-end">Status</th>
                    <th><x-status-component :status="$category->status"/></th>
                </tr>
            </thead>
        </table>

        <div class="card-footer d-flex justify-content-end">
            <x-list-sm-button-component :url="route('category.index')"/>
            <x-edit-sm-button-component :url="route('category.edit',$category->id)"/>
            <x-delete-sm-button-component :url="route('category.destroy',$category->id)"/>
        </div>
    </div>

@endsection
