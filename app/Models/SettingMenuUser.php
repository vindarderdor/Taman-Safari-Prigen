<?php

// app/Models/SettingMenuUser.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingMenuUser extends Model
{
    protected $table = 'SETTING_MENU_USER';
    protected $primaryKey = 'NO_SETTING';
    public $timestamps = false;

    protected $fillable = [
        'NO_SETTING',
        'ID_JENIS_USER',
        'MENU_ID',
        'CREATE_BY',
        'CREATE_DATE',
        'DELETE_MARK',
        'UPDATE_BY',
        'UPDATE_DATE',
    ];

    // Relasi ke tabel JENIS_USER (Role yang terkait dengan pengaturan menu ini)
    public function role()
    {
        return $this->belongsTo(JenisUser::class, 'ID_JENIS_USER');
    }

    // Relasi ke tabel MENU (Menu yang terkait dengan pengaturan menu ini)
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'MENU_ID');
    }
}
