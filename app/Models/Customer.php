<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullName',
        'nickname',
        'phoneNumber',
        'address'
    ];

    public function bookings(){
        return $this->hasMany(Booking::class);
    }
}
