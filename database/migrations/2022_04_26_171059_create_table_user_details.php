<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUserDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //migracion de ocupation
        if (!Schema::hasTable('occupations')){
            Schema::create('occupations', function (Blueprint $table) {
               $table->id();
               $table->string('name')->comment('nombre de la ocupacion');

               $table->timestamps();
            });
        }

        //migracion de Detalle Padre
        if (!Schema::hasTable('detail_mothers')){
            Schema::create('detail_mothers', function (Blueprint $table) {
                $table->id();
                $table->string('name')->comment('nombre de la madre');
                $table->unsignedBigInteger('occupation_id')->nullable();
                $table->string('business');

                $table->timestamps();

                $table->foreign('occupation_id')->references('id')->on('occupations');
            });
        }

        //migracion de Detalle del Padre
        if (!Schema::hasTable('detail_fathers')){
            Schema::create('detail_fathers', function (Blueprint $table) {
                $table->id();
                $table->string('name')->comment('nombre del padre');
                $table->unsignedBigInteger('occupation_id')->nullable();
                $table->string('business');

                $table->timestamps();

                $table->foreign('occupation_id')->references('id')->on('occupations');
            });
        }

        //migracion de Sector
        if (!Schema::hasTable('sectors')){
            Schema::create('sectors', function (Blueprint $table) {
                $table->id();
                $table->string('name')->comment('nombre del sector');

                $table->timestamps();
            });
        }

        //migracion de recado
        if (!Schema::hasTable('referreds')){
            Schema::create('referreds', function (Blueprint $table) {
               $table->id();
               $table->string('name')->comment('nombre del referido');
               $table->string('email')->unique()->nullable(false);
               $table->string('number');

               $table->timestamps();
            });
        }

        //migracion de ubicacion-ciudad
        if (!Schema::hasTable('locations')){
            Schema::create('locations', function (Blueprint $table) {
               $table->id();
               $table->string('name')->comment('nombre de la ubicacion');

               $table->timestamps();
            });
        }


        if (!Schema::hasTable('user_details')) {
            Schema::create('user_details', function (Blueprint $table) {
                $table->id();
                $table->date('born_date');
                $table->unsignedBigInteger('location_id');
                $table->unsignedBigInteger("sector_id");
                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('referred_id');
                $table->unsignedBigInteger('detail_mother_id');
                $table->unsignedBigInteger('detail_father_id');


                $table->timestamps();

                $table->foreign('location_id')->references('id')->on('locations');
                $table->foreign('sector_id')->references('id')->on('sectors');
                $table->foreign('user_id')->references('id')->on('users');
                $table->foreign('referred_id')->references('id')->on('referreds');
                $table->foreign('detail_mother_id')->references('id')->on('detail_mothers');
                $table->foreign('detail_father_id')->references('id')->on('detail_fathers');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_details');
    }
}
