<?php

namespace App\Http\Controllers\DetailMother\controller;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DetailMother\request\DetailMotherRequest;
use App\Http\Controllers\DetailMother\service\DetailMotherService;
use App\Models\User;

class DetailMotherController extends Controller
{

    protected $detailMotherService;
    public function __construct(DetailMotherService $detailMotherService)
    {
        $this->detailMotherService = $detailMotherService;
    }

    public function update(User $user,DetailMotherRequest $request){

        $detailMother = $this->detailMotherService->updateDetailMother($user,$request);
        return $this->responseWithData($detailMother);

   }

}
