<?php

namespace Modules\Authentication\app\Repositories;

use App\Repositories\BaseRepository;
use Modules\Authentication\app\Models\Client;

class ClientRepository extends BaseRepository
{
    public function __construct(Client $model)
    {
        $this->model = $model;
    }
}
