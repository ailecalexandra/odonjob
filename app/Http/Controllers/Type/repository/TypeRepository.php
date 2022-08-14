<?php

namespace App\Http\Controllers\Type\repository;

use App\Http\Controllers\Type\service\TypeService;
use App\Models\Type;
use App\Models\TypePay;
use App\Repositories\Repository;
use App\Services\Service;

class TypeRepository extends Repository implements Service,TypeService
{
    public function __construct()
    {
        $this->model = new Type();
    }

}
