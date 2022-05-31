<?php

namespace Database\Factories;

use App\Models\CarColor;
use Illuminate\Database\Eloquent\Factories\Factory;

use Faker\Generator as Faker;
use Faker\Provider\Fakecar;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        $this->faker->addProvider(new \Faker\Provider\Fakecar($this->faker));
        $v = $this->faker->vehicleArray();

        return [
            'mark' => $v['brand'],
            'model' => $v['model'],
            'registration_number' => $this->faker->vehicleRegistration(),
            'year_production' => rand(2000, 2022),
            'rent_price' => round(rand(100, 1000),0),
            'id_car_colors'=> CarColor::all()->random()->id,
            'car_mileage'=> rand(100000, 250000),
            'equipment'=> null,
        ];
    }
}


