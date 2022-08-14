<?php

namespace App\Http\Controllers\DetailMother\repository;

use App\Http\Controllers\DetailMother\request\DetailMotherRequest;
use App\Http\Controllers\DetailMother\service\DetailMotherService;
use App\Models\DetailMother;
use App\Models\User;
use App\Repositories\Repository;
use App\Services\Service;

class DetailMotherRepository extends Repository implements Service, DetailMotherService
{
    public function __construct()
    {
        $this->model = new DetailMother();
    }

    public function updateDetailMother(User $user, DetailMotherRequest $request)
    {
       $detailMother = null;
       $userDetail = $user->userDetail;
       if(empty($detailMother)){
           $detailMother  = new $this->model;
           $detailMother->name = $request->name;
           $detailMother->phone_number = $request->phone_number;
           $detailMother->business = $request->business;
           $detailMother->occupation_id = $request->occupation_id;
           $detailMother->save();
           $userDetail->detail_mother_id = $detailMother->id;
           $userDetail->save();


       }else{
           $detailMother->name = $request->name;
           $detailMother->phone_number = $request->phone_number;
           $detailMother->business = $request->business;
           $detailMother->occupation_id = $request->occupation_id;
           $detailMother->save();

       }
       return $detailMother;
    }

}
