<?php

namespace App\Services;

use App\Models\BaseModel;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

abstract class BaseService
{
    protected BaseRepository $repository;

    public function __construct(BaseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function all()
    {
        return $this->repository->all();
    }

    public function getById(int|string $id, ?array $with = [], ?array $appends = [])
    {
        return $this->repository->getBy('id', $id, $with, $appends);
    }

    public function store(array $data): BaseModel|Model
    {
        return $this->repository->save($data);
    }

    /**
     * Update a record.
     */
    public function update(int|string $id, array $data):BaseModel|Model
    {
        return $this->repository->update($id, $data);
    }

    /**
     * Delete a record.
     */
    public function destroy(int|string $id): void
    {
        $this->repository->destroy($id);
    }

    /**
     * Restore a record.
     */
    public function restore(int|string $id): Model|BaseModel
    {
        return $this->repository->restore($id);
    }
}
