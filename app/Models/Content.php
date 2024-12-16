<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $table = 'contents';
    protected $primaryKey = 'ID_KONTEN';
    
    protected $fillable = [
        'TITLE',
        'TITLE2',
        'DESCRIPSION',
        'HARGA_ADULT',
        'HARGA_CHILD',
        'IMAGE'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function orderTikets()
    {
        return $this->hasMany(OrderTiket::class, 'ID_TIKET', 'ID_KONTEN');
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class, 'content_id', 'ID_KONTEN');
    }
    public function PurchasedTicket()
    {
        return $this->hasMany(PurchasedTicket::class);
    }

}
