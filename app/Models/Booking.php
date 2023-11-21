<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'kode',
        'totalHarga',

        'customer_id',
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
