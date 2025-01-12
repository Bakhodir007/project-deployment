<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DeleteSmButtonComponent extends Component
{
    public function __construct(
        public bool $disabled = false,
        public string $url = '',
    )
    {
    }

    public function render()
    {
        return view('components.delete-sm-button-component');
    }
}
