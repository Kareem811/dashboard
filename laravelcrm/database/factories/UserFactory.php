<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'national_id' => fake()->numberBetween(10000000000000, 99999999999999),
            'role' => fake()->randomElement(["instructor", 'student', 'operation', 'admin']),
            'tickets' => fake()->numberBetween(1, 2147483647),
            "date_of_birth" => fake()->dateTime(2024),
            'gender' => fake()->randomElement(['male', 'female']),
            'status' => fake()->randomElement(['student', 'full time', 'part time', 'graduate']),
            'address' => fake()->address(),
            'phone' => fake()->phoneNumber(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
