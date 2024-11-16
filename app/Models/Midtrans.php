<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Midtrans extends Model
{
    use HasFactory;

    protected $table = 'midtrans';
    protected $primaryKey = 'ID_MIDTRANS';
    
    protected $fillable = [
        'ID_TIKET',
        'TRANSACTION_ID',
        'STATUS',
        'GROSS_AMOUNT',
        'PAYMENT_TYPE',
        'TRANSACTION_TIME',
        'TRANSACTION_STATUS',
        'FRAUD_STATUS'
    ];

    public function orderTiket()
    {
        return $this->belongsTo(OrderTiket::class, 'ID_TIKET');
    }
}
