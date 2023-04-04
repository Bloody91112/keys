<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCommentRequest extends FormRequest
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
            'message' => 'string|required',
            'user_id' => 'integer|required|exists:users,id',
            'product_id' => 'integer|required|exists:products,id',
            'status_id' => 'integer|required|exists:comment_statuses,id',
        ];
    }
}
