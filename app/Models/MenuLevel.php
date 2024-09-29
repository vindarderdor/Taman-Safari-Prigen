<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuLevel extends Model
{
    protected $table = 'MENU_LEVEL';
    protected $primaryKey = 'ID_LEVEL';
    public $timestamps = false;

    protected $fillable = [
        'ID_LEVEL',
        'LEVEL',
        'CREATE_BY',
        'CREATE_DATE',
        'DELETE_MARK',
        'UPDATE_BY',
        'UPDATE_DATE',
    ];
}
