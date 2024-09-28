<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class EdiptCartAddressReuqtes extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom' => 'required',
            'prenom' => 'required',
            'ville' => 'required',
            'address' => 'required',
            'zipcode' => 'required',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => true,
            'message' => 'Erreur de validatiind e données',
            'message' => $validator->errors()
        ]));
    }
    public function messages()
    {
        return [
            'nom.required' => 'Le nom est  obligatoire',
            'prenom.required' => 'Le prenom est  obligatoire',
            'ville.required' => 'La ville est  obligatoire',
            'address.required' => 'L adresse est  obligatoire',
            'zipcode.required' => 'Le code postal est  obligatoire',
        ];
    }
}
