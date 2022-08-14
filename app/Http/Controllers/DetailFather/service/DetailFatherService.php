<?php

namespace App\Http\Controllers\DetailFather\service;

use App\Http\Controllers\DetailFather\request\DetailFatherRequest;
use App\Models\User;

interface DetailFatherService
{
    public function detailFatherInfoBasic(User $user, DetailFatherRequest $request);

}
