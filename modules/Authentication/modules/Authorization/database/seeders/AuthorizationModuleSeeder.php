<?php

namespace Modules\Authentication\modules\Authorization\database\seeders;

use Illuminate\Database\Seeder;

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
