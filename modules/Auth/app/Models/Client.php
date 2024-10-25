<?php

namespace Modules\Auth\app\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\Client as PassportClient;

class Client extends PassportClient
{
    use SoftDeletes;

    protected $hidden = [];
}
