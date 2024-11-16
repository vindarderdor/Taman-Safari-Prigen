<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $table = 'contents';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'place',
        'title',
        'title2',
        'description',
        'image'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
