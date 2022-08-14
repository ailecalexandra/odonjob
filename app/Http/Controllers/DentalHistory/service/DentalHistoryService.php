<?php

namespace App\Http\Controllers\DentalHistory\service;

use App\Http\Controllers\DentalHistory\request\DentalHistoryRequest;
use App\Models\User;

interface DentalHistoryService
{
    public function dentalHistoryInfoBasic(User $user, DentalHistoryRequest $request);

    public function getDentalHistory(int $id);


}
