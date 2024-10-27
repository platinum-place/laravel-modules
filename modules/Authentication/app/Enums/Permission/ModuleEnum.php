<?php

namespace Modules\Authentication\app\Enums\Permission;

use App\Enums\EnumsTrait;

enum ModuleEnum: int
{
    use EnumsTrait;

    case authentication = 1;
}
