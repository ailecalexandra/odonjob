<?php

namespace App\Http\Controllers\Payment\controller;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Payment\request\PaymentRequest;
use App\Http\Controllers\Payment\service\PaymentService;
use App\Models\Pay;
use App\Models\Type;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class PaymentController extends Controller
{
    protected $paymentService;
   public function __construct(PaymentService $paymentService)
   {
       $this->paymentService = $paymentService;
   }
   public function registerPay(PaymentRequest $request){
       $pay= $this->paymentService->registerPay($request);
       if(is_string($pay)){
           return $this->sendErrorPopup([$pay],Response::HTTP_FORBIDDEN);
       }
       return $this->responseWithData($pay,Response::HTTP_CREATED);
   }
   public function deletePay(User $user, Pay $pay){
       $deletePay = $this->paymentService->deletePay($user,$pay);
       if(is_string($deletePay)){
           return $this->sendErrorPopup([$deletePay],Response::HTTP_FORBIDDEN);
       }
       return $this->responseWithData($deletePay);
   }
   public function getPays(User $user){
       $pays = $user->payments()->with(Type::TABLE_NAME)->get();
       return $this->responseWithData($pays);
   }
}
