<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\TypePay;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type_pays = [
            'COP',
            'BS',
            'USD'
        ];
        foreach ($type_pays as $type_pay){
            $type_pay_instance = new Type();
            $type_pay_instance->name = $type_pay;
            $type_pay_instance->save();
        }
    }
}
