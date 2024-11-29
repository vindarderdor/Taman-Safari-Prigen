<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $table = 'contents';
    protected $primaryKey = 'ID_CONTENT';
    
    protected $fillable = [
        'TITLE',
        'TITLE2',
        'DESCRIPSION',
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
}
