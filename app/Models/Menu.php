<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'MENU';
    protected $primaryKey = 'ID_MENU';
    public $timestamps = false;

    protected $fillable = [
        'ID_MENU',
        'MENU_NAME',
        'MENU_LINK',
        'MENU_ICON',
        'PARENT_ID',
        'CREATE_BY',
        'CREATE_DATE',
        'DELETE_MARK',
        'UPDATE_BY',
        'UPDATE_DATE',
    ];

    // Relasi ke tabel JENIS_USER melalui SETTING_MENU_USER (Role yang memiliki akses ke menu)
    public function roles()
    {
        return $this->belongsToMany(JenisUser::class, 'SETTING_MENU_USER', 'MENU_ID', 'ID_JENIS_USER');
    }

    // Relasi ke tabel PARENT (Menu parent jika ada)
    public function parent()
    {
        return $this->belongsTo(Menu::class, 'PARENT_ID');
    }

    // Relasi ke tabel MENU (Menu child jika ada)
    public function children()
    {
        return $this->hasMany(Menu::class, 'PARENT_ID');
    }
}
