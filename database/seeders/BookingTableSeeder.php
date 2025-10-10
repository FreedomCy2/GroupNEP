<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Booking;

class BookingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bookings')->insert([
            'customer_name' => 'Edison',
            'customer_email' => 'edison@example.com',
            'customer_phone_number' => '828-4830',
            'customer_joined_date' => now(),
        ]);
    }
}