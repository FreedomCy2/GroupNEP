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
            'patient_name' => 'Bear',
            'symptoms' => 'Hallucination, Dizziness',
            'reminder_date' => now()->toDateString(), // Dynamically set today's date
            'reminder_time' => '12:00',
            'status' => 'pending',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // Validation rules
        $rules = [
            'patient_name' => 'required|string|max:255',
            'symptoms' => 'required|string|max:255',
            'reminder_date' => 'required|date',
            'reminder_time' => 'required|date_format:H:i',
        ];

        // Validate the data
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            // Output validation errors
            $this->command->error('Validation failed: ' . implode(', ', $validator->errors()->all()));
            return;
        }

        // Insert the validated data
        DB::table('reminder')->insert($data);

        $this->command->info('Reminder seeded successfully!');
    }
}
