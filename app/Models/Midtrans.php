<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Midtrans extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_tiket_id',
        'transaction_id',
        'status',
        'gross_amount',
        'payment_type',
        'transaction_time',
        'transaction_status',
        'fraud_status'
    ];

    public function orderTiket()
    {
        return $this->belongsTo(OrderTiket::class);
    }
}
