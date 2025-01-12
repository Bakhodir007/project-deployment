<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Category\Models\CategorySpecification;

class ProductCategorySpecification extends Model
{
    use SoftDeletes;

    const NAME = 'product-category-specification';

    protected $fillable = [
        'product_id',
        'category_specification_id',
        'value',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function specification(): BelongsTo
    {
        return $this->belongsTo(CategorySpecification::class, 'category_specification_id');
    }
}
