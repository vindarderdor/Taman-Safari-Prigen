<?php

// app/Models/JenisUser.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisUser extends Model
{
    protected $table = 'JENIS_USER';
    protected $primaryKey = 'ID_JENIS_USER';

    protected $fillable = [
        'JENIS_USER',
        'CREATE_BY',
        'CREATE_DATE',
        'DELETE_MARK',
        'UPDATE_BY',
        'UPDATE_DATE',
    ];

    // Relasi ke tabel USER
    public function users()
    {
        return $this->hasMany(User::class, 'ID_JENIS_USER');
    }

    // Relasi ke tabel SETTING_MENU_USER (Menu yang diakses oleh role)
    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'SETTING_MENU_USER', 'ID_JENIS_USER', 'MENU_ID');
    }
}
