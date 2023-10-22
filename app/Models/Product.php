<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kode',
        'hargaJual',
        'quantity',

        'booking_id',
        'vendor_id'
    ];

    public function bookings(){
        return $this->belongsTo(Booking::class);
    }

    public function vendors(){
        return $this->belongsTo(Vendor::class);
    }
}
