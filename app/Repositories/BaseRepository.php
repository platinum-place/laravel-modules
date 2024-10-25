<?php

namespace App\Repositories;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    protected BaseModel|Model $model;

    public function __construct(BaseModel|Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->paginate();
    }

    protected function newQuery(?array $with = [])
    {
        return $this->model
            ->newQuery()
            ->with($with);
    }

    public function getBy(string $field, mixed $value, ?array $with = [], ?array $appends = [])
    {
        return $this->newQuery($with)
            ->where($field, $value)
            ->firstOrFail()
            ->setAppends($appends);
    }

    public function save(array $data): BaseModel|Model
    {
        $this->model->fill($data);
        $this->model->save();

        return $this->model;
    }

    public function update(int|string $id, array $data): BaseModel|Model
    {
        $this->model = $this->getBy('id', $id);

        $this->model->update($data);
        $this->model->fresh();

        return $this->model;
    }

    public function destroy(int|string $id): void
    {
        $this->model = $this->getBy('id', $id);

        $this->model->delete();
    }

    public function restore(int|string $id): BaseModel|Model
    {
        $this->model = $this->model
            ->onlyTrashed()
            ->findOrFail('id', $id);

        $this->model->restore();

        return $this->model;
    }
}
