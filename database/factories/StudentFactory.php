<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $class = [
            'TME', 'KGSP', 'TFLM', 'TEDK', 'SIJA', 'KJIJ', 'TMPO', 'TTL'
        ];

        return [
            "name" => $this->faker->name(),
            "nis" => $this->faker->unique()->numerify("##########"),
            "class" => array_rand(['X', 'XI', 'XII']),
            "index" => $this->faker->numberBetween(1, 4),
            "major" => $this->faker->randomElement($class),
            "password" => $this->faker->password(6, 6),
        ];
    }
}
