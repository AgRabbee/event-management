<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventStoreRequestValidation;
use App\Http\Services\EventService;
use App\Models\Event;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct(private readonly EventService $eventService)
    {
    }

    public function index(): View
    {
        return view('event.index', [
            'headerContent'  => 'All Events',
            'dynamicContent' => 'Event',
            'pageName'       => 'Event List',
        ]);
    }

    public function getEventList(): JsonResponse
    {
        return response()->json([
            'responseCode' => 1,
            'msg'          => 'List generated.',
            'html'         => strval(view('event.list', [
                'events' => $this->eventService->getAllEvents()
            ])),
        ]);
    }

    public function create(): View
    {
        return view('event.create', [
            'headerContent'  => 'New Event',
            'dynamicContent' => 'Event',
            'pageName'       => 'Event List',
        ]);
    }

    public function store(EventStoreRequestValidation $request): RedirectResponse
    {
        try {
            $validatedData = $request->validated();

            Event::create($validatedData);

            return redirect()->route('events.index')->with('success', 'Event created successfully.');

        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'There was an error creating the event. Please try again. Error: ' . $e->getMessage());
        }
    }

    public function addEventOrganizer(Request $request): JsonResponse
    {
        $org_no = $request->input('org_no');
        if (!$org_no) {
            return response()->json([
                'responseCode' => -1,
                'msg'          => 'Last organization no need to be provided.',
                'html'         => '',
            ]);
        }
        return response()->json([
            'responseCode' => 1,
            'msg'          => 'Organizer added.',
            'html'         => strval(view('event._partials.add-organizer', [
                'org_no' => ($org_no + 1)
            ])),
        ]);
    }

    public function show($slug): View
    {
        $eventData = $this->eventService->getEventBySlug($slug);
        return view('event.show', [
            'headerContent'  => 'Event - ' . $eventData->name,
            'dynamicContent' => 'Event',
            'pageName'       => $eventData->name,
            'event'          => $eventData,
            'slug'           => $slug
        ]);
    }

    public function edit($slug): View
    {
        $eventData = $this->eventService->getEventBySlug($slug);
        return view('event.edit', [
            'headerContent' => 'Edit event - ' . $eventData->name,
            'pageName'      => $eventData->name,
            'event'         => $eventData,
            'slug'          => $slug
        ]);
    }

    public function update(Request $request, $slug): RedirectResponse
    {
        $eventData = $this->eventService->getEventBySlug($slug);
        $eventData->update($request->all());
        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    public function updateStatus(Request $request, $slug)
    {
        try {
            $eventData = $this->eventService->getEventBySlug($slug);
            $eventData->update($request->all());
            return response()->json([
                'responseCode' => 1,
                'msg'          => 'Event status updated.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'responseCode' => -1,
                'msg'          => 'There was an error updating the event status. Please try again. Error: ' . $e->getMessage()
            ]);
        }
    }
}
