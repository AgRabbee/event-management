<?php

namespace App\Repositories\Order;

use App\Models\Order;
use App\Repositories\Base\BaseRepository;

class OrderRepository extends BaseRepository implements OrderInterface
{
    public function __construct(private readonly Order $order)
    {
        parent::__construct($order);
    }

    public function getAll()
    {
        return $this->order->orders()->tobase()->get();
    }

    public function getByTicketId($ticket_id)
    {
        return $this->order->tobase()->where('ticket_id', $ticket_id)->first();
    }
}
