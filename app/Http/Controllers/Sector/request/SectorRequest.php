<?php

namespace App\Http\Controllers\Sector\request;

use App\Models\Sector;
use App\Request\FormRequestApi;

class SectorRequest extends FormRequestApi
{
    public function authorize()
    {
        return true;
    }

    public function rules(){
        return [
            Sector::NAME => $this->validateString()
        ];
    }

}
