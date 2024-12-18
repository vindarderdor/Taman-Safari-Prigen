<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'ID_USER';
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ID_USER',
        'NAMA_USER',
        'email',
        'password',
        'USERNAME',
        'NO_HP',
        'WA',
        'PIN',
        'ID_JENIS_USER',
        'STATUS_USER',
        'DELETE_MARK',
        'CREATE_BY',
        'CREATE_DATE',
        'UPDATE_BY',
        'UPDATE_DATE',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'PASSWORD',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'CREATE_DATE' => 'datetime',
        'UPDATE_DATE' => 'datetime',
    ];

    /**
     * Relasi ke model JenisUser
     */
    public function jenisUser()
    {
        return $this->belongsTo(JenisUser::class, 'ID_JENIS_USER', 'ID_JENIS_USER');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'SENDER', 'ID_USER');
    }

    public function transactions()
    {
        return $this->hasMany(Transaksi::class, 'ID_USER', 'ID_USER');
    }
}
