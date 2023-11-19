<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memproduksi extends Model
{
    use HasFactory;

    protected $table = 'memproduksis';
    public $timestamps = false;

    protected $fillable = [
        'idProduct',
        'idVendor'
    ];

}
