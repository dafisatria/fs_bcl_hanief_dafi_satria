<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Armada extends Model
{
    protected $fillable = ['nomor_armada', 'jenis_kendaraan', 'kapasitas', 'ketersediaan'];

    public function shipments()
    {
        return $this->hasMany(Shipment::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function checkins()
    {
        return $this->hasMany(Checkin::class);
    }
}
