<?php

namespace App\Http\Controllers\DentalHistory\repository;

use App\Http\Controllers\DentalHistory\request\DentalHistoryRequest;
use App\Http\Controllers\DentalHistory\service\DentalHistoryService;
use App\Models\User;
use App\Http\Controllers\MedicalHistory\request\MedicalHistoryRequest;
use App\Models\DentalHistory;
use App\Repositories\Repository;
use App\Services\Service;

class DentalHistoryRepository extends Repository implements Service, DentalHistoryService
{
    public function __construct()
    {
        $this->model = new DentalHistory();
    }

    public function dentalHistoryInfoBasic(User $user, DentalHistoryRequest $request)
    {

        $dentalHistory = $user->userDetail->dentalHistory;
        $userDetail = $user->userDetail;
        if (empty($dentalHistory)){
            $dentalHistory = new $this->model();
            $dentalHistory->description = $request->description;
            $dentalHistory->user_id = $user->id;
            $dentalHistory->save();

        }else{
            $dentalHistory->description = $request->description;
            $dentalHistory->save();
        }

        return $dentalHistory;

    }

    public function getDentalHistory(int $id)
    {
        $dentalHistory = $this->findInstance($id);
        if (!empty($dentalHistory)){
            return $dentalHistory;
        }
        return 'error';
    }
}
