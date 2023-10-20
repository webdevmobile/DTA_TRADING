<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            "phone" => ['required'],
            "country" => ['required'],
            "city" => ['required'],
            "statut" => ['required', Rule::in(['Actif', 'Inactif'])],
            // "training_id" => ['required', 'exists:trainings,id'],
            "session_id" => ['required', 'exists:sessions,id'],
            "trainings" => ['array', 'exists:trainings,id', 'required'],
            // "sessions" => ['array', 'exists:sessions,id', 'required'],
        ];
    }
}
