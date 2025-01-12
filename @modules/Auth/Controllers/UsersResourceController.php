<?php

namespace Modules\Auth\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Category\Models\Category;

class UsersResourceController extends Controller
{
    public function index(Request $request): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        $query = User::query();
        if (!is_null($search = $request->input('search'))) {
            $query->where('name', 'ilike', "%{$search}%")
                ->orWhere('email', 'ilike', "%{$search}%");
        }
        $models = $query->paginate(10);
        return view('auth::pages.users.index', compact('models'));
    }

    public function create(): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        return view('auth::pages.users.create');
    }

    public function show(User $user): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        return view('auth::pages.users.show', compact('user'));
    }

    public function edit(User $user): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        return view('auth::pages.users.edit', compact('user'));
    }

    public function store(Request $request): RedirectResponse
    {
        return $this->tryCatchAction(function () use ($request) {
            $user = User::create([
                'email' => $request->input('email'),
                'name' => $request->input('name'),
                'email_verified_at' => now(),
                'remember_token' => \Str::random(),
                'password' => \Hash::make($request->input('password')),
            ]);
            return to_route('user.show', compact('user'));
        });
    }

    public function update(User $user, Request $request): RedirectResponse
    {
        return $this->tryCatchAction(function () use ($user, $request) {
            $password = $user->password;
            if (!is_null($request->input('password') and $request->input('change_password') == 'on')) {
                $password = \Hash::make($request->input('password'));
            }
            $user->update([
                'email' => $request->input('email'),
                'name' => $request->input('name'),
                'email_verified_at' => now(),
                'remember_token' => \Str::random(),
                'password' => $password,
            ]);
            return to_route('user.show', compact('user'));
        });
    }

    public function destroy(Category $category): RedirectResponse
    {
        return $this->tryCatchAction(function () use ($category) {
            $category->delete();
            return to_route($this->redirectIndexRoute());
        });
    }

    protected function redirectIndexRoute(): string
    {
        return "users.index";
    }
}
