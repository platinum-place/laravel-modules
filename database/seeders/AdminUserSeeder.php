<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Auth\app\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Warlyn García',
            'email' => 'warlyn@laravel.com',
            'username' => 'warlyn.garcia',
        ]);
    }
}
