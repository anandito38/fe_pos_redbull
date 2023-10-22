<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

    protected $fillable = [
        'totalHargaPembayaran',
        'barcode',

        'admin_id'
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function bookings(){
        return $this->hasMany(Booking::class, 'payment_id', 'id');
    }
}
