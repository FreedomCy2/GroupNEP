<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ReminderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'patient_name' => 'John Doe',
                'symptoms' => 'Headache, Fever',
                'date' => now()->toDateString(),
                'time' => '14:00',
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'patient_name' => 'Jane Smith',
                'symptoms' => 'Cough, Sore Throat',
                'date' => now()->toDateString(),
                'time' => '16:00',
                'status' => 'done',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Validation rules
        $rules = [
            'patient_name' => 'required|string|max:255',
            'symptoms' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i', // Corrected validation rule
            'status' => 'required|in:pending,done',
        ];

        foreach ($data as $reminder) {
            // Validate the data
            $validator = Validator::make($reminder, $rules);

            if ($validator->fails()) {
                // Output validation errors
                $this->command->error('Validation failed: ' . implode(', ', $validator->errors()->all()));
                return;
            }
        }

        // Insert the validated data
        DB::table('reminders')->insert($data);

        $this->command->info('Reminders seeded successfully!');
    }
}
