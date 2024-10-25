<?php

namespace Modules\Auth\modules\Authorization\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Auth\database\seeders\LogLevelSeeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AuthorizationModuleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
        ]);
    }
}
