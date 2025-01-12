<?php

namespace Modules\Product\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'code' => ['required', 'integer',  Rule::unique('products','code')->ignore($this->product?->id)],
            'author_name' => ['nullable'],
            'made_at' => ['nullable', 'date'],
            'category_id' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
            'status' => ['required'],
            'lot_expire_at' => ['required', 'date'],
            'image' =>  'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'specifications' => ['nullable', 'array'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
