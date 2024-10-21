<?php

namespace App\Http\Controllers;

use App\Http\Services\EventService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct(private readonly EventService $eventService)
    {

    }

    public function index(): View
    {
        return view('public.home', ['events' => $this->eventService->getAllEvents()]);
    }

    public function eventDetails($event_slug): View
    {
        return view('public.event_details', ['event' => $this->eventService->getEventBySlug($event_slug)]);
    }

    public function eventPurchase($event_slug): View
    {
        $eventData = $this->eventService->getEventBySlug($event_slug);
        $form_fields = isset($eventData->eventConfiguration->form_fields) ? json_decode($eventData->eventConfiguration->form_fields, true) : [];

        $columnClass = [
            1 => "row-cols-1 row-cols-sm-1",
            2 => "row-cols-1 row-cols-sm-2",
            3 => "row-cols-1 row-cols-sm-3",
        ];

        return view('public.event_purchase', [
            'event'       => $this->eventService->getEventBySlug($event_slug),
            'event_slug'  => $event_slug,
            'form_fields' => $form_fields,
            'columnClass' => $columnClass
        ]);
    }

    public function eventPurchaseStore(Request $request, $event_slug)
    {
        dd($event_slug, $request->all());
    }
}
