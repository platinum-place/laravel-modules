<?php

namespace Modules\Authentication\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Authentication\app\Enums\RoleEnum;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (RoleEnum::cases() as $enum) {
            Role::updateOrCreate([
                'id' => $enum->value,
            ], [
                'name' => $enum->getLabel(),
            ]);
        }
    }
}
