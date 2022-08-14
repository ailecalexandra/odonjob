<?php

namespace App\Request;

use App\Interfaces\Helpers\Validator\ValidatorInterface;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class FormRequestApi extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['popup' => true, 'popupType' => 'danger', 'message' => $validator->errors()->all()], 400));
    }//end failedValidation()
    protected function validateString(){
        return [ValidatorInterface::REQUIRED, ValidatorInterface::CAMP_STRING];
    }
}
