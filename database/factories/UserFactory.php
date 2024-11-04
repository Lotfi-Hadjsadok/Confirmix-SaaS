<?php

namespace Database\Factories;

use App\Enums\UserRole;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password = "admin";

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
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'role' => fake()->randomElement(array_column(UserRole::cases(), 'value')),
            'remember_token' => Str::random(10),
        ];
    }

    public function employee()
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 'employee',
            ];
        });
    }

    public function employer()
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 'employer',
            ];
        });
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
