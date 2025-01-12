<?php

namespace Modules\Category\Models;

use App\Support\Enums\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategorySpecification extends Model
{
    use SoftDeletes;

    CONST NAME = 'category-specification';

    protected $fillable = [
        'category_id',
        'name',
        'status',
    ];

    protected $casts = [
        'status' => Status::class,
    ];

    protected $attributes = [
        'status' => Status::ACTIVE,
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
