<?php

namespace App\Http\Services;

use App\Http\Repositories\Event\EventInterface;

class EventService
{
    public function __construct(private readonly EventInterface $event)
    {
    }

    public function getAllEvents()
    {
        return $this->event->getAll();
    }

    public function getEventBySlug($slug)
    {
        return $this->event->getBySlug($slug);
    }

    public function updateEventConfiguration($slug, $column, $data)
    {
        return $this->event->updateConfiguration($slug,$column, $data);
    }
}
