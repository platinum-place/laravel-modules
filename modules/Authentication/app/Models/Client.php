<?php

namespace Modules\Authentication\app\Models;

use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\Client as PassportClient;
use Modules\Authentication\app\Observers\ClientObserver;

#[ObservedBy([ClientObserver::class])]
class Client extends PassportClient
{
    use SoftDeletes;

    protected $hidden = [];
}
