<?php

namespace App\Http\Controllers\DetailMother\service;

use App\Http\Controllers\DetailMother\request\DetailMotherRequest;
use App\Models\User;

interface DetailMotherService
{
    public function updateDetailMother(User $user, DetailMotherRequest $request);

}
