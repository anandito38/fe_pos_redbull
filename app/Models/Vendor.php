<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'namaBarang',
        'merek',
        'quantity',
        'hargaModal',

        // 'category_id'
    ];

    protected $primaryKey = 'id';

    public function categories(){
        return $this->belongsTo(Category::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'memproduksis', 'idVendor', 'idProduct');
    }

}
