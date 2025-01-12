<?php

namespace Modules\Category\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Category\Models\CategorySpecification;
use Modules\Category\Requests\CategorySpecificationRequest;

class CategorySpecificationResourceController extends Controller
{
    public function index(Request $request): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        $query = CategorySpecification::query()->with('category');
        if (!is_null($search = $request->input('search'))) {
            $query->where('name', 'ilike', "%{$search}%");
        }
        $models = $query->paginate();
        return view('category::pages.category-specification.index', compact('models'));
    }

    public function create(): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        return view('category::pages.category-specification.create');
    }

    public function show(CategorySpecification $categorySpecification): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        return view('category::pages.category-specification.show', compact('categorySpecification'));
    }

    public function edit(CategorySpecification $categorySpecification): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        return view('category::pages.category-specification.edit', compact('categorySpecification'));
    }

    public function store(CategorySpecificationRequest $request): RedirectResponse
    {
        return $this->tryCatchAction(function () use ($request) {
            $categorySpecification = CategorySpecification::create($request->validated());
            return to_route('category-specification.show', $categorySpecification);
        });
    }

    public function update(CategorySpecification $categorySpecification, CategorySpecificationRequest $request): RedirectResponse
    {
        return $this->tryCatchAction(function () use ($categorySpecification, $request) {
            $categorySpecification->update($request->validated());
            return to_route('category-specification.show', $categorySpecification);
        });
    }

    public function destroy(CategorySpecification $categorySpecification): RedirectResponse
    {
        return $this->tryCatchAction(function () use ($categorySpecification) {
            $categorySpecification->delete();
            return to_route($this->redirectIndexRoute());
        });
    }

    protected function redirectIndexRoute(): string
    {
        return "category-specification.index";
    }
}
