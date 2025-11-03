<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RegistryOfficial>
 */
class RegistryOfficialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'full_name' => $this->faker->name(),
            'designation' => $this->faker->jobTitle(),
            'dob' => $this->faker->date(),
            'qualification' => $this->faker->sentence(3),
            'phone_no' => $this->faker->numerify('##########'),
            'email' => $this->faker->unique()->safeEmail(),
            'photo' => null,
            'level' => $this->faker->randomElement([1, 2, 2, 3, 3, 3, 4, 4, 4, 4]),
        ];
    }
}
