<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ListSmButtonComponent extends Component
{
    public function __construct(
        public string $url,
        public bool $disabled = false,
    )
    {
    }

    public function render(): View
    {
        return view('components.list-sm-button-component');
    }
}
