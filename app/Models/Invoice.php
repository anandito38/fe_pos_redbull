<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'kodeInvoice',
        'tanggalPembelian',

        'admin_id'
    ];

    public function payments(){
        return $this->belongsTo(Payment::class);
    }
}
