<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Author::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'a_name'     => $this->faker->name(),
            'a_address'  => $this->faker->address(),
            'a_telpn'    => $this->faker->phoneNumber(),
        ];
    }
}
