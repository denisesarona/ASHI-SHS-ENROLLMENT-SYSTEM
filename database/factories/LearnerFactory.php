<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Learner>
 */
class LearnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'school_year' => $this->faker->year(),
            'grade_level' => $this->faker->word(),
            'last_name' => $this->faker->lastName(),
            'first_name' => $this->faker->firstName(),
            'middle_name' => $this->faker->optional()->lastName(),
            'extension_name' => $this->faker->optional()->word(),
            'lrn' => $this->faker->phoneNumber(),
            'birthdate' => $this->faker->date(),
            'age' => $this->faker->numberBetween(5, 18),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'beneficiary' => $this->faker->optional()->name(),
            'street' => $this->faker->optional()->streetAddress(),
            'baranggay' => $this->faker->word(),
            'municipality' => $this->faker->word(),
            'province' => $this->faker->word(),
            'guardian_name' => $this->faker->name(),
            'guardian_contact' => $this->faker->phoneNumber(),
            'relationship_guardian' => $this->faker->word(),
            'last_sy' => $this->faker->year(),
            'last_school' => $this->faker->company(),
            'learner_category' => $this->faker->word(),
            'grade10_section' => $this->faker->word(),
            'image' => $this->faker->optional()->imageUrl(),
            'chosen_strand' => $this->faker->word(),
            'status' => $this->faker->randomElement(['Active', 'Inactive']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
