<?php

namespace App\Http\Controllers\Type\controller;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Type\service\TypeService;

class TypeController extends Controller
{
    protected $typeService;
   public function __construct(TypeService $typeService)
   {
       $this->typeService = $typeService;
   }
   public function index (){
       $typePays = $this->typeService->getAll();
       return $this->responseWithData($typePays);
   }
}
