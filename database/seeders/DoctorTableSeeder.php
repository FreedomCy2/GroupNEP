<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Dr. John Doe',
                'specialization' => 'Cardiologist',
                'email' => 'johndoe@example.com',
                'phone' => '123-456-7890',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dr. Jane Smith',
                'specialization' => 'Dermatologist',
                'email' => 'janesmith@example.com',
                'phone' => '987-654-3210',
                'status' => 'off-duty',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'status' => 'required|in:active,off-duty,busy',
        ];

        foreach ($data as $doctor) {
            // Validate the data
            $validator = \Validator::make($doctor, $rules);

            if ($validator->fails()) {
                // Output validation errors
                $this->command->error('Validation failed: ' . implode(', ', $validator->errors()->all()));
                return;
            }
        }

        // Insert the validated data
        DB::table('doctors')->insert($data);

        $this->command->info('Doctors seeded successfully!');
    }
}
