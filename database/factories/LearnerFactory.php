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
            'school_year' => $this->faker->randomElement(['2024-2025']),
            'grade_level' => $this->faker->randomElement(['Grade 11']),
            'last_name' => $this->faker->lastName(),
            'first_name' => $this->faker->firstName(),
            'middle_name' => $this->faker->optional()->lastName(),
            'extension_name' => $this->faker->optional()->suffix(),
            'lrn' => $this->faker->unique()->numerify('###########'),
            'birthdate' => $this->faker->date(),
            'age' => $this->faker->numberBetween(12, 18),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'beneficiary' => $this->faker->randomElement(['Yes', 'No']),
            'street' => $this->faker->optional()->streetAddress(),
            'baranggay' => $this->faker->word(),
            'municipality' => $this->faker->city(),
            'province' => $this->faker->state(),
            'guardian_name' => $this->faker->name(),
            'guardian_contact' => $this->faker->phoneNumber(),
            'relationship_guardian' => $this->faker->randomElement(['Mother', 'Father', 'Guardian']),
            'last_sy' => $this->faker->year(),
            'last_school' => $this->faker->company(),
            'learner_category' => $this->faker->randomElement(['5']),
            'grade10_section' => $this->faker->bothify('Section-?#'),
            'image' => $this->faker->optional()->imageUrl(640, 480, 'people'),
            'chosen_strand' => $this->faker->randomElement(['10', '11', '12']),
            'status' => $this->faker->randomElement(['pending']),
            'section_id' => null, // Optional for unassigned learners
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
