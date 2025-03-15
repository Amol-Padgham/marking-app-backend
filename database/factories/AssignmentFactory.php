<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Assignment;
use App\Models\Staff;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Assignment>
 */
class AssignmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Assignment::class;

    public function definition()
    {
        return [
            'Title' => $this->faker->sentence(5),
            'Description' => $this->faker->paragraph(),
            'TotalPoints' => $this->faker->numberBetween(50, 100),
            'DueDate' => $this->faker->dateTimeBetween('+1 week', '+1 month'),
            'CreatedBy' => Staff::inRandomOrder()->first()?->StaffID ?? 1, // Assign to a random staff member
        ];
    }
}
