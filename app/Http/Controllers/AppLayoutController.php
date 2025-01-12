<?php

namespace App\Http\Controllers;

class AppLayoutController extends Controller
{
    public function __invoke(string $skin)
    {

        if (in_array($skin, ['dark', 'light'])) {
            session()->put('layout-skin', $skin);
        }else{
            session()->put('layout-skin', 'light');
        }
        return back();
    }

    protected function redirectIndexRoute(): string
    {
        return '/';
    }
}
