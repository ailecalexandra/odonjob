<?php

namespace App\Http\Controllers\DetailFather\controller;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DetailFather\request\DetailFatherRequest;
use App\Http\Controllers\DetailFather\service\DetailFatherService;
use App\Models\User;

class DetailFatherController extends Controller
{
    public function __construct(DetailFatherService $detailFatherService)
    {
        $this->detailFatherService = $detailFatherService;
    }

    public function update(User $user, DetailFatherRequest $request){
        $detailFather = $this->detailFatherService->detailFatherInfoBasic($user, $request);

        return $this->responseWithData($detailFather);
    }

}
