<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwals';
    protected $primaryKey = 'ID_JADWAL';
    
    protected $fillable = [
        'TANGGAL',
        'JAM_BUKA',
        'JAM_TUTUP',
        'IS_OPEN'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
