<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required | max:50',
            'password' => 'required | max:50',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email is required',
            'name.max:50' => 'Email name is too long',
            'password.required' => 'password is required',
            'password.max:50' => 'Password limit exceed.',
        ];
    }
}
