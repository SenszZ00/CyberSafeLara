<?php

namespace Database\Factories;

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
        // User types
        $userTypes = ['Admin', 'IT', 'Student', 'Faculty', 'Staff'];

        // College/Department enum options
        $collegeDepartments = [
            'CARS', 'CAS', 'CBA', 'CDM', 'CED', 'CTET', 
            'CE', 'CT', 'CIC', 'CAE', 'SL',
            'OUR', 'OSAS', 'ADO', 'AO', 'HRMO', 'PO'
        ];

        return [
            'username' => fake()->unique()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'password' => static::$password ??= Hash::make('password'), // default password
            'user_type' => fake()->randomElement($userTypes),
            'college_department' => fake()->randomElement($collegeDepartments),
            'date_joined' => now(),
            'remember_token' => Str::random(10),
        ];
    }
}
