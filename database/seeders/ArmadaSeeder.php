<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Armada;

class ArmadaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Armada::create([
            'nomor_armada' => 'B 1234 XY',
            'jenis_kendaraan' => 'Truck',
            'kapasitas' => 5000,
            'ketersediaan' => true,
        ]);

        Armada::create([
            'nomor_armada' => 'L 5678 AB',
            'jenis_kendaraan' => 'Van',
            'kapasitas' => 2000,
            'ketersediaan' => true,
        ]);

        Armada::create([
            'nomor_armada' => 'N 9999 ZZ',
            'jenis_kendaraan' => 'Pickup',
            'kapasitas' => 1000,
            'ketersediaan' => false,
        ]);
    }
}
