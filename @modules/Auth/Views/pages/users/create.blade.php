@extends('main')

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-dark">
            Create user
        </span>
    </h4>

    <div class="card">
        <div class="card-header">
            User Information
        </div>
        <div class="card-body">
            <form action="{{ route('user.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <x-html.input-component
                            label="Name"
                            name="name"
                            placeholder="Enter category name"
                        />
                    </div>
                    <div class="col-md-4">
                        <x-html.status-select-component />
                    </div>
                    <div class="col-md-4">
                        <x-html.input-component
                            label="Email"
                            name="email"
                            placeholder="Enter email"
                            type="email"
                        />
                    </div>
                    <div class="col-md-4">
                        <x-html.input-component
                            label="Password"
                            name="password"
                            placeholder="Enter password"
                            type="password"
                        />
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <x-cancel-button-component :url="route('user.index')"/>
                    <x-submit-button-component />
                </div>
            </form>
        </div>
    </div>

@endsection
