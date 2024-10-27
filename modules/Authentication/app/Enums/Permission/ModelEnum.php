<?php

namespace Modules\Authentication\app\Enums\Permission;

use App\Enums\EnumsTrait;

enum ModelEnum: int
{
    use EnumsTrait;

    case user = 1;
}
