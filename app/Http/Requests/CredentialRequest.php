<?php

namespace App\Http\Requests;

use App\Request\FormRequestApi;
use Illuminate\Foundation\Http\FormRequest;

class CredentialRequest extends FormRequestApi
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|min:10',
            'password' => 'required|min:5',
        ];
    }
    public function messages()
    {
        return [
           'email.min' => 'El correo debe tener un minimo 0',
            'email.required' => 'Agregue el correo es obligatorio',
            'password.required' => 'La contrasena es obligatoria'
        ] ;
    }

}
