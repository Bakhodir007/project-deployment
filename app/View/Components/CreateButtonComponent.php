<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CreateButtonComponent extends Component
{
    public function __construct(
        public bool $disabled = false,
        public string $url = '',
    )
    {
    }

    public function render()
    {
        return view('components.create-button-component');
    }
}
