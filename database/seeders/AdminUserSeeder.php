<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Authentication\app\Enums\RoleEnum;
use Modules\Authentication\app\Models\Client;
use Modules\Authentication\app\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {
            $user = User::factory()->create([
                'name' => 'Warlyn García',
                'email' => 'warlyn@laravel.com',
                'username' => 'warlyn.garcia',
            ]);

            $user->assignRole(RoleEnum::admin->value);

            $client = Client::factory()->create([
                'name' => 'Admin',
                'personal_access_client' => false,
                'password_client' => false,
                'revoked' => false,
            ]);
        });
    }
}
