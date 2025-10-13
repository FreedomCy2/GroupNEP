<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'phone_number' => '123-4567',
            'joined_date' => now()->toDateString(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clinic_users,email',
            'phone_number' => 'nullable|string|max:20',
            'joined_date' => 'nullable|date',
        ]);

        // Validate the data
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            // Output validation errors
            $this->command->error('Validation failed: ' . implode(', ', $validator->errors()->all()));
            return;
        }

        // Insert the validated data
        DB::table('clinic_users')->insert($data);

        $this->command->info('User seeded successfully!');
    }
}
