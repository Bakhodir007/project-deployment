<div>
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <x-html.input-component
                    label="Name"
                    name="name"
                    placeholder="Enter name"
                    :value="old('name')"
                />
            </div>
            <div class="col-md-4">
                <x-html.input-component
                    label="Code"
                    name="code"
                    placeholder="Enter code"
                    :value="old('code')"
                />
            </div>
            <div class="col-md-4">
                <x-html.input-component
                    label="Author"
                    name="author_name"
                    placeholder="Enter Author"
                    :value="old('author_name')"
                />
            </div>
            <div class="col-md-2">
                <x-html.input-component
                    label="Made date"
                    name="made_at"
                    type="date"
                    :value="old('made_at')"
                />
            </div>
            <div class="col-md-2">
                <x-html.input-component
                    label="Lot expire date"
                    name="lot_expire_at"
                    type="date"
                    :value="old('lot_expire_date')"
                />
            </div>
            <div class="col-md-8">
                <x-html.input-component
                    label="Description"
                    name="description"
                    placeholder="Enter description"
                    :value="old('description')"
                />
            </div>
            <div class="col-md-4">
                <x-html.input-component
                    label="Price"
                    name="price"
                    placeholder="Enter price"
                    type="number"
                    :value="old('price')"
                />
            </div>
            <div class="col-md-4">
                <x-html.status-select-component/>
            </div>
            <div class="col-md-4">
                <x-html.select-component
                    label="Category"
                    name="category_id"
                    wire:model="category_id"
                    :collection="collect(\Modules\Category\Models\Category::getMapped())"
                    :value="old('category_id')"
                />
            </div>
            <div class="col-md-12">
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
            @if(!empty($specifications))
                <div class="col-md-12">
                    <h4>Specifications</h4>
                </div>
                @foreach($specifications as $id => $name)
                    <div class="col-md-4">
                        <x-html.input-component
                            label="{{ $name }}"
                            name="specifications[{{ $id }}]"
                            placeholder="Enter {{ $name }}"
                        />
                    </div>
                @endforeach
            @endif
        </div>
        <div class="card-footer d-flex justify-content-end">
            <x-cancel-button-component :url="route('product.index')"/>
            <x-submit-button-component/>
        </div>
    </form>
</div>
