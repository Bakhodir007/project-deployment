@extends('main')

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-dark">
            Create Product
        </span>
    </h4>
    <div class="card">
        <div class="card-header">
            Product Information
        </div>
        <div class="card-body">
            @livewire('create-product-component')
        </div>
    </div>
@endsection
