<?php

namespace App\Repositories\Event;

interface EventInterface
{
    public function getAll();

    public function getActive();

    public function getBySlug($slug);

    public function updateConfiguration($slug,$column, $data);
}
