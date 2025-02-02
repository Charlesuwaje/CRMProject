<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\Email;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContactEmail>
 */
class ContactEmailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'contact_id' => Contact::factory(),
            'email_id' => Email::factory(),
            'contact_email_type' => $this->faker->randomElement(['Personal', 'Work']),
            'is_primary_email' => $this->faker->boolean,
        ];
    }
}
