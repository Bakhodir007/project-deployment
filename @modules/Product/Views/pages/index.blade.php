@extends('main')

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-dark">
            Products
        </span>
    </h4>

    <div class="card">
        <div class="card-header">
            <div class="row mb-2 justify-content-end">
                <div class="col-sm-3">
                    <x-search-form-component :url="route('product.index')"/>
                </div>
                <div class="col-sm-2">
                    <x-create-button-component :url="route('product.create')"/>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>Code</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($models as $model)
                        <tr>
                            <td>{{ $model->id }}</td>
                            <td>{{ $model->name }}</td>
                            <td>{{ $model->category?->name }}</td>
                            <td>{{ $model->author_name }}</td>
                            <td>{{ $model->code }}</td>
                            <td>
                                <x-status-component :status="$model->status"/>
                            </td>
                            <td>{{ $model->created_at?->format('d.m.Y') }}</td>
                            <td>
                                <x-show-sm-button-component :url="route('product.show', $model)"/>
                                <x-edit-sm-button-component :url="route('product.edit', $model)"/>
                                <x-delete-sm-button-component :url="route('product.destroy', $model)"/>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="8">
                                <x-no-info/>
                            </th>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div
                    class="col-sm-12 col-md-6 mt-1 d-flex align-items-center justify-content-md-start justify-content-center">
                    {{ __('pagination.info',['first' => $models->firstItem() ?: 0,'last' => $models->lastItem() ?: 0,'total' => $models->total()]) }}
                </div>
                <div
                    class="col-sm-12 col-md-6 mt-1 d-flex align-items-center justify-content-md-end justify-content-center">
                    {!! $models->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
