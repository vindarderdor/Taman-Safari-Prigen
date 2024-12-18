<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTiket extends Model
{
    use HasFactory;


    protected $table = 'order_tikets';
    protected $primaryKey = 'ID_TIKET';
    
    protected $fillable = [
        'ID_USER',
        'ID_JADWAL',
        'JUMLAH',
        'TOTAL_HARGA',
        'payment_status',
        'snap_token'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'ID_USER');
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'ID_JADWAL');
    }

    public function content()
    {
        return $this->belongsTo(Content::class, 'ID_TIKET', 'ID_KONTEN');
    }
}
