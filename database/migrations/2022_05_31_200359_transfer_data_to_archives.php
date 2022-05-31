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
        $procedure = "DROP PROCEDURE IF EXISTS transfer_data_to_archives;
        CREATE PROCEDURE transfer_data_to_archives()
        LANGUAGE SQL
        AS $$
         INSERT INTO archives (id_user, id_car, date_start, date_end, refundable_deposit, amount_to_pay)
            SELECT id_user, id_car, date_start, date_end, refundable_deposit, amount_to_pay FROM transactions WHERE date_end < current_date - 14;
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
