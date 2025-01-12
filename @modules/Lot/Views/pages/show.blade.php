@extends('main')

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-dark">
            Product: {{ $lot->name }}
        </span>
    </h4>

    <div class="card">
        <h6 class="card-header">
            Product Information
        </h6>
        @if(!empty($lot->image))
            <div class="d-flex justify-content-center">
                <img src="{{ asset($lot->image) }}" width="200" class="img-thumbnail" alt="Product Image">
            </div>
        @endif
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th class="text-end">Name</th>
                <th>{{ $lot->name }}</th>
            </tr>
            <tr>
                <th class="text-end">Code</th>
                <th>{{ $lot->code }}</th>
            </tr>
            <tr>
                <th class="text-end">Author</th>
                <th>{{ $lot->author_name }}</th>
            </tr>
            <tr>
                <th class="text-end">Description</th>
                <th class="w-50">{{ $lot->description }}</th>
            </tr>
            <tr>
                <th class="text-end">Price</th>
                <th>{{ $lot->price }}</th>
            </tr>
            <tr>
                <th class="text-end">Made Date</th>
                <th>{{ $lot->made_at?->format('d.m.Y') }}</th>
            </tr>
            <tr>
                <th class="text-end">Lot Expire Date</th>
                <th>{{ $lot->lot_expire_at?->format('d.m.Y') }}</th>
            </tr>
            <tr>
                <th class="text-end">Status</th>
                <th><x-status-component :status="$lot->status"/></th>
            </tr>
            <tr>
                <th class="text-end">Category</th>
                <th>{{ $lot->category?->name }}</th>
            </tr>

            </thead>
        </table>

        @if(!empty($lot->categorySpecifications))
            <h3 class="card-header text-center">
                Specifications
            </h3>
            <table class="table table-striped table-hover">
                <thead>
                @foreach ($lot->categorySpecifications as $specification)
                    <tr>
                        <th class="text-end">{{ $specification->specification?->name }}</th>
                        <th>{{ $specification->value }}</th>
                    </tr>
                @endforeach
                </thead>
            </table>
        @endif
    </div>

@endsection
