<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreDataValidationRequest;
use App\Models\Order;
use App\Services\EventService;
use App\Services\OrderService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function __construct(private readonly EventService $eventService, private readonly OrderService $orderService)
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
        $ticket_packages = isset($eventData->eventConfiguration->ticket_packages) ? json_decode($eventData->eventConfiguration->ticket_packages, true) : [];

        $columnClass = [
            1 => "row-cols-1 row-cols-sm-1",
            2 => "row-cols-1 row-cols-sm-2",
            3 => "row-cols-1 row-cols-sm-3",
        ];

        return view('public.event_purchase', [
            'event'           => $eventData,
            'event_slug'      => $event_slug,
            'form_fields'     => $form_fields,
            'ticket_packages' => $ticket_packages,
            'columnClass'     => $columnClass
        ]);
    }

    public function proceedToPayment(OrderStoreDataValidationRequest $request, $event_slug): View|RedirectResponse
    {
        try {
            $requestedData = $request->validated();
            $eventData = $this->eventService->getEventBySlug($event_slug);
            if (empty($eventData)) return redirect()->back()->with('error', 'Event not found!.');

            $ticket_packages = isset($eventData->eventConfiguration->ticket_packages) ? json_decode($eventData->eventConfiguration->ticket_packages, true) : [];
            if (empty($ticket_packages)) return redirect()->back()->with('error', 'Event Ticket packages not found!.');

            DB::beginTransaction();
            $order = $this->orderService->storeOrder($requestedData, $eventData->id, $ticket_packages);
            DB::commit();

            return view('payment.index', ['orderId' => $order->id, 'amount' => $order->order_price, 'customer' => $order->customer_name]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to create order.');
        }
    }

}
