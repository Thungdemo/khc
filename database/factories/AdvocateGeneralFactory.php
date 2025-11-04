<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdvocateGeneral>
 */
class AdvocateGeneralFactory extends Factory
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
            'doj' => $this->faker->date(),
            'served_till' => $this->faker->date(),
            'ag_category_id' => \App\Models\AgCategory::inRandomOrder()->first()->id,
        ];
    }
}
