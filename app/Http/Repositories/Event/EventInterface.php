<?php

namespace App\Http\Repositories\Event;

interface EventInterface
{
    public function getBySlug($slug);
}
