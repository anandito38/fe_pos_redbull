<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kode',
        'hargaJual',
        'quantity',

        'booking_id',
        // 'vendor_id'
    ];

    protected $primaryKey = 'id';

    public function bookings(){
        return $this->belongsTo(Booking::class);
    }

    public function vendors()
    {
        return $this->belongsToMany(Vendor::class, 'MEMPRODUKSI', 'idProduct', 'idVendor');
    }

    public function bookedBy()
    {
        return $this->belongsToMany(Booking::class, 'MEMILIH', 'idProduct', 'idBook');
    }
}
