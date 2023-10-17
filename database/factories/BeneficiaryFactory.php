<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Beneficiary;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Beneficiary>
 */
class BeneficiaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'birth_date' => null,
            'identity_number' => $this->faker->unique()->randomNumber(8),
            'qualifications' => $this->faker->randomElement(['High School Diploma', 'Bachelor\'s Degree', 'Master\'s Degree']),
            'job_status' => $this->faker->randomElement(['idle', 'emplyee']),
            'job_title' => $this->faker->jobTitle,
            'job_salary' => $this->faker->randomFloat(2, 20000, 80000),
            'marital_status' => $this->faker->randomElement(['married', 'divorced', 'single']),
            'marital_state_date' => null,
            'address' => $this->faker->address,
            'illness_status' => $this->faker->randomElement(['safe', 'endemic']),
            'illness_type_id' => $this->faker->numberBetween(1, 3), // Replace with actual IDs
            'building_id' => 1, // Replace with actual IDs
            'apartment' => null, // Replace with actual IDs
            'relative_id' => null, // Main beneficiary has no relative
        ];
    }
}
