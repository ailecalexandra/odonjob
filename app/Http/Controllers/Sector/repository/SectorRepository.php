<?php

namespace App\Http\Controllers\Sector\repository;

use App\Http\Controllers\Sector\request\SectorRequest;
use App\Http\Controllers\Sector\service\SectorService;
use App\Models\Sector;
use App\Models\User;
use App\Repositories\Repository;
use App\Services\Service;

class SectorRepository extends Repository implements Service, SectorService
{
    public function __construct()
    {
        $this->model = new Sector();
    }

    public function getAllSectors()
    {
        return $this->model->all();
    }

    public function SectorInfoBasic(User $user, SectorRequest $request)
    {
        $sector = $user->userDetail->sector;
        if (empty($sector)){
            $sector = new $this->model();
            $sector->name = $request->name;
            $sector->save();
        }else{
            $sector->name = $request->name;
            $sector->save();
        }
        return $sector;
    }
}
