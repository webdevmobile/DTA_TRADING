<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

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
            "country" => ['required'],
            "city" => ['required'],
            "statut" => ['required', Rule::in(['Actif', 'Inactif'])],
            // "role" => ['required', Rule::in(['Admin', 'Secretaire'])],
            // "training_id" => ['required', 'exists:trainings,id'],
            "session_id" => ['required', 'exists:sessions,id'],
            "trainings" => ['array', 'exists:trainings,id', 'required'],
        ];
    }
    public function messages() :array
    {
        return [
            'name.required' => 'Le nom est obligatoire.',
            'subname.required' => 'Le prenom est obligatoire.',
        ];
    }
}
