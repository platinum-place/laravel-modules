<?php

namespace Modules\Authentication\app\Repositories;

use App\Repositories\BaseRepository;
use Modules\Authentication\app\Models\User;

class UserRepository extends BaseRepository
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }
}
