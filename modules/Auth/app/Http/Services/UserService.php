<?php

namespace Modules\Auth\app\Http\Services;

use App\Services\BaseService;
use Modules\Auth\app\Http\Repositories\UserRepository;

class UserService extends BaseService
{
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
}
