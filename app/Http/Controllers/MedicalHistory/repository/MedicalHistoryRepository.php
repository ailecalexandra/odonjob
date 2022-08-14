<?php

namespace App\Http\Controllers\MedicalHistory\repository;

use App\Http\Controllers\MedicalHistory\request\MedicalHistoryRequest;
use App\Http\Controllers\MedicalHistory\service\MedicalHistoryService;
use App\Models\MedicalHistory;
use App\Repositories\Repository;
use App\Services\Service;
use App\Models\User;

class MedicalHistoryRepository extends Repository implements Service, MedicalHistoryService
{
    public function __construct()
    {
        $this->model = new MedicalHistory();
    }

    public function getMedicalHistoryInfo(int $id)
    {
        $medicalHistory = $this->findInstance($id);
        if (!empty($medicalHistory)){
            return $medicalHistory;
        }
       return 'error';
    }

    public function medicalHistoryInfoBasic(User $user, MedicalHistoryRequest $request)
    {
        $medicalHistory = $user->userDetail->medicalHistory;
        $userDetail = $user->userDetail;
        if (empty($medicalHistory)){
            $medicalHistory = new $this->model();
            $medicalHistory->description = $request->description;
            $medicalHistory->user_id = user->id;
            $medicalHistory->save();
        }else{
            $medicalHistory->description = $request->description;
            $medicalHistory->save();
        }

        return $medicalHistory;
    }
}
