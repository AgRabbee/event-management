<?php

namespace App\Http\Repositories\Event;

use App\Http\Repositories\Base\BaseRepository;
use App\Models\Event;
use Illuminate\Database\Eloquent\Model;

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

    public function getBySlug($slug): Model
    {
        return $this->event->with('eventConfiguration')->where('slug', $slug)->first();
    }

    public function updateConfiguration($slug, $column, $data)
    {
        $event = $this->event->where('slug', $slug)->first();

        if ($event) {
            return $event->eventConfiguration()->updateOrCreate(
                ['event_id' => $event->id],
                [$column => json_encode($data)]
            );
        }

        return null;
    }

}
