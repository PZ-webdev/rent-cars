<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archives', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');

            $table->unsignedBigInteger('id_car');
            $table->foreign('id_car')->references('id')->on('cars');

            $table->date('date_start');
            $table->date('date_end')->nullable();
            $table->integer('km_before');
            $table->integer('km_traveled')->nullable();
            $table->float('rental_amount');
            $table->float('refundable_deposit')->nullable();
            $table->float('amount_to_pay')->nullable();
            $table->boolean('rented')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('archives');
    }
};
