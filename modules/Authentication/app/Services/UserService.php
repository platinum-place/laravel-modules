<?php

namespace Modules\Authentication\app\Services;

use App\Services\BaseService;
use Modules\Authentication\app\Repositories\UserRepository;

class UserService extends BaseService
{
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
}
