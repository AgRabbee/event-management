<?php

namespace App\Repositories\Base;

use Illuminate\Database\Eloquent\Model;

class BaseRepository implements WriteAbleInterface, ReadAbleInterface
{
    public function __construct(private readonly Model $model)
    {
    }

    public function getAll()
    {
        return $this->model->get();
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }

    public function getAllActive()
    {
        return $this->model->where('status', 1)->get();
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function update($id, array $attributes)
    {
        return $this->getById($id)->update($attributes);
    }

    public function delete($id)
    {
        return $this->getById($id)->delete();
    }
}
