<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    use HasFactory;

    protected $fillable = [
        'kodeInvoice',
        'tanggalPembelian',

        'admin_id'
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }
}
