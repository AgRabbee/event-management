<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'short_desc',
        'long_desc',
        'event_from',
        'event_to',
        'ticket_available_till',
        'event_social_link',
        'event_location',
        'event_location_address',
        'event_location_map',
        'event_feature_link',
        'event_image_link',
        'event_banner_image_link',
        'organizer_info',
        'status',
        'post_sale_button_text',
    ];

    protected $casts = [
        'event_from'            => 'datetime',
        'event_to'              => 'datetime',
        'ticket_available_till' => 'datetime',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function setEventFromAttribute($value)
    {
        $this->attributes['event_from'] = Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function setEventToAttribute($value)
    {
        $this->attributes['event_to'] = Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function setTicketAvailableTillAttribute($value)
    {
        $this->attributes['ticket_available_till'] = Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function setOrganizerInfoAttribute($value)
    {
        $this->attributes['organizer_info'] = json_encode($value);
    }

    public function getOrganizerInfoAttribute($value)
    {
        return json_decode($value, true);
    }

}
