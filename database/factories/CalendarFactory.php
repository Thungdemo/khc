<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Calendar>
 */
class CalendarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = fake()->dateTimeBetween('now', '+1 year');
        $endDate = fake()->boolean(30) ? fake()->dateTimeBetween($startDate, $startDate->format('Y-m-d') . ' +7 days') : null;

        return [
            'title' => fake()->randomElement([
                'Independence Day',
                'Republic Day',
                'Gandhi Jayanti',
                'Diwali',
                'Holi',
                'Eid',
                'Christmas',
                'Good Friday',
                'Dussehra',
                'Karva Chauth',
                'Bhai Dooj',
                'Janmashtami'
            ]),
            'start_date' => $startDate->format('Y-m-d'),
            'end_date' => $endDate?->format('Y-m-d'),
            'type' => fake()->randomElement(['national', 'restricted']),
        ];
    }
}
