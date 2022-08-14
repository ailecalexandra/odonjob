<?php

namespace App\Http\Controllers\Payment\service;

use App\Http\Controllers\Payment\request\PaymentRequest;
use App\Models\Pay;
use App\Models\User;

interface PaymentService
{
    public function registerPay(PaymentRequest $request);
    public function deletePay(User $user,Pay $pay);

}
