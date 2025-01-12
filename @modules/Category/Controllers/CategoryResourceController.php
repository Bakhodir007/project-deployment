<?php

namespace Modules\Category\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Category\Models\Category;
use Modules\Category\Requests\CategoryRequest;

class CategoryResourceController extends Controller
{
    public function index(Request $request): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        $query = Category::query();
        if (!is_null($search = $request->input('search'))) {
            $query->where('name', 'ilike', "%{$search}%");
        }
        $models = $query->paginate();
        return view('category::pages.category.index', compact('models'));
    }

    public function create(): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        return view('category::pages.category.create');
    }

    public function show(Category $category): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        return view('category::pages.category.show', compact('category'));
    }

    public function edit(Category $category): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        return view('category::pages.category.edit', compact('category'));
    }

    public function store(CategoryRequest $request): RedirectResponse
    {
        return $this->tryCatchAction(function () use ($request) {
            $category = Category::create($request->validated());
            return to_route('category.show', compact('category'));
        });
    }

    public function update(Category $category, CategoryRequest $request): RedirectResponse
    {
        return $this->tryCatchAction(function () use ($category, $request) {
            $category->update($request->validated());
            return to_route('category.show', compact('category'));
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
        return "category.index";
    }
}
