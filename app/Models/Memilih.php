<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memilih extends Model
{
    use HasFactory;

    protected $table = 'memilihs';
    public $timestamps = false;

    protected $primaryKey = ['idProduct', 'idBook'];
    public $incrementing = false;

    protected $fillable = [
        'idProduct',
        'idBook'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'idBook', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'idProduct', 'id');
    }

}
