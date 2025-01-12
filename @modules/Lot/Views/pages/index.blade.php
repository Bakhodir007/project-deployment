@extends('main')

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-dark">
            Lots
        </span>
    </h4>
    <div class="row">
        <div class="col-12 mb-3">
            <div class="card">
                <div class="card-body">
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
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="">
                        <form action="{{ route('lot.index') }}" METHOD="GET">
                            <h6 class="text-center">
                                Filter form
                            </h6>
                            <div class="row">
                                <?php
                                $old = collect(request()->query('filter'));
                                ?>
                                <div class="col-12">
                                    <x-html.input-component
                                        name="filter[name]"
                                        label="Name"
                                        :required="false"
                                        :value="$old->get('name')"
                                    />
                                </div>
                                <div class="col-12">
                                    <x-html.select-component
                                        name="filter[category_id]"
                                        label="Category"
                                        :collection="collect(\Modules\Category\Models\Category::getMapped())"
                                        :required="false"
                                        :value="$old->get('category_id')"
                                    />
                                </div>
                                <div class="col-6">
                                    <x-html.input-component
                                        name="filter[price_from]"
                                        label="Price From"
                                        :required="false"
                                        :value="$old->get('price_from')"
                                        type="number"
                                    />
                                </div>
                                <div class="col-6">
                                    <x-html.input-component
                                        name="filter[price_to]"
                                        label="Price To"
                                        :required="false"
                                        :value="$old->get('price_to')"
                                        type="number"
                                    />
                                </div>
                                <div class="col-12">
                                    <x-html.input-component
                                        name="filter[lot_expire_date]"
                                        label="Lot Expire Date"
                                        :required="false"
                                        :value="$old->get('lot_expire_date')"
                                        type="date"
                                    />
                                </div>
                                <div class="col-12">
                                    <x-html.input-component
                                        name="filter[specification]"
                                        label="Specification"
                                        :required="false"
                                        :value="$old->get('specification')"
                                    />
                                </div>
                            </div>

                            <div class="d-grid" style="margin-left: 5px">
                                <button type="submit" class="ml-1 btn btn-primary">
                                    <i class="ti ti-search me-2"></i>
                                    Filter
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-8 col-lg-9">
            <div class="row">
                @forelse($models as $model)
                    <div class="col-12 col-sm-12 col-md-6 mb-3">
                        <div class="card">
                            <div class="d-flex align-items-end row">
                                <div class="col-7">
                                    <div class="card-body text-nowrap">
                                        <h5 class="card-title mb-2">{{ $model->name }}</h5>
                                        <div class="row d-flex align-items-center justify-content-center">
                                            <div class="col-12">
                                                <div class="d-flex ">
                                                    <div class="flex-shrink-0 me-2">
                                                        <div class="avatar">
                                                            <img src="{{ asset('assets/img/avatars/1.png') }}" alt="" class="h-auto rounded-circle">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <small class="fw-semibold">
                                                            {{ $model->author_name }}
                                                            <br>
                                                            <span class="badge rounded-pill bg-label-dark">
                                                                {{ $model->category->name }}
                                                            </span>
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6 mt-1 text-center">
                                                <small>Lot expire:</small>
                                                <h5 class="text-dark my-1 text-center">
                                                    {{$model->lot_expire_at?->format('d.m.Y')}}
                                                </h5>
                                            </div>
                                            <div class="col-6 mt-1 text-center">
                                                <small>Price:</small>
                                                <h5 class="text-dark mb-1 text-center">
                                                    ${{ $model->price }}
                                                </h5>
                                            </div>
                                            <div class="col-12 text-center">
                                                <a href="{{ route('lot.show',$model) }}"
                                                   class="btn btn-label-primary btn-sm waves-effect waves-light">
                                                    <i class="ti ti-eye me-1"></i>
                                                    View
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-5 text-center text-sm-left">
                                    <div class="card-body">
                                        <img src="{{ asset($model->image)}}" height="140" alt="image" class="rounded">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <x-no-info/>
                @endforelse
            </div>
        </div>
    </div>
@endsection
