<?php

namespace App\Http\Controllers\DentalHistory\controller;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DentalHistory\request\DentalHistoryRequest;
use App\Http\Controllers\DentalHistory\service\DentalHistoryService;
use App\Models\User;
use Illuminate\Http\Request;

class DentalHistoryController extends Controller
{
    public function __construct(DentalHistoryService $dentalHistoryService)
    {
        $this->dentalHistoryService = $dentalHistoryService;
    }

    public function update(User $user, DentalHistoryRequest $request){
        $dentalHistory = $this->dentalHistoryService->dentalHistoryInfoBasic($user, $request);
        return $this->responseWithData($dentalHistory);
    }
    public function dentalHistoryDetail(Request $request,$id)
    {
        $dentalHsitory = $this->dentalHistoryService->getDentalHistory($id);

        return $this->responseWithData($dentalHsitory);
    }

}
