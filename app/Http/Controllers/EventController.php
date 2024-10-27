<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventStoreRequestValidation;
use App\Models\Event;
use App\Services\EventService;
use App\Services\FormBuilderService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct(private readonly EventService $eventService, private readonly FormBuilderService $formBuilderService)
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

    public function updateStatus(Request $request, $slug): JsonResponse
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

    public function eventFormFields($slug): View
    {
        $eventData = $this->eventService->getEventBySlug($slug);

        $viewHtml = isset($eventData->eventConfiguration->form_fields) ? 'event.form_fields.edit' : 'event.form_fields.create';

        return view($viewHtml, [
            'headerContent' => 'Edit event form - ' . $eventData->name,
            'pageName'      => $eventData->name,
            'event'         => $eventData,
            'form_fields'   => isset($eventData->eventConfiguration->form_fields) ? json_decode($eventData->eventConfiguration->form_fields, true) : [],
            'slug'          => $slug
        ]);
    }

    public function formFieldStructure(Request $request): JsonResponse
    {
        try {
            $inputType = $request->input('inputType');
            $dataType = $request->input('dataType');
            $rowNo = $request->input('rowNo');
            $sectionNo = $request->input('sectionNo');

            if (in_array($inputType, ['text', 'email', 'textarea'])) {
                $html = strval(view('event._partials.text_email_structure', ['dataType'=> $dataType,'rowNo'=> $rowNo, 'sectionNo'=> $sectionNo]));
            } elseif ($inputType == 'number') {
                $html = strval(view('event._partials.number_structure',  ['dataType'=> $dataType,'rowNo'=> $rowNo, 'sectionNo'=> $sectionNo]));
            } elseif ($inputType == 'date') {
                $html = strval(view('event._partials.date_structure',  ['dataType'=> $dataType,'rowNo'=> $rowNo, 'sectionNo'=> $sectionNo]));
            } elseif ($inputType == 'dropdown') {
                $html = strval(view('event._partials.dropdown_structure',  ['dataType'=> $dataType,'rowNo'=> $rowNo, 'sectionNo'=> $sectionNo]));
            } elseif (in_array($inputType, ['radio', 'checkbox'])) {
                $html = strval(view('event._partials.radio_checkbox_structure',  ['dataType'=> $dataType,'rowNo'=> $rowNo, 'sectionNo'=> $sectionNo]));
            }

            return response()->json([
                'responseCode' => 1,
                'msg'          => 'Field structure generated.',
                'html'         => $html,
            ]);
        } catch (\Exception $e) {
            #dd($e->getMessage(), $e->getLine());
            return response()->json([
                'responseCode' => -1,
                'msg'          => 'There was an error generating the field structure. Please try again. Error: ' . $e->getMessage(). ' Line: ' . $e->getLine(),
            ]);
        }
    }

    public function eventFormFieldsUpdate(Request $request, $slug): RedirectResponse
    {
        $preparedData = $this->formBuilderService->prepareFormRequiredDataBasedOnStructure($request->all());
        $is_update = $this->eventService->updateEventConfiguration($slug, 'form_fields', $preparedData);
        if(!$is_update) {
            return redirect()->back()->withInput()->with('error', 'There was an error updating the event configuration. Please try again.');
        }

        return redirect()->route('events.show', $slug)->with('success', 'Event configuration updated successfully.');
    }

    public function ticketPackages($slug): View
    {
        $eventData = $this->eventService->getEventBySlug($slug);

        $viewHtml = isset($eventData->eventConfiguration->ticket_packages) ? 'event.ticket_packages.edit' : 'event.ticket_packages.create';

        return view($viewHtml, [
            'headerContent' => 'Edit event ticket packages - ' . $eventData->name,
            'pageName'      => $eventData->name,
            'event'         => $eventData,
            'ticket_packages'   => isset($eventData->eventConfiguration->ticket_packages) ? json_decode($eventData->eventConfiguration->ticket_packages, true) : [],
            'slug'          => $slug
        ]);
    }
    public function ticketPackagesUpdate(Request $request, $slug)
    {
        $data = array_combine(range(1, count($request->ticket_package)), array_values($request->ticket_package));
        $is_update = $this->eventService->updateEventConfiguration($slug, 'ticket_packages', $data);
        if(!$is_update) {
            return redirect()->back()->withInput()->with('error', 'There was an error updating the event configuration. Please try again.');
        }

        return redirect()->route('events.show', $slug)->with('success', 'Event configuration updated successfully.');
    }
}
