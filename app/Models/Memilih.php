<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memproduksi extends Model
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

}
