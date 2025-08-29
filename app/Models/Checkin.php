<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkin extends Model
{
    protected $fillable = ['armada_id', 'latitude', 'longitude', 'checked_at'];

    public function armada()
    {
        return $this->belongsTo(Armada::class);
    }
}
