<?php

namespace Database\Factories;
use App\Models\Student;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    // public function definition(): array
    // {
    //     return [
    //         //
    //     ];
    // }
    protected $model = Student::class;

    public function definition()
    {
        return [
            // 'StudentID' => Str::uuid(), // Generates a unique string ID
            'StudentNumber' => $this->faker->unique()->randomNumber(6),
            'FirstName' => $this->faker->firstName,
            'LastName' => $this->faker->lastName,
            'Email' => $this->faker->unique()->safeEmail,
        ];
    }
}
