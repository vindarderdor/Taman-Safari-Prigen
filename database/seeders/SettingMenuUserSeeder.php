<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SettingMenuUserSeeder extends Seeder
{
    public function run()
    {
        $menuAccess = [
            1 => [1, 2, 3], // Admin has access to Menu IDs 1, 2, 3
            2 => [2, 3],    // Editor has access to Menu IDs 2, 3
            3 => [3],       // Viewer has access to Menu ID 3
        ];

        foreach ($menuAccess as $roleId => $menuIds) {
            foreach ($menuIds as $menuId) {
                DB::table('SETTING_MENU_USER')->insert([
                    'ID_JENIS_USER' => $roleId,
                    'MENU_ID' => $menuId,
                    'CREATE_BY' => 'system',
                    'CREATE_DATE' => Carbon::now(),
                ]);
            }
        }
    }
}
