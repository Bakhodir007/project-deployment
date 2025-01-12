<?php

namespace Modules\Product\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategorySpecificationRequest extends FormRequest
{
    public function rules()
    {
        return [
            'product_id' => ['required', 'exists:products'],
            'category_specification_id' => ['required', 'exists:category_specifications'],
            'value' => ['required'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
