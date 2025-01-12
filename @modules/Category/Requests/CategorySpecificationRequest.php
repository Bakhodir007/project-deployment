<?php

namespace Modules\Category\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategorySpecificationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'category_id' => ['required'],
            'name' => ['required'],
            'status' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
