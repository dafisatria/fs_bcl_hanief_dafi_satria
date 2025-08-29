<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Shipment;

class ShipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Shipment::create([
            'tanggal_pengiriman' => now(),
            'lokasi_asal' => 'Jakarta',
            'lokasi_tujuan' => 'Surabaya',
            'status' => 'dalam_perjalanan',
            'detail_barang' => 'Elektronik',
            'armada_id' => 1,
        ]);

        Shipment::create([
            'tanggal_pengiriman' => now(),
            'lokasi_asal' => 'Bandung',
            'lokasi_tujuan' => 'Malang',
            'status' => 'tertunda',
            'detail_barang' => 'Pakaian',
            'armada_id' => 2,
        ]);
    }
}
