<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Organization>
 */
class OrganizationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'annual_revenue' => $this->faker->optional()->randomFloat(2, 100000, 10000000),
            'estd_date' => $this->faker->optional()->date(),
            'legal_structure' => $this->faker->optional()->randomElement(['LLC', 'Corporation', 'Partnership', 'Sole Proprietorship']),
            'type_of_business' => $this->faker->optional()->randomElement(['Retail', 'Service', 'Manufacturing', 'Consulting']),
            'occupation' => $this->faker->optional()->jobTitle,
            'employee_count' => $this->faker->optional()->numberBetween(1, 1000),
            'description' => $this->faker->optional()->paragraph,
        ];
    }
}
