<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "DROP PROCEDURE IF EXISTS update_car_mileage;
        CREATE PROCEDURE update_car_mileage()
        LANGUAGE SQL
        AS $$
		UPDATE cars
		SET car_mileage = c.car_mileage + t.km_traveled 
		from cars c inner join transactions t
		on c.id = t.id
         $$;
        ";
  
        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
