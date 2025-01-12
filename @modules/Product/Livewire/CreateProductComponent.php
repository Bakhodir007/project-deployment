<?php

namespace Modules\Product\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Component;
use Modules\Category\Models\CategorySpecification;

class CreateProductComponent extends Component
{
    public ?int $category_id = null;

    public $specifications;

    public function updatedCategoryId(): void
    {
        $this->specifications = CategorySpecification::where('category_id', $this->category_id)
            ->get()
            ->pluck('name', 'id')
            ->toArray();
    }

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|Factory|View|Application
    {
        return view('product::livewire.category.create');
    }
}
