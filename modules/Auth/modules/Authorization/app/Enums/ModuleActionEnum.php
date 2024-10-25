<?php

namespace Modules\Auth\modules\Authorization\app\Enums;

use App\Enums\EnumsTrait;

enum ModuleActionEnum: int
{
    use EnumsTrait;

    case enter = 1;
}
