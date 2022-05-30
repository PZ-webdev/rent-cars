<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ArchivesFactory extends Factory
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
           'date_start' =>  $this->faker->dateTimeInInterval('-3 week', '-2 week'),
           'date_end' => $this->faker->dateTimeInInterval('-1 week', 'now'),
           'refundable_deposit' => rand(100, 1000),
           'amount_to_pay' => rand(500, 2000),
        ];
    }
}
