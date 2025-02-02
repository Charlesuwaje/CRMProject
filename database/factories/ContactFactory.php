<?php

namespace Database\Factories;

use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'source' => $this->faker->word(),
            'occupation' => $this->faker->jobTitle(),
            'dob' => $this->faker->date(),
            'gender' => $this->faker->randomElement(['Male', 'Female','Other']),
            'description' => $this->faker->sentence(),
            'organization_id' => Organization::factory(),
        ];
    }
}
