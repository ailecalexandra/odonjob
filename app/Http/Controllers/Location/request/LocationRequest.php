<?php

namespace App\Http\Controllers\Location\request;

use App\Models\Location;
use App\Request\FormRequestApi;

class LocationRequest extends FormRequestApi
{
    public function authorize()
    {
        return true;
    }

    public function rules(){
        return [
            Location::NAME => $this->validateString()
        ];
    }

}
