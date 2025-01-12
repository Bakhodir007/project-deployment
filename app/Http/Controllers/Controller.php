<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    abstract protected function redirectIndexRoute(): string;

    protected function tryCatchAction(callable $callback, ?string $redirectRoute = null)
    {
        $routeName = $redirectRoute ?? $this->redirectIndexRoute();
        try {
            return $callback();
        } catch (\Throwable $e) {
            if (app()->environment('local')) {
                dd($e);
            }
            return to_route($routeName);
        }
    }
}
