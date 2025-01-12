<?php

namespace Modules\Lot\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Modules\Product\Models\Product;

class LotController extends Controller
{
    public function index(Request $request): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $query = Product::query()->with(['category', 'categorySpecifications']);
        if ($request->has('filter')) {
            $query->filterParams((array) $request->get('filter'));
        }
        $models = $query->paginate(8);
        return view('lot::pages.index', compact('models'));
    }

    public function show(Product $lot): View|\Illuminate\Foundation\Application
    {
        return view('lot::pages.show', compact('lot'));
    }

    protected function redirectIndexRoute(): string
    {
        return "lot.index";
    }
}
