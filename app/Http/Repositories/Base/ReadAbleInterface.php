<?php

namespace App\Http\Repositories\Base;

interface ReadAbleInterface
{
    public function getAll();

    public function getById($id);

    public function getAllActive();
}
