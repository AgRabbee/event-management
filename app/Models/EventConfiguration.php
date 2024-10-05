<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventConfiguration extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'ticket_packages',
        'form_fields',
        'sms_format',
        'mail_format',
    ];
}
