<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StorePersonalRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "name" => ['required'],
            "subname" => ['required'],
            "email" => ['required', 'email', 'unique:users,email'],
            "password" => ['required', 'min:4'],
            "phone" => ['required'],
            "city" => ['required'],
            "role" => ['required', Rule::in(['Admin', 'Secretaire'])]
        ];
    }
}
