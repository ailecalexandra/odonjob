<?php

namespace App\Http\Controllers\DetailFather\repository;

use App\Http\Controllers\DetailFather\request\DetailFatherRequest;
use App\Http\Controllers\DetailFather\service\DetailFatherService;
use App\Models\DetailFather;
use App\Models\User;
use App\Repositories\Repository;
use App\Services\Service;

class DetailFatherRepository extends Repository implements Service, DetailFatherService
{
    public function __construct()
    {
        $this->model = new DetailFather();
    }

    public function detailFatherInfoBasic(User $user, DetailFatherRequest $request)
    {
        $detailFather = $user->userDetail->detailFather;
        $userDetail = $user->userDetail;
        if (empty($detailFather)){
            $detailFather = new $this->model();
            $detailFather->name = $request->name;
            $detailFather->business = $request->business;
            $detailFather->occupation_id = $request->ocupation_id;
            $detailFather->phone_number = $request->phone_number;
            $detailFather->save();
            $userDetail->detail_father_id = $detailFather->id;
            $userDetail->save();

        }else{
            $detailFather->name = $request->name;
            $detailFather->business = $request->business;
            $detailFather->occupation_id = $request->ocupation_id;
            $detailFather->phone_number = $request->phone_number;
            $detailFather->save();
        }

        return $detailFather;
    }
}
