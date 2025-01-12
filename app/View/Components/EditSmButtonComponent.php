<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EditSmButtonComponent extends Component
{
    public function __construct(
        public bool $disabled = false,
        public string $url = '',
    )
    {
    }

    public function render()
    {
        return view('components.edit-sm-button-component');
    }
}
