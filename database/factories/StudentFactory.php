<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Unique;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'school_id' => 
                // fake()->numberBetween(2019, 2024) . '-00' . fake()->numberBetween(100, 999),
                fake()->unique()->safeEmail(),
            'name' => fake()->name(),
            'course_id' => Course::factory()->create(),
            'password' => Hash::make('admin123')
        ];
    }
}
