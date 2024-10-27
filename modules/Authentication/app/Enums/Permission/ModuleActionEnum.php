<?php

namespace Modules\Authentication\app\Enums\Permission;

use App\Enums\EnumsTrait;

enum ModuleActionEnum: int
{
    use EnumsTrait;

    case enter = 1;
}
