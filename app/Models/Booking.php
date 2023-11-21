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

        'customer_id'
    ];

    protected $primaryKey = 'id';

    public function customers(){
        return $this->belongsTo(Customer::class);
    }

    public function payments(){
        return $this->hasMany(Payment::class, 'booking_id', 'id');
    }

    public function selectedProducts()
    {
        return $this->belongsToMany(Product::class, 'memilihs', 'idBook', 'idProduct');
    }
}
