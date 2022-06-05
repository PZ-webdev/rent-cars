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
        $function = "CREATE OR REPLACE FUNCTION check_car_is_available(
            id		INT,
            date_start   DATE
         ) RETURNS BOOLEAN LANGUAGE plpgsql SECURITY DEFINER AS $$
         
         BEGIN
         perform * from transactions 
         where id_car = check_car_is_available.id 
         and date_end >= check_car_is_available.date_start; 
            if not found then
              return true;
           else
              return false;
           end if;
            
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
