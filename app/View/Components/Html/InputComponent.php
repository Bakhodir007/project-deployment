<?php

namespace App\View\Components\Html;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputComponent extends Component
{
    public function __construct(
        public string      $name,
        public string      $label,
        public string|null $pattern = null,
        public string|null $id = null,
        public string|null $note = null,
        public string|null $value = null,
        public bool|null   $required = true,
        public string|null $type = 'text',
        public bool|null   $disabled = false,
        public string|null $classes = null,
        public string|null $errorName = null,
    )
    {
        if ($this->id === null) $this->id = $this->name;
    }


    public function render(): View|Closure|string
    {
        return view('components.html.input-component');
    }
}
