<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'totalHargaPembayaran',
        'barcode',

        'admin_id',
        'booking_id'
    ];

    protected $primaryKey = 'id';

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function bookings(){
        return $this->belongsTo(Booking::class);
    }
}
