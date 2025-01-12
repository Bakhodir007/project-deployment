<?php

namespace Modules\Auth\Enums;

use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

trait AuthenticatesUsers
{
    use RedirectsUsers, ThrottlesLogins;

    abstract function redirectTo(): string;

    protected function attemptLogin(Request $request): bool
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->boolean('remember')
        );
    }

    protected function credentials(Request $request): array
    {
        return $request->only('name', 'password');
    }

    protected function sendLoginResponse(Request $request): JsonResponse|RedirectResponse
    {
        $request->session()->regenerate();
        $this->clearLoginAttempts($request);
        if ($request->wantsJson()) {
            return $this->authenticated($request, $this->guard()->user());
        }
        return redirect()->intended($this->redirectPath());
    }

    protected function authenticated(Request $request, $user): JsonResponse
    {
        return response()->json($user->toArray(), 200);
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    protected function username(): string
    {
        $login_field = request()->input('name');
        if (str($login_field)->contains('@'))
            return 'email';
        else
            return 'name';
    }

    protected function loggedOut(Request $request): JsonResponse
    {
        return response()->json([], 204);
    }

    protected function guard()
    {
        return Auth::guard();
    }

}
