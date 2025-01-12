<div>
    <form action="{{ route('product.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-4">
                <x-html.input-component
                    label="Name"
                    name="name"
                    placeholder="Enter name"
                    :value="$product->name"
                />
            </div>
            <div class="col-md-4">
                <x-html.input-component
                    label="Code"
                    name="code"
                    placeholder="Enter code"
                    :value="$product->code"
                />
            </div>
            <div class="col-md-4">
                <x-html.input-component
                    label="Author"
                    name="author_name"
                    placeholder="Enter Author"
                    :value="$product->author_name"
                />
            </div>
            <div class="col-md-2">
                <x-html.input-component
                    label="Made date"
                    name="made_at"
                    type="date"
                    :value="$product->made_at?->toDateString()"
                />
            </div>
            <div class="col-md-2">
                <x-html.input-component
                    label="Lot expire date"
                    name="lot_expire_at"
                    type="date"
                    :value="$product->lot_expire_at?->toDateString()"
                />
            </div>
            <div class="col-md-8">
                <x-html.input-component
                    label="Description"
                    name="description"
                    placeholder="Enter description"
                    :value="$product->description"
                />
            </div>
            <div class="col-md-4">
                <x-html.input-component
                    label="Price"
                    name="price"
                    placeholder="Enter price"
                    type="number"
                    :value="$product->price"
                />
            </div>
            <div class="col-md-4">
                <x-html.status-select-component :value="$product->status?->value"/>
            </div>
            <div class="col-md-4">
                <x-html.select-component
                    label="Category"
                    name="category_id"
                    wire:model="category_id"
                    :collection="collect(\Modules\Category\Models\Category::getMapped())"
                    :value="$product->category_id"
                />
            </div>
            <div class="col-md-4">
                @if(!empty($product->image))
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset($product->image) }}"  class="img-thumbnail w-50" alt="Product Image">
                    </div>
                @endif
            </div>
            <div class="col-md-8">
                <div class="form-floating mb-3">
                    <input
                        type="file"
                        class="form-control form-control-sm"
                        id="image-upload"
                        placeholder="Choose file"
                        name="file"
                        accept="image/*" required
                    />
                    <label for="image-upload">Image <span class="text-danger">*</span></label>
                </div>
            </div>
            @if($specHasChanged)
                <br>
                <h6 class="col-md-12">
                    <h4>Specifications</h4>
                </h6>
                @foreach($specifications as $specification)
                    <div class="col-md-4">
                        <x-html.input-component
                            label="{{ $specification->name }}"
                            name="specifications[{{ $specification->id }}]"
                            placeholder="Enter {{ $specification->name }}"
                        />
                    </div>
                @endforeach
            @else
                @if(!empty($specifications))
                    <br>
                    <h6 class="col-md-12">
                        <h4>Specifications</h4>
                    </h6>
                    @foreach($specifications as $specification)
                        <div class="col-md-4">
                            <x-html.input-component
                                label="{{ $specification->specification->name }}"
                                name="specifications[{{ $specification->id }}]"
                                placeholder="Enter {{ $specification->specification->value }}"
                                :value="$specification->value"
                            />
                        </div>
                    @endforeach
                @endif
            @endif
        </div>
        <div class="card-footer d-flex justify-content-end">
            <x-cancel-button-component :url="route('product.index')"/>
            <x-submit-button-component/>
        </div>
    </form>
</div>
