<?php

namespace Modules\Authentication\modules\Authorization\app\Enums;

use App\Enums\EnumsTrait;

enum ModelEnum: int
{
    use EnumsTrait;

    case user = 1;
}
