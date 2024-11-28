<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            JenisUserSeeder::class,
            UserSeeder::class,
            JadwalSeeder::class,
            // ChildMenuSeeder::class,
            // ParentMenuSeeder::class,
            // SettingMenuUserSeeder::class,
        ]);
    }
}
