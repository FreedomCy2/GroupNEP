<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Booking;

class BookingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'patient' => 'Edison',
            'doctor' => 'Dr. Smith',
            'date' => now()->toDateString(), // Dynamically set today's date
            'time' => '10:00',
            'status' => 'confirmed',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // Validation rules
        $rules = [
            'patient' => 'required|string|max:255',
            'doctor' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'status' => 'required|in:confirmed,pending,cancelled',
        ];

        // Validate the data
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            // Output validation errors
            $this->command->error('Validation failed: ' . implode(', ', $validator->errors()->all()));
            return;
        }

        // Insert the validated data
        DB::table('bookings')->insert($data);

        $this->command->info('Booking seeded successfully!');
    }
}