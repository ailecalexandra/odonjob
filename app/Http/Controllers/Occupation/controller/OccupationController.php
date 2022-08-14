<?php

namespace App\Http\Controllers\Occupation\controller;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Occupation\service\OccupationService;

class OccupationController extends Controller
{
    protected $occupationService;

    public function __construct(OccupationService $occupationService)
    {
        $this->occupationService = $occupationService;
    }
    public function index(){
        $occupations = $this->occupationService->getAllOccupations();
        return $this->responseWithData($occupations);
    }

}
