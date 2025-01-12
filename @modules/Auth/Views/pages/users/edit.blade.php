@extends('main')

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-dark">
            Update user: {{ $user->name }}
        </span>
    </h4>

    <div class="card">
        <div class="card-header">
            User Information
        </div>
        <div class="card-body">
            <form action="{{ route('user.update', $user) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4">
                        <x-html.input-component
                            label="Name"
                            name="name"
                            placeholder="Enter category name"
                            :value="$user->name"
                        />
                    </div>
                    <div class="col-md-4">
                        <x-html.status-select-component :value="$user->status->value"/>
                    </div>
                    <div class="col-md-4">
                        <x-html.input-component
                            label="Email"
                            name="email"
                            placeholder="Enter email"
                            type="email"
                            :value="$user->email"
                        />
                    </div>
                    <div class="col-md-4">
                        <x-html.input-component
                            label="Password"
                            name="password"
                            placeholder="Enter password"
                            type="password"
                            :required="false"
                        />
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="changedNameSection" name="change_password">
                            <label class="form-check-label" for="changedNameSection">Change Password</label>
                        </div>
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
