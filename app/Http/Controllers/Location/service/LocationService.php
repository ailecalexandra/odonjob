<?php

namespace App\Http\Controllers\Location\service;

use App\Http\Controllers\Location\request\LocationRequest;
use App\Models\User;

interface LocationService
{
    public function locationInfoBasic(User $user, LocationRequest $request);

}
