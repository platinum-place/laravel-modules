<?php

namespace Database\Seeders;

use App\Enums\LogLevelEnum;
use App\Models\LogLevel;
use Illuminate\Database\Seeder;

class LogLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (LogLevelEnum::cases() as $enum) {
            LogLevel::updateOrCreate([
                'id' => $enum->value,
            ], [
                'name' => $enum->name,
            ]);
        }
    }
}
