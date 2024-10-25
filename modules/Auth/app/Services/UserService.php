<?php

namespace Modules\Auth\app\Services;

use App\Services\BaseService;
use Modules\Auth\app\Repositories\UserRepository;

class UserService extends BaseService
{
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
}
