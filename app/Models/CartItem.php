<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;
    protected $fillable = ['content_id', 'quantity', 'booking_date', 'ticket_type', 'price'];

    protected $casts = [
        'booking_date' => 'date',
    ];

    public function content()
    {
        return $this->belongsTo(Content::class, 'content_id', 'ID_KONTEN');
    }
}
