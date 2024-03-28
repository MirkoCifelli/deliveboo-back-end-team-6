<?php

namespace App\Http\Requests;

//support
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Http\FormRequest;

class StoreRestaurantRequest extends FormRequest
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
            'company_name' => 'required|max:128',
            'slug'=> 'nullable|max:128',
            'address' => 'required|max:128',
            'vat_number' => 'nullable|max:11',
            'img' => 'nullable|max:1024',
            'visible' => 'nullable|boolean',
            'delete_img' => 'nullable|boolean',
        ];
    }
    public function messages(): array
    {
        return [
            'company_name.required' => 'Inserisci un Titolo del tuo Ristorante',
            'address.required'=> "Inserisci l'indirizzo del tuo ristorante",
        ];
    }

}
