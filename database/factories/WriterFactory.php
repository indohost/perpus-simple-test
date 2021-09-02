<?php

namespace Database\Factories;

use App\Models\Writer;
use Illuminate\Database\Eloquent\Factories\Factory;

class WriterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Writer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'w_name'     => $this->faker->name(),
            'w_address'  => $this->faker->address(),
            'w_telpn'    => $this->faker->phoneNumber(),
        ];
    }
}
