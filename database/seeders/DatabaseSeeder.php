<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Auth\database\seeders\AuthModuleSeeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // Modules
            AuthModuleSeeder::class,

            // App
            LogLevelSeeder::class,

            //
            AdminUserSeeder::class,
        ]);
    }
}
