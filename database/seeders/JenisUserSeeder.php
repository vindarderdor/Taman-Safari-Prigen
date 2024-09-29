<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert two types of users: Admin and Regular User

        DB::table('JENIS_USER')->insert([
            [
                'JENIS_USER' => 'Admin',
                'CREATE_BY' => 'system',
                'CREATE_DATE' => now(),
                'DELETE_MARK' => '0',
            ],
            [
                'JENIS_USER' => 'Regular',
                'CREATE_BY' => 'system',
                'CREATE_DATE' => now(),
                'DELETE_MARK' => '0',
            ],
        ]);
    }
}
