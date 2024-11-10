<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageTo extends Model
{
    protected $primaryKey = 'NO_RECORD';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'NO_RECORD', 'MESSAGE_ID', 'TO', 'CC', 'CREATE_BY', 'CREATE_DATE',
        'DELETE_MARK', 'UPDATE_BY', 'UPDATE_DATE'
    ];

    public function message()
    {
        return $this->belongsTo(Message::class, 'MESSAGE_ID', 'MESSAGE_ID');
    }

    public function recipient()
    {
        return $this->belongsTo(User::class, 'TO', 'ID_USER');
    }
}
