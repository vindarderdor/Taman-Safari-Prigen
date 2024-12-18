<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'content_id',
        'user_id',
        'quantity',
        'booking_date',
        'ticket_type',
        'price',
        'transaksi_id'
    ];

    protected $casts = [
        'booking_date' => 'date'
    ];

    public function content()
    {
        return $this->belongsTo(Content::class, 'content_id', 'ID_KONTEN');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id', 'id');
    }
}
