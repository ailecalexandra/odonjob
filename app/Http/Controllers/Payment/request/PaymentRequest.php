<?php

namespace App\Http\Controllers\Payment\request;

use App\Interfaces\Helpers\Operator\OperatorInterface;
use App\Interfaces\Helpers\Validator\ValidatorInterface;
use App\Models\Pay;
use App\Request\FormRequestApi;

class PaymentRequest extends FormRequestApi
{
    public function authorize()
    {
        return true;

    }
    public function rules(){
        return [
           Pay::AMOUNT => [ValidatorInterface::REQUIRED,ValidatorInterface::NUMERIC_CAMP,ValidatorInterface::MIN_CAMP.OperatorInterface::ONE],
           Pay::USER_ID => [ValidatorInterface::REQUIRED,ValidatorInterface::INTEGER],
           Pay::DESCRIPTION => [ValidatorInterface::SOMETIMES,ValidatorInterface::CAMP_STRING],
            'type_id' => [ValidatorInterface::REQUIRED,ValidatorInterface::INTEGER]
        ];
    }
}
