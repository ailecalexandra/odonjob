<?php

namespace App\Interfaces\Payment;

interface PaymentInterface
{
    const TABLE_NAME = 'payments';
    const AMOUNT = 'amount';
    const DESCRIPTION = 'description';
    const USER_ID = 'user_id';
    const DENTAL_HISTORY_ID = 'dental_history_id';

}
