<?php

namespace App\Http\Controllers\DentalHistory\request;

use App\Models\DentalHistory;
use App\Request\FormRequestApi;

class DentalHistoryRequest extends FormRequestApi
{
    public function authorize()
    {
        return true;
    }

    public function rules(){
        return [
            DentalHistory::DESCRIPTION => $this->validateString(),
        ];
    }



}
