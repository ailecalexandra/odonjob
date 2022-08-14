<?php

namespace App\Http\Controllers\Sector\controller;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Sector\request\SectorRequest;
use App\Http\Controllers\Sector\service\SectorService;
use App\Models\User;

class SectorController extends Controller
{
    protected $sectorService;

    public function __construct(SectorService $sectorService)
    {
        $this->sectorService = $sectorService;
    }
    public function index(){
        $sectors = $this->sectorService->getAllSectors();
        return $this->responseWithData($sectors);

    }

    public function update( SectorRequest $request){
        $sector = $this->sectorService->SectorInfoBasic($user, $request);

        return $this->responseWithData($sector);
    }


}
