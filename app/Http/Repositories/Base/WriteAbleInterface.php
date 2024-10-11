<?php

namespace App\Http\Repositories\Base;

interface WriteAbleInterface
{
    public function create(array $attributes);

    public function update($id, array $attributes);

    public function delete($id);
}
