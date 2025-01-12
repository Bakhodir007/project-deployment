<?php

namespace Modules\Product\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Component;
use Modules\Category\Models\CategorySpecification;
use Modules\Product\Models\Product;

class UpdateProductComponent extends Component
{
    public Product $product;

    public ?int $category_id = null;

    public $specifications;

    public bool $specHasChanged = false;

    public function mount(): void
    {
        $this->category_id = $this->product->category_id;
        $this->specifications = $this
            ->product
            ->categorySpecifications;
    }

    public function updatedCategoryId(): void
    {
        $this->specHasChanged = true;
        $this->specifications = CategorySpecification::where('category_id', $this->category_id)->get();
    }

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|Factory|View|Application
    {
        return view('product::livewire.category.edit');
    }
}
