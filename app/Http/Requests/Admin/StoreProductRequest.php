<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array <string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'string|required',
            'description' => 'string|required',
            'discount' => 'integer|nullable',
            'version' => 'integer|nullable',
            'images' => 'nullable|array',
            'requirements' => 'string|nullable',
            'preview' => 'image|required',
            'tags' => 'array|nullable',
            'category_id' => 'integer|nullable',
            'version_id' => 'integer|nullable',
            'status_id' => 'integer|required'
        ];
    }
}
