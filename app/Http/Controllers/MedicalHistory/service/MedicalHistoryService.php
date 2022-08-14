<?php

namespace App\Http\Controllers\MedicalHistory\service;

use App\Http\Controllers\MedicalHistory\request\MedicalHistoryRequest;
use App\Models\User;

interface MedicalHistoryService
{
    public function medicalHistoryInfoBasic(User $user, MedicalHistoryRequest $request);

    public function getMedicalHistoryInfo(int $id);

}
