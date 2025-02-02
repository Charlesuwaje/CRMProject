<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\Phone;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContactPhone>
 */
class ContactPhoneFactory extends Factory
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
            'phone_id' => Phone::factory(),
            'contact_phone_type' => $this->faker->randomElement(['Home', 'Work', 'Mobile']),
            'is_primary_phone' => $this->faker->boolean,
        ];
    }
}
