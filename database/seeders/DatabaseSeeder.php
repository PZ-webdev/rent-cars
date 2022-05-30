<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1000)->create();
        Car::factory(30)->create();
        Transaction::factory(500)->create();
    }
}
