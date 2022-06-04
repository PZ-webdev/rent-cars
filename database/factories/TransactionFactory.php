<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
           'id_user' => User::all()->random()->id,
           'id_car' => Car::all()->random()->id,
           'date_start' =>  $this->faker->dateTimeInInterval('-1 week', 'now'),
           'date_end' => $this->faker->dateTimeInInterval('now', '+1 week'),
           'km_before' => rand(100000, 250000),
           'km_traveled' => rand(100, 1000),
           'rental_amount' => rand(100, 1000),
           'refundable_deposit' => rand(100, 1000),
           'amount_to_pay' => rand(500, 2000),
           'rented' => rand(1, 0),
        ];
    }
}
