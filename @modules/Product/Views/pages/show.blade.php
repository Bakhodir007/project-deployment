@extends('main')

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-dark">
            Product: {{ $product->name }}
        </span>
    </h4>

    <div class="card">
        <h6 class="card-header">
            Product Information
        </h6>
        @if(!empty($product->image))
            <div class="d-flex justify-content-center">
                <img src="{{ asset($product->image) }}" width="200" class="img-thumbnail" alt="Product Image">
            </div>
        @endif
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th class="text-end">Name</th>
                <th>{{ $product->name }}</th>
            </tr>
            <tr>
                <th class="text-end">Code</th>
                <th>{{ $product->code }}</th>
            </tr>
            <tr>
                <th class="text-end">Author</th>
                <th>{{ $product->author_name }}</th>
            </tr>
            <tr>
                <th class="text-end">Description</th>
                <th class="w-50">{{ $product->description }}</th>
            </tr>
            <tr>
                <th class="text-end">Price</th>
                <th>{{ $product->price }}</th>
            </tr>
            <tr>
                <th class="text-end">Made Date</th>
                <th>{{ $product->made_at?->format('d.m.Y') }}</th>
            </tr>
            <tr>
                <th class="text-end">Lot Expire Date</th>
                <th>{{ $product->lot_expire_at?->format('d.m.Y') }}</th>
            </tr>
            <tr>
                <th class="text-end">Status</th>
                <th><x-status-component :status="$product->status"/></th>
            </tr>
            <tr>
                <th class="text-end">Category</th>
                <th>{{ $product->category?->name }}</th>
            </tr>

            </thead>
        </table>

        @if(!empty($product->categorySpecifications))
            <h3 class="card-header text-center">
                Specifications
            </h3>
            <table class="table table-striped table-hover">
                <thead>
                    @foreach ($product->categorySpecifications as $specification)
                        <tr>
                            <th class="text-end">{{ $specification->specification?->name }}</th>
                            <th>{{ $specification->value }}</th>
                        </tr>
                    @endforeach
                </thead>
            </table>
        @endif
        <div class="card-footer d-flex justify-content-end">
            <x-list-sm-button-component :url="route('product.index')"/>
            <x-edit-sm-button-component :url="route('product.edit',$product->id)"/>
            <x-delete-sm-button-component :url="route('product.destroy',$product->id)"/>
        </div>
    </div>

@endsection
