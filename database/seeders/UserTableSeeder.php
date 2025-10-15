<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\ClinicUser;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'name' => 'Dr Smith',
            'email' => 'dr.smith@example.com',
            'phone_number' => '456-7890',
            'joined_date' => '2025-10-13', // Use ISO date format (YYYY-MM-DD)
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // Validation rules for the users table
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:255',
            'joined_date' => 'required|date',
        ];

        // Validate the data
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            // Output validation errors
            $this->command->error('Validation failed: ' . implode(', ', $validator->errors()->all()));
            return;
        }

        // Insert the validated data into the clinic_users table
        ClinicUser::create($data);

        $this->command->info('User seeded successfully!');
    }
}
