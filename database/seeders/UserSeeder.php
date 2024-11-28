<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRoleId = DB::table('JENIS_USER')->where('JENIS_USER', 'Admin')->value('ID_JENIS_USER');
        $regularRoleId = DB::table('JENIS_USER')->where('JENIS_USER', 'Regular')->value('ID_JENIS_USER');

        DB::table('users')->insert([
            'NAMA_USER' => 'it',
            // 'USERNAME' => 'it',
            'email' => 'it@gmail.com',
            'password' => Hash::make('password'),
            'ID_JENIS_USER' => $adminRoleId,
            'STATUS_USER' => 'active',
            'CREATE_DATE' => now(),
            'DELETE_MARK' => '0',
        ]);

        DB::table('users')->insert([
            'NAMA_USER' => 'alim',
            // 'USERNAME' => 'alimm',
            'email' => 'alim@gmail.com',
            'password' => Hash::make('password'),
            'ID_JENIS_USER' => $regularRoleId,
            'STATUS_USER' => 'active',
            'CREATE_DATE' => now(),
            'DELETE_MARK' => '0',
        ]);
    }
}
