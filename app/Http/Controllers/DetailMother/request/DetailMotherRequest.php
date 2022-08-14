<?php

namespace App\Http\Controllers\DetailMother\request;

use App\Interfaces\Helpers\Operator\OperatorInterface;
use App\Interfaces\Helpers\Validator\ValidatorInterface;
use App\Models\DetailMother;
use App\Models\Occupation;
use App\Request\FormRequestApi;

class DetailMotherRequest extends FormRequestApi
{
    public function authorize()
    {
        return true;

    }//end authorize()
    private function validateString(){
        return  [ValidatorInterface::REQUIRED, ValidatorInterface::CAMP_STRING];
    }
    public function rules(){
        $table = Occupation::TABLE_NAME;
        return [
            DetailMother::NAME => $this->validateString(),
            DetailMother::PHONE_NUMBER =>$this->validateString(),
            DetailMother::BUSINESS => $this->validateString(),
            DetailMother::OCCUPATION_ID => [
                ValidatorInterface::REQUIRED,
                ValidatorInterface::INTEGER,
                ValidatorInterface::MIN_CAMP.OperatorInterface::ONE
            ]




        ];
    }
    public function messages()
    {
        return [
            'name.required'=> 'name es requerido',
            'name.string'=> 'name debe ser un string'
        ];
    }
}
