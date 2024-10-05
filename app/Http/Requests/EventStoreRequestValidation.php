<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventStoreRequestValidation extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'                             => 'required|string|max:100',
            'short_desc'                       => 'required|string|max:250',
            'long_desc'                        => 'required|string',
            'event_from'                       => 'required|date|before:event_to',
            'event_to'                         => 'required|date|after:event_from',
            'ticket_available_till'            => 'nullable|date|before_or_equal:event_from',
            'event_social_link'                => 'nullable|url',
            'event_location'                   => 'required|string|max:255',
            'event_location_address'           => 'nullable|string|max:255',
            'event_location_map'               => 'nullable|string',
            'event_feature_link'               => 'nullable|url',
            'event_image_link'                 => 'nullable|url',
            'event_banner_image_link'          => 'nullable|url',
            'organizer_info'                   => 'nullable|array',
            'organizer_info.*.org_name'        => 'required|string|max:100',
            'organizer_info.*.org_social_url'  => 'required|url',
            'organizer_info.*.org_social_logo' => 'nullable|string',
            'organizer_info.*.org_address'     => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'                         => 'The event name is required.',
            'name.max'                              => 'The event name must not exceed 100 characters.',
            'short_desc.required'                   => 'The short description is required.',
            'short_desc.max'                        => 'The short description must not exceed 250 characters.',
            'long_desc.required'                    => 'The long description is required.',
            'event_from.required'                   => 'The event start date is required.',
            'event_from.date'                       => 'The event start date must be a valid date.',
            'event_from.before'                     => 'The event start date must be before the event end date.',
            'event_to.required'                     => 'The event end date is required.',
            'event_to.date'                         => 'The event end date must be a valid date.',
            'event_to.after'                        => 'The event end date must be after the event start date.',
            'ticket_available_till.date'            => 'The ticket availability date must be a valid date.',
            'ticket_available_till.before_or_equal' => 'The ticket availability date must be before or on the event start date.',
            'event_social_link.url'                 => 'The social link must be a valid URL.',
            'event_location.required'               => 'The event location is required.',
            'event_feature_link.url'                => 'The event feature link must be a valid URL.',
            'event_image_link.url'                  => 'The event image link must be a valid URL.',
            'event_banner_image_link.url'           => 'The event banner image link must be a valid URL.',
            'organizer_info.*.org_name.required'    => 'The organizer name is required.',
            'organizer_info.*.org_name.string'      => 'The organizer name must be a valid string.',
            'organizer_info.*.org_name.max'         => 'The organizer name must not exceed 100 characters.',
            'organizer_info.*.org_social_url.required' => 'The organizer social URL is required.',
            'organizer_info.*.org_social_url.url'      => 'The organizer social URL must be a valid URL.',
            'organizer_info.*.org_social_logo.string' => 'The organizer logo must be a valid string.',
            'organizer_info.*.org_address.required' => 'The organizer address is required.',
            'organizer_info.*.org_address.string'   => 'The organizer address must be a valid string.',
            'organizer_info.*.org_address.max'      => 'The organizer address must not exceed 255 characters.',

        ];
    }
}
