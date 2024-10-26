<?php

namespace Modules\Auth\modules\Authorization\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Auth\modules\Authorization\app\Enums\ModelActionEnum;
use Modules\Auth\modules\Authorization\app\Enums\ModelEnum;
use Modules\Auth\modules\Authorization\app\Enums\ModuleActionEnum;
use Modules\Auth\modules\Authorization\app\Enums\ModuleEnum;
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
