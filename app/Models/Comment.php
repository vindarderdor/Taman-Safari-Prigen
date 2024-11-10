<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $primaryKey = 'KOMEN_ID';
    public $timestamps = false;

    protected $fillable = [
        'POSTING_ID',
        'USER_ID',
        'KOMENTAR_TEXT',
        'KOMENTAR_GAMBAR',
        'CREATE_BY',
        'CREATE_DATE',
        'DELETE_MARK',
        'UPDATE_BY',
        'UPDATE_DATE',
    ];

    protected $casts = [
        'CREATE_DATE' => 'datetime',
        'UPDATE_DATE' => 'datetime',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'POSTING_ID', 'POSTING_ID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'USER_ID', 'ID_USER');
    }
}
