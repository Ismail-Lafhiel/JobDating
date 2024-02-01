<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Announcement>
 */
class AnnouncementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title"=>$this->faker->word(),
            "description"=>$this->faker->text(100),
            "announcement_img"=>$this->faker->image(null, 600, 600, null, true, 1024),
            "company_id"=>$this->faker->numberBetween(1, 10)
        ];
    }
}
