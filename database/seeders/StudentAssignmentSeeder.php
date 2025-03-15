<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Student;
use App\Models\Assignment;
use App\Models\StudentAssignment;

class StudentAssignmentSeeder extends Seeder
{
    public function run()
    {
        // Fetch students and assignments
        $students = Student::all();
        $assignments = Assignment::all();

        if ($students->isEmpty() || $assignments->isEmpty()) {
            $this->command->info('No students or assignments found. Skipping StudentAssignmentSeeder.');
            return;
        }

        foreach ($students as $student) {
            // Assign random assignments to each student
            $randomAssignments = $assignments->random(rand(1, 3));

            foreach ($randomAssignments as $assignment) {
                StudentAssignment::create([
                    'StudentAssignmentID' => Str::uuid(),
                    'StudentID' => $student->StudentID,
                    'AssignmentID' => $assignment->AssignmentID,
                    'SubmissionDate' => now()->subDays(rand(0, 10)), // Random past date
                    'Status' => ['Pending', 'Submitted', 'Graded'][array_rand(['Pending', 'Submitted', 'Graded'])],
                ]);
            }
        }

        $this->command->info('Dummy student assignments created successfully.');
    }
}
