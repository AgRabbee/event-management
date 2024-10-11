<?php

namespace App\Http\Controllers;

use App\Http\Services\EventService;
use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    public function __construct(private readonly EventService $eventService)
    {

    }

    public function index(): View
    {
        return view('public.home',['events' => $this->eventService->getAllEvents()]);
    }

    public function eventDetails($event_slug): View
    {
        return view('public.event_details',['event' => $this->eventService->getEventBySlug($event_slug)]);
    }
}
