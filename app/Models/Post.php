<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $primaryKey = 'POSTING_ID';
    public $timestamps = false;

    protected $fillable = [
        'SENDER',
        'MESSAGE_TEXT',
        'MESSAGE_GAMBAR',
        'CREATE_BY',
        'DELETE_MARK',
        'UPDATE_BY',
    ];

    protected $casts = [
        'CREATE_DATE' => 'datetime',
        'UPDATE_DATE' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'SENDER', 'ID_USER');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'POSTING_ID', 'POSTING_ID');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'POSTING_ID', 'POSTING_ID');
    }
}
