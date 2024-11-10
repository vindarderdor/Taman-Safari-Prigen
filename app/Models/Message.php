<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $primaryKey = 'MESSAGE_ID';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'MESSAGE_ID', 'SENDER', 'MESSAGE_REFERENCE', 'SUBJECT', 'MESSAGE_TEXT',
        'MESSAGE_STATUS', 'NO_MK', 'CREATE_BY', 'CREATE_DATE', 'DELETE_MARK',
        'UPDATE_BY', 'UPDATE_DATE'
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'SENDER', 'ID_USER');
    }

    public function recipients()
    {
        return $this->hasMany(MessageTo::class, 'MESSAGE_ID', 'MESSAGE_ID');
    }
}
