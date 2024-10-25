<?php

namespace Modules\Auth\modules\Authorization\app\Enums;

use App\Enums\EnumsTrait;

enum ModuleEnum: int
{
    use EnumsTrait;

    case auth = 1;
}
