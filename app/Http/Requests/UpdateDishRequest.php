<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// Support
use Illuminate\Support\Facades\Auth;

class UpdateDishRequest extends FormRequest
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
            'slug'=> 'nullable|max:120',
            'img' => 'nullable|max:1024',
            'description' => 'required|max:4024', // CONTROLLA SE FUNZIONA SENNO MODIFICA DISH TABLE 
            'price' => 'required|numeric|min:0',
            'visible' => 'nullable|boolean',
            'delete_img' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Inserisci il nome del tuo piatto',
            'description.required' => 'Inserisce la descrizione del tuo piatto',
            'price.required' => 'Inserisci il prezzo del tuo piatto',
            'price.min' => 'Inserisci un prezzo valido al tuo piatto',
            'delete_img.boolean' => 'Inserisci valore valido'
        ];
    }
}
