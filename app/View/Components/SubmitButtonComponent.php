<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SubmitButtonComponent extends Component
{
    public function __construct(
        public bool $disabled = false,
    )
    {
    }

    public function render()
    {
        return view('components.submit-button-component');
    }
}
