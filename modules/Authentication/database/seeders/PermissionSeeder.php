<?php

namespace Modules\Authentication\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Authentication\app\Enums\Permission\ModelActionEnum;
use Modules\Authentication\app\Enums\Permission\ModelEnum;
use Modules\Authentication\app\Enums\Permission\ModuleActionEnum;
use Modules\Authentication\app\Enums\Permission\ModuleEnum;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        foreach (ModelActionEnum::cases() as $action) {
            foreach (ModelEnum::cases() as $model) {
                $value = "{$action->name}_{$model->name}";
                Permission::updateOrCreate([
                    'name' => $value,
                ]);
            }
        }

        foreach (ModuleActionEnum::cases() as $action) {
            foreach (ModuleEnum::cases() as $module) {
                $value = "{$action->name}_{$module->name}";
                Permission::updateOrCreate([
                    'name' => $value,
                ]);
            }
        }
    }
}
