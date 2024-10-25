<?php

namespace Modules\Auth\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Auth\modules\Authorization\database\seeders\AuthorizationModuleSeeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AuthModuleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AuthorizationModuleSeeder::class,
        ]);
    }
}
