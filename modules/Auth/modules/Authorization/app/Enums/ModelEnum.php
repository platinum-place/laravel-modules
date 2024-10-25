<?php

namespace Modules\Auth\modules\Authorization\app\Enums;

use App\Enums\EnumsTrait;

enum ModelEnum: int
{
    use EnumsTrait;

    case user = 1;
}
