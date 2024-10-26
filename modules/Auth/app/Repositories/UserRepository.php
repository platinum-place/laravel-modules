<?php

namespace Modules\Auth\app\Repositories;

use App\Repositories\BaseRepository;
use Modules\Auth\app\Models\User;

class UserRepository extends BaseRepository
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }
}
