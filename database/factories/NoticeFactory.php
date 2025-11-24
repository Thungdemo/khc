<?php

namespace Database\Factories;

use App\Models\NoticeCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notice>
 */
class NoticeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $noticeCategory = NoticeCategory::inRandomOrder()->first();
        return [
            'title' => fake()->words(rand(15,30), true),
            'notice_category_id' => $noticeCategory->id,
            'notice_subcategory_id' => $noticeCategory->children()->inRandomOrder()->value('id'),
            'published_at' => fake()->dateTimeBetween('-1 year', 'now'),
            'filename' => 'dummy/notice.pdf',
        ];
    }

    public function withUrl(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'url' => fake()->url(),
                'filename' => null,
            ];
        });
    }
}
