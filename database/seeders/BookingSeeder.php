<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Booking;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Booking::create([
            'armada_id' => 1,
            'tanggal_pemesanan' => now(),
            'customer_name' => 'Hanief',
            'detail_barang' => 'Meja kantor',
        ]);

        Booking::create([
            'armada_id' => 2,
            'tanggal_pemesanan' => now()->addDay(),
            'customer_name' => 'Dafi',
            'detail_barang' => 'Kursi gaming',
        ]);
    }
}
