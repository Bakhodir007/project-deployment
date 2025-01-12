<?php

namespace App\View\Components\Html;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class SelectComponent extends Component
{
    public function __construct(
        public string          $name,
        public string          $label,
        public Collection|null $collection = null,
        public string|null     $id = null,
        public string|null     $note = null,
        public string|null     $value = null,
        public bool|null       $required = true,
        public bool|null       $disabled = false,
        public string|null     $default = null,
    )
    {
        $collection ??= collect();
        if ($this->id === null) $this->id = $this->name;
    }


    public function render(): View|Closure|string
    {
        return view('components.html.select-component');
    }
}
