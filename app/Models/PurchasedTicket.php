<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasedTicket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'content_id',
        'transaction_id',
        'ticket_type',
        'quantity',
        'price',
        'booking_date',
        'ticket_number',
    ];

    protected $casts = [
        'booking_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function content()
    {
        return $this->belongsTo(Content::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
