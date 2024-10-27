<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id',
        'event_id',
        'customer_name',
        'customer_mobile',
        'customer_info',
        'contact_info',
        'ticket_package',
        'no_of_tickets',
        'actual_price',
        'order_price',
        'order_status',
        'payment_status',
    ];

    public function scopeOrders($query)
    {
        return $query->orderBy('id', 'desc');
    }
}
