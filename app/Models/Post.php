<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $primaryKey = 'POSTING_ID';
    
    protected $fillable = [
        'SENDER',
        'MESSAGE_TEXT',
        'CREATE_BY',
        'DELETE_MARK',
        'UPDATE_BY'
    ];

    protected $dates = [
        'CREATE_DATE',
        'UPDATE_DATE'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'SENDER');
    }
}
