<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTradeRequest extends FormRequest
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
            "symbol" => ['required'],
            "type" => ['required'],
            "entry_point" => ['required', 'numeric'],
            "exit_sl" => ['required', 'numeric'],
            "exit_tp" => ['required', 'numeric'],
            "raison_ent" => ['required'],
            "raison_exit" => ['required'],
            "result" => ['required'],
            "montant" => ['required', 'numeric'],
            "lot_size" => ['required', 'numeric'],
            "image" => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048']
        ];
    }
    // public function messages() :array
    // {
    //     return [
    //         'name.required' => 'Le nom est obligatoire.',
    //         'subname.required' => 'Le prenom est obligatoire.',
    //     ];
    // }
}
