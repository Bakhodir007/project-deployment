<?php

namespace Modules\Category\Models;

use App\Support\Enums\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    CONST NAME = 'category';

    protected $fillable = [
        'name',
        'status',
    ];

    protected $casts = [
        'status' => Status::class,
    ];

    protected $attributes = [
        'status' => Status::ACTIVE,
    ];

    public function specifications(): HasMany
    {
        return $this->hasMany(CategorySpecification::class, 'category_id');
    }

    public static function getMapped(string $name = 'name'): array
    {
        return self::pluck($name, 'id')->toArray();
    }
}
