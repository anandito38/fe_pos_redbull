<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'kode',
        'totalHarga',

        'customer_id',
        'payment_id'
    ];

    public function customers(){
        return $this->belongsTo(Customer::class);
    }

    public function payments(){
        return $this->belongsTo(Payment::class);
    }

    public function products(){
        return $this->hasMany(Product::class, 'booking_id', 'id');
    }
}
