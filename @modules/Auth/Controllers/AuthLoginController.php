<?php

namespace Modules\Auth\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application as ContractFoundationApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Modules\Auth\Enums\AuthenticatesUsers;
use Symfony\Component\HttpFoundation\Response;

class AuthLoginController extends Controller
{
    use AuthenticatesUsers;

    public function show(): View|Application|Factory|ContractFoundationApplication
    {
        return view('auth::pages.login');
    }

    public function login(Request $request): JsonResponse|RedirectResponse|Response
    {
        if (
            method_exists($this, 'hasTooManyLoginAttempts')
            &&
            $this->hasTooManyLoginAttempts($request)
        ) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }

    public function logout(Request $request): Application|JsonResponse|Redirector|ContractFoundationApplication|RedirectResponse {
        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        if ($request->wantsJson()) {
            return $this->loggedOut($request);
        }
        return redirect()->route('login');
    }


    protected function redirectTo(): string
    {
        return "/admin/lot";
    }

    protected function redirectIndexRoute(): string
    {
        return "/";
    }
}
