<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
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
            'email' => ['required', 'email', 'max:255'],
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'birthday' => 'nullable|date',
            'gender' => 'nullable',
            'avatar' => 'nullable|image',
            'role_id' => 'nullable|exists:roles,id'
        ];
    }
}
