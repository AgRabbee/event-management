<?php

namespace App\Services;

use App\Repositories\Order\OrderInterface;
use Illuminate\Support\Str;

class OrderService
{
    public function __construct(private readonly OrderInterface $order)
    {
    }

    public function storeOrder($requestedData, $eventId, $ticket_packages)
    {
        $priceArr = $this->getTicketPrice($ticket_packages, $requestedData['selected_category']);

        $orderData = [
            'ticket_id'       => $this->generateUniqueTicketId(),
            'customer_name'   => $requestedData['customer_info']['name'],
            'customer_mobile' => $requestedData['contact_info']['mobile'],
            'customer_info'   => json_encode($requestedData['customer_info']),
            'contact_info'    => json_encode($requestedData['contact_info']),
            'event_id'        => $eventId,
            'ticket_package'  => $requestedData['selected_category'],
            'no_of_tickets'   => array_values($requestedData['ticket_count'])[0],
            'actual_price'    => $priceArr['actual_price'] * intval(array_values($requestedData['ticket_count'])[0]),
            'order_price'     => $priceArr['order_price'] * intval(array_values($requestedData['ticket_count'])[0]),
        ];
        return $this->order->create($orderData);
    }

    public function generateUniqueTicketId(): string
    {
        do {
            $ticket_id = strtoupper(Str::random(10));
        } while ($this->order->getByTicketId($ticket_id));

        return $ticket_id;
    }

    public function getTicketPrice($ticket_packages, $selected_category): array
    {
        foreach ($ticket_packages as $package) {
            if ($package['category_name'] === $selected_category) {
                return [
                    'actual_price' => $package['ticket_price'],
                    'order_price'  => !empty($package['ticket_discount_price']) ? $package['ticket_discount_price'] : $package['ticket_price']
                ];
            }
        }
        return [
            'actual_price' => 0,
            'order_price'  => 0
        ];
    }

    public function updateOrderStatus($order_id)
    {
        return $this->order->update($order_id, ['order_status' => 1, 'payment_status' => 1]);
    }
}
