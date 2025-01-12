@extends('main')

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-dark">
            User: {{ $user->name }}
        </span>
    </h4>

    <div class="card">
        <h6 class="card-header">
            User Information
        </h6>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-end">Name</th>
                    <th>{{ $user->name }}</th>
                </tr>
                <tr>
                    <th class="text-end">Email</th>
                    <th>{{ $user->email }}</th>
                </tr>
                <tr>
                    <th class="text-end">Created Date</th>
                    <th>{{ $user->created_at }}</th>
                </tr>
                <tr>
                    <th class="text-end">Status</th>
                    <th><x-status-component :status="$user->status"/></th>
                </tr>
            </thead>
        </table>

        <div class="card-footer d-flex justify-content-end">
            <x-list-sm-button-component :url="route('user.index')"/>
            <x-edit-sm-button-component :url="route('user.edit',$user->id)"/>
            <x-delete-sm-button-component :url="route('user.destroy',$user->id)"/>
        </div>
    </div>

@endsection
