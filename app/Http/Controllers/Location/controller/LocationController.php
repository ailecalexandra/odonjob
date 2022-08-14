<?php

namespace App\Http\Controllers\Location\controller;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Location\request\LocationRequest;
use App\Http\Controllers\Location\service\LocationService;
use App\Models\User;

class LocationController extends Controller
{
    public function __construct(LocationService $locationService)
    {
        $this->locationService = $locationService;
    }
    public function update(User $user, LocationRequest $request){
        $location = $this->locationService->locationInfoBasic($user, $request);

        return $this->responseWithData($location);

    }

}
