<?php

namespace App\Http\Controllers\Payment\repository;

use App\Http\Controllers\Payment\request\PaymentRequest;
use App\Http\Controllers\Payment\service\PaymentService;
use App\Http\Controllers\User\service\UserService;
use App\Models\Pay;
use App\Models\Type;
use App\Models\User;
use App\Repositories\Repository;
use App\Services\Service;

class PaymentRepository extends Repository implements Service,PaymentService
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->model = new Pay();
        $this->userService = $userService;
    }

    public function registerPay(PaymentRequest $request)
    {
        $user = $this->userService->findInstance($request->user_id);
        if(!empty($user) && !empty($user->userDetail)){
            $pay = new $this->model();
            $pay->amount= $request->amount;
            $pay->user_id = $user->id;
            $pay->description = $request->description;
            $pay->save();
            $pay->types()->attach($request->type_id);
            return $pay;

        }
        return 'Error al registrar el pago paciente invalido';
    }

    public function deletePay(User $user, Pay $pay)
    {

        // verificar si el pago es del usuario enviado
        if($pay->user_id === $user->id){
            $pay->user_id = null;
            $pay->dental_history_id = null;
            $types = $pay->types()->pluck('type_id')->toArray();
            $pay->types()->detach($types);
            $pay->delete();
            return $pay;
        }
        return 'Error al eliminar pago el usuario enviado no corresponde al pago';

    }
}
