<?php

namespace Modules\Auth\app\Repositories;

use App\Repositories\BaseRepository;
use Modules\Auth\app\Models\Client;

class ClientRepository extends BaseRepository
{
    public function __construct(Client $model)
    {
        $this->model = $model;
    }
}
