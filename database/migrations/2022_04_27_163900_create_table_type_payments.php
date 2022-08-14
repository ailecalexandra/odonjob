<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTypePayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        //table de dental histories
        if (!Schema::hasTable('dental_histories')) {
            Schema::create('dental_histories', function (Blueprint $table) {
                $table->id();
                $table->text('description');
                $table->softDeletes('deleted_at');
                $table->unsignedBigInteger('user_id');
                $table->timestamps();
                $table->foreign('user_id')->references('id')->on('users');
            });
            //tabla de payments
            if (!Schema::hasTable('payments')) {
                Schema::create('payments', function (Blueprint $table) {
                    $table->id();
                    $table->string('amount')->nullable(false);
                    $table->unsignedBigInteger('user_id');
                    $table->unsignedBigInteger('dental_history_id')->nullable();
                    $table->timestamps();
                    $table->foreign('user_id')->references('id')->on('users');
                    $table->foreign('dental_history_id')->references('id')->on('dental_histories');
                });
            }
            //tabla de type payments
            if (!Schema::hasTable('type_payments')) {
                Schema::create('type_payments', function (Blueprint $table) {
                    $table->id();
                    $table->unsignedBigInteger('pay_id');
                    $table->unsignedBigInteger('type_id');
                    $table->timestamps();
                    $table->foreign('pay_id')->references('id')->on('payments');
                    $table->foreign('type_id')->references('id')->on('types');
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
