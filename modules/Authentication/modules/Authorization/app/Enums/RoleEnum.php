<?php

namespace Modules\Authentication\modules\Authorization\app\Enums;

use App\Enums\EnumsTrait;

enum RoleEnum: int
{
    use EnumsTrait;

    case admin = 1;
}