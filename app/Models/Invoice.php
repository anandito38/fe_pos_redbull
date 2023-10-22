<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'nickname',
        'password',
        'phoneNumber',
        'address',
        'role'
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }
}
