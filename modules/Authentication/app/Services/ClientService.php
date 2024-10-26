<?php

namespace Modules\Authentication\app\Services;

use App\Services\BaseService;
use Modules\Authentication\app\Repositories\ClientRepository;

class ClientService extends BaseService
{
    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }
}
