<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PerjalananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $input = array("Bandung", "Jakarta", "Yogyakarta", "Surabaya", "Solo", "Makassar", "New York", "California");
        $rand_keys = array_rand($input);

        return [
            'id_user' => 1,
            'tanggal' => $this->faker->date(),
            'jam' => $this->faker->time(),
            'lokasi' => $input[$rand_keys],
            'suhu' => $this->faker->numberBetween(28, 40)
        ];
    }
}
