<?php

namespace Modules\Product\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Product\Models\Product;
use Modules\Product\Requests\ProductRequest;

class ProductResourceController extends Controller
{
    public function index(Request $request): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        $query = Product::query()->with('category');
        if (!is_null($search = $request->input('search'))) {
            $query->where('name', 'like', "%$search%");
        }
        $models = $query->paginate();
        return view('product::pages.index', compact('models'));
    }

    public function create(): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        return view('product::pages.create');
    }

    public function show(Product $product): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        return view('product::pages.show', compact('product'));
    }

    public function edit(Product $product): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        return view('product::pages.edit', compact('product'));
    }

    public function store(ProductRequest $request): RedirectResponse
    {
        return $this->tryCatchAction(function () use ($request) {
            $path = $request->file('file')->store('images', 'public');

            if (!is_null($path)) {
                $path = 'storage/' . $path;
            }

            $product = Product::create([
                'category_id' => $request->input('category_id'),
                'name' => $request->input('name'),
                'status' => $request->input('status'),
                'code' => $request->input('code'),
                'author_name' => $request->input('author_name'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'made_at' => $request->input('made_at'),
                'lot_expire_at' => $request->input('lot_expire_at'),
                'image' => $path
            ]);

            if (!empty($specs = $request->input('specifications'))) {
                foreach ($specs as $id => $value) {
                    $product->categorySpecifications()->create([
                        'category_specification_id' => $id,
                        'value' => $value,
                    ]);
                }
            }

            return to_route('product.show', $product);
        });
    }

    public function update(Product $product, ProductRequest $request): RedirectResponse
    {
        return $this->tryCatchAction(function () use ($product, $request) {
            if ($request->hasFile('file')) {
                $path = $request->file('file')->store('images', 'public');

                if (!is_null($path)) {
                    $path = 'storage/' . $path;
                }
            }

            $product->update([
                'category_id' => $request->input('category_id'),
                'name' => $request->input('name'),
                'status' => $request->input('status'),
                'code' => $request->input('code'),
                'author_name' => $request->input('author_name'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'made_at' => $request->input('made_at'),
                'lot_expire_at' => $request->input('lot_expire_at'),
                'image' => $path ?? $product->image
            ]);

            if (!empty($specs = $request->input('specifications'))) {
                $product->categorySpecifications()->delete();
                foreach ($specs as $id => $value) {
                    $product->categorySpecifications()->create([
                        'category_specification_id' => $id,
                        'value' => $value,
                    ]);
                }
            }

            return to_route('product.show', $product);
        });
    }

    public function destroy(Product $product): RedirectResponse
    {
        return $this->tryCatchAction(function () use ($product) {
            $product->delete();
            return to_route($this->redirectIndexRoute());
        });
    }

    protected function redirectIndexRoute(): string
    {
        return "product.index";
    }
}
