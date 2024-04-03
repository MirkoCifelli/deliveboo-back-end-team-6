<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// Support
use Illuminate\Support\Facades\Auth;

class StoreDishRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:120',
            'slug'=> 'max:120',
            'img' => 'nullable|image',
            'description' => 'required|max:4024',
            'price' => 'required|numeric|min:0',
            'visible' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Inserisci il nome del tuo piatto',
            'description.required' => 'Inserisci la descrizione del tuo piatto',
            'price.required' => 'Inserisci il prezzo del tuo piatto',
            'price.min' => 'Inserisci un prezzo valido al tuo piatto',
        ];
    }
}
