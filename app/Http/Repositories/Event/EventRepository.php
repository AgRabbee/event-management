<?php

namespace App\Http\Repositories\Event;

use App\Http\Repositories\Base\BaseRepository;
use App\Models\Event;

class EventRepository extends BaseRepository implements EventInterface
{
    public function __construct(private readonly Event $event)
    {
        parent::__construct($event);
    }

    public function getAll()
    {
        return $this->event->orders()->tobase()->get();
    }

    public function getActive()
    {
        return $this->event->active()->orders()->tobase()->get();
    }

    public function getBySlug($slug)
    {
        return $this->event->with('eventConfiguration')->where('slug', $slug)->first();
    }
}
