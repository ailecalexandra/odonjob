<?php

namespace App\Http\Controllers\MedicalHistory\request;

use App\Interfaces\Helpers\Validator\ValidatorInterface;
use App\Models\MedicalHistory;
use App\Request\FormRequestApi;

class MedicalHistoryRequest extends FormRequestApi
{
    public function authorize()
    {
        return true;
    }

    public function rules(){
        return [
            MedicalHistory::DESCRIPTION => $this->validateString(),
            MedicalHistory::USER_ID => 'required|integer|min:1',

        ];
    }

    public function messages()
    {
        return [
            'description.required'=>'la descripcion debe ser necesaria',
            'description.string'=>'La description debe ser un string',
        ];
    }

}
