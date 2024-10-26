<?php

namespace Modules\Authentication\modules\Authorization\app\Enums;

use App\Enums\EnumsTrait;

enum ModuleEnum: int
{
    use EnumsTrait;

    case auth = 1;
}
