<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // return [
        //     'name' => fake()->name(),
        //     'email' => fake()->unique()->safeEmail(),
        //     'email_verified_at' => now(),
        //     'password' => static::$password ??= Hash::make('password'),
        //     'remember_token' => Str::random(10),
        // ];
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'user_name' => $this->faker->optional()->userName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'),
            'email_verified_at' => $this->faker->optional()->dateTimeThisYear,
            'company_id' => Organization::factory(),
            'created_by' => null,
            'modified_by' => null,
            'is_account_expired' => $this->faker->boolean(10),
            'is_account_locked' => $this->faker->boolean(5),
            'is_active' => $this->faker->boolean(90),
            'is_credentials_expired' => $this->faker->boolean(5),
            'last_password_reset_date' => $this->faker->optional()->dateTimeThisYear,
            'mobile_number' => $this->faker->optional()->phoneNumber,
            'user_profile_photo' => $this->faker->optional()->imageUrl(200, 200, 'people'),
            'zone_id' => null,
            'visibility_group_id' => null,
            'userset_id' => null,
            'dob' => $this->faker->optional()->date('Y-m-d', '2003-01-01'),
            'security_question' => $this->faker->optional()->sentence,
            'security_answer' => $this->faker->optional()->word,
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
