<?php

use Illuminate\Database\Migrations\Migration;
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
        $function = "CREATE OR REPLACE FUNCTION update_car(
            id		  INT,
            mileage   INT
        ) RETURNS BOOLEAN LANGUAGE plpgsql SECURITY DEFINER AS $$
        
        BEGIN
            UPDATE cars
               SET car_mileage  = cars.car_mileage + update_car.mileage,
                   updated_at   = NOW()
             WHERE cars.id = update_car.id;
            RETURN FOUND;
        END;
        $$;
        ";
  
        DB::unprepared($function);
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
