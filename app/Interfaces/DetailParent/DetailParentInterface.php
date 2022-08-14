<?php

namespace App\Interfaces\DetailParent;

interface DetailParentInterface
{
    const NAME = 'name';
    const OCCUPATION_ID = 'occupation_id';
    const BUSINESS = 'business';
    const PHONE_NUMBER='phone_number';
    const FILLABLE =[
        self::NAME,
        self::OCCUPATION_ID,
        self::BUSINESS,
        self::PHONE_NUMBER
    ];
}
