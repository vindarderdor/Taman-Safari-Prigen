<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'contents'; // Gunakan tabel `contents`
    protected $primaryKey = 'ID_KONTEN'; // Primary key
    public $timestamps = false; // Jika tabel tidak memiliki kolom `created_at` dan `updated_at`

    protected $fillable = [
        'TITLE',
        'DESCRIPTION',
        'HARGA',
        'IMAGE',
    ];
}