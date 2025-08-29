<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['armada_id', 'tanggal_pemesanan', 'customer_name', 'detail_barang'];

    public function armada()
    {
        return $this->belongsTo(Armada::class);
    }
}
