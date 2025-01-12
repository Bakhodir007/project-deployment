<?php

namespace Modules\Auth\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Component;

class AuthLoginFormComponent extends Component
{
    public string $name;
    public string $password;

    public string $password_type = 'password';

    protected $rules = [
        'name' => 'required|min:3',
        'password' => 'required|min:3',
    ];

    public function changePasswordType(): void
    {
        $this->password_type = ($this->password_type == 'password' ? 'text':  'password');
    }

    public function render(): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        return view('auth::livewire.auth');
    }
}
