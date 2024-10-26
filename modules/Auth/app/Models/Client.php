<?php

namespace Modules\Auth\app\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\Client as PassportClient;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Modules\Auth\app\Observers\ClientObserver;

#[ObservedBy([ClientObserver::class])]
class Client extends PassportClient
{
    use SoftDeletes;

    protected $hidden = [];
}
