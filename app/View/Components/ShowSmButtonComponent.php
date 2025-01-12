<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowSmButtonComponent extends Component
{
    public function __construct(
        public string $url,
        public bool $disabled = false,
    )
    {
    }

    public function render(): View
    {
        return view('components.show-sm-button-component');
    }
}
