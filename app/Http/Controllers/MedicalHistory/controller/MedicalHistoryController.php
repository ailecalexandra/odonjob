<?php

namespace App\Http\Controllers\MedicalHistory\controller;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MedicalHistory\request\MedicalHistoryRequest;
use App\Http\Controllers\MedicalHistory\service\MedicalHistoryService;
use App\Models\User;
use Illuminate\Http\Request;


class MedicalHistoryController extends Controller
{
    public function __construct(MedicalHistoryService $medicalHistoryService)
    {
        $this->medicalHistoryService = $medicalHistoryService;
    }

    public function update(User $user, MedicalHistoryRequest $request){
        $medicalHistory = $this->medicalHistoryService->medicalHistoryInfoBasic($user, $request);

        return $this->responseWithData($medicalHistory);
    }

    public function medicalHistoryDetail(Request $request,$id)
    {
        $medicalHistory = $this->medicalHistoryService->getMedicalHistoryInfo($id);
        return $this->responseWithData($medicalHistory);
    }

}
