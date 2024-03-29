<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       
        return [
            "name" => $this->faker->company(),
            "description" => $this->faker->text(100),
            "industry_field" => $this->faker->word(),
            "contact_info" => $this->faker->phoneNumber(),
            'company_img' => $this->faker->imageUrl(100, 100, 'https://picsum.photos/'),
        ];
    }
}