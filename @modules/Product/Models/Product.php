<?php

namespace Modules\Product\Models;

use App\Support\Enums\Status;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Category\Models\Category;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    const NAME = 'product';

    protected $fillable = [
        'name',
        'code',
        'author_name',
        'made_at',
        'category_id',
        'description',
        'price',
        'status',
        'lot_expire_at',
        'image',
    ];

    protected $casts = [
        'made_at' => 'datetime',
        'lot_expire_at' => 'datetime',
        'status' => Status::class
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function categorySpecifications(): HasMany
    {
        return $this->hasMany(ProductCategorySpecification::class, 'product_id')->with('specification');
    }

    public function scopeFilterParams(Builder $query, array $filterParams): Builder
    {
        if (isset($filterParams['name']) and !is_null($filterParams['name'])) {
            $query->where('name', 'like', "%{$filterParams['name']}%");
        }
        if (isset($filterParams['category_id']) and !is_null($filterParams['category_id'])) {
            $query->where('category_id', $filterParams['category_id']);
        }
        if (isset($filterParams['lot_expire_date']) and !is_null($filterParams['lot_expire_date'])) {
            $query->whereDate('lot_expire_at', $filterParams['lot_expire_date']);
        }
        if (isset($filterParams['price_from']) and !is_null($filterParams['price_from'])) {
            $query->where('price','>', $filterParams['price_from']);
        }
        if (isset($filterParams['price_to']) and !is_null($filterParams['price_to'])) {
            $query->where('price','<', $filterParams['price_to']);
        }
        if (isset($filterParams['specification']) and !is_null($filterParams['specification'])) {
            $query->whereHas('categorySpecifications', function ($query) use ($filterParams) {
                $query->where('value', 'like', "%{$filterParams['specification']}%");
            });
        }
        return $query;
    }

}
