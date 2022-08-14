<?php

namespace App\Http\Controllers\Occupation\repository;

use App\Http\Controllers\Occupation\service\OccupationService;
use App\Models\Occupation;
use App\Repositories\Repository;
use App\Services\Service;

class OccupationRepository extends Repository implements Service,OccupationService
{
    public function __construct()
    {
        $this->model = new Occupation();
    }

    public function getAllOccupations()
    {
        return $this->model->all();
    }

}
