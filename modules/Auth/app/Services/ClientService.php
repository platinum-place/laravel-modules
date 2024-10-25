<?php

namespace Modules\Auth\app\Services;

use App\Services\BaseService;
use Modules\Auth\app\Repositories\ClientRepository;

class ClientService extends BaseService
{
    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }
}
