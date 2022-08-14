<?php

namespace App\Http\Controllers\Location\repository;

use App\Http\Controllers\Location\request\LocationRequest;
use App\Http\Controllers\Location\service\LocationService;
use App\Models\Location;
use App\Models\User;
use App\Repositories\Repository;
use App\Services\Service;

class LocationRepository extends Repository implements Service, LocationService
{
    public function __construct()
    {
        $this->model = new Location();
    }

    public function locationInfoBasic(User $user, LocationRequest $request)
    {
        $location = $user->userDetail->location;
        $userDetail = $user->userDetail;
        if (empty($location)){
            $location = new $this->model();
            $location->name = $request->name;
            $location->save();
        }else{
            $location->name = $request->name;
            $location->save();
        }
        return $location;
    }
}
