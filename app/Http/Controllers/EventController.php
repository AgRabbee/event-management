<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventStoreRequestValidation;
use App\Http\Services\EventService;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct(private readonly EventService $eventService)
    {
    }

    public function index()
    {
        return view('event.index', [
            'dynamicContent' => 'Event',
            'pageName'       => 'Event List',
        ]);
    }

    public function getEventList()
    {
        return response()->json([
            'responseCode' => 1,
            'msg'          => 'List generated.',
            'html'         => strval(view('event.list', [
                'events' => $this->eventService->getAllEvents()
            ])),
        ]);
    }

    public function create()
    {
        return view('event.create', [
            'dynamicContent' => 'Event',
            'pageName'       => 'Event List',
        ]);
    }

    public function store(EventStoreRequestValidation $request)
    {
        try {
            $validatedData = $request->validated();

            Event::create($validatedData);

            return redirect()->route('events.index')->with('success', 'Event created successfully.');

        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'There was an error creating the event. Please try again. Error: ' . $e->getMessage());
        }
    }

    public function addEventOrganizer(Request $request)
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
}
