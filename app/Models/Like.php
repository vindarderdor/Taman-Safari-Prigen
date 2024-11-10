<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $primaryKey = 'LIKE_ID';
    public $timestamps = false;

    protected $fillable = [
        'POSTING_ID',
        'USER_ID',
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
