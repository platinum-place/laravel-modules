<?php

namespace Modules\Authentication\modules\Authorization\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Authentication\modules\Authorization\app\Enums\RoleEnum;
use Modules\Authentication\modules\Authorization\app\Models\Role;

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
