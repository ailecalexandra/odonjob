<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCampsUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

            Schema::table('users', function (Blueprint $table){
                if(!Schema::hasColumn('users','lastname'))
                    $table->string('lastname')->comment('apellido del usuario')->nullable(false);
                if (!Schema::hasColumn('users','identity_card'))
                    $table->string('identity_card')->comment('cedula de identidad')->nullable(false);

            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table){
            if(Schema::hasColumn('users','lastname') || Schema::hasColumn('users','identity_card') )
                $table->dropColumn(['identity_card','lastname']);


        });
    }
}
