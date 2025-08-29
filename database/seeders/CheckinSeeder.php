<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Checkin;

class CheckinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Checkin::create([
            'armada_id' => 1,
            'latitude' => -6.200000,
            'longitude' => 106.816666,
            'checked_at' => now(),
        ]);

        Checkin::create([
            'armada_id' => 2,
            'latitude' => -7.250445,
            'longitude' => 112.768845,
            'checked_at' => now(),
        ]);
    }
}
