<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kode',
        'hargaJual',
        'quantity',
        'external_id'
    ];

    protected $primaryKey = 'id';

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->external_id = Str::uuid();
        });
    }

    public function bookings(){
        return $this->belongsTo(Booking::class);
    }

    public function vendors()
    {
        return $this->belongsToMany(Vendor::class, 'memproduksis', 'idProduct', 'idVendor');
    }

    public function bookedBy()
    {
        return $this->belongsToMany(Booking::class, 'memilihs', 'idProduct', 'idBook');
    }
}
