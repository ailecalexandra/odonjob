<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnPhoneNumberInDetailMother extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_mothers', function (Blueprint $table) {
            if(!Schema::hasColumn('detail_mothers','phone_number')){
                $table->string('phone_number')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_mothers', function (Blueprint $table) {
            if(Schema::hasColumn('detail_mothers','phone_number')){
                $table->dropColumn('phone_number')->nullable();
            }
        });
    }
}
