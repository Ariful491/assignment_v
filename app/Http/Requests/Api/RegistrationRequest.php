<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;
use phpDocumentor\Reflection\Types\Boolean;
use Illuminate\Validation\Rules;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
     public function rules(): array
   {
        return [

            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|min:11|max:11|regex:/^([0-9\s\-\+\(\)]*)$/',
            'password' => 'required', 'confirmed', Rules\Password::defaults(),
        ];
    }
    public function messages(): array
   {
        return [
            'username.required' => 'User Name is required.',
        ];
    }
}
