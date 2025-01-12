<?php

namespace App\View\Components;

use App\Support\Enums\Status;
use Illuminate\View\Component;

class StatusComponent extends Component
{
    public function __construct(
        public Status $status
    )
    {
    }

    public function render()
    {
        return view('components.status-component');
    }
}
