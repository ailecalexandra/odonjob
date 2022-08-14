<?php

namespace App\Http\Controllers\Sector\service;

use App\Http\Controllers\Sector\request\SectorRequest;
use App\Models\User;

interface SectorService
{
   public function getAllSectors();

   public function SectorInfoBasic(User $user, SectorRequest $request);
}
