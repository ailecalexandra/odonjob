<?php

namespace App\Http\Controllers\DetailFather\request;

use App\Interfaces\Helpers\Validator\ValidatorInterface;
use App\Models\DetailFather;
use App\Request\FormRequestApi;

class DetailFatherRequest extends FormRequestApi
{
    public function authorize()
    {
        return true;

    }


    public function rules(){
        return [
            DetailFather::NAME => $this->validateString(),
            DetailFather::PHONE_NUMBER => $this->validateString(),
            DetailFather::BUSINESS => $this->validateString(),
            DetailFather::OCCUPATION_ID => 'required|integer|min:1',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'el nombre es requerido',
            'name.string'=>'el nombre debe ser un string bobo >.<'
        ];
    }

}
