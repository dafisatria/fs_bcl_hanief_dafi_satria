<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Shipment extends Model
{
    protected $fillable = [
        'nomor_pengiriman',
        'tanggal_pengiriman',
        'lokasi_asal',
        'lokasi_tujuan',
        'status',
        'detail_barang',
        'armada_id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($shipment) {
            if (empty($shipment->nomor_pengiriman)) {
                $year = now()->year;
                $random = strtoupper(Str::random(4));
                $shortUuid = substr((string) Str::uuid(), 0, 6);

                $shipment->nomor_pengiriman = "BCL-{$year}-{$random}-{$shortUuid}";
            }
        });
    }

    public function armada()
    {
        return $this->belongsTo(Armada::class);
    }
}
