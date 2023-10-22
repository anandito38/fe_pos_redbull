<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'namaCategory'
    ];

    public function vendors(){
        return $this->hasMany(Vendor::class, 'category_id', 'id');
    }
}
