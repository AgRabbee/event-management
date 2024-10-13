<?php

namespace App\Http\Controllers;

use App\Http\Services\EventService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct(private readonly EventService $eventService)
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
        $form_fields = [
            'customer_info'       => [
                [
                    [
                        "label"        => "Name",
                        "type"         => "text",
                        "nameAttr"     => "name",
                        "placeHolder"  => "Enter your name",
                        "id"           => "name",
                        "classList"    => "required-field",
                        "is_required"  => true,
                        "error_msg"    => "Please enter your name",
                        "inline_style" => ""
                    ],
                    [
                        "label"        => "NID / Birth Certificate / Passport",
                        "type"         => "text",
                        "nameAttr"     => "nid_bcert_passport",
                        "placeHolder"  => "Enter your NID / Birth Certificate / Passport",
                        "id"           => "nid_bcert_passport",
                        "classList"    => "",
                        "is_required"  => false,
                        "error_msg"    => "",
                        "inline_style" => ""
                    ]
                ],
                [
                    [
                        "label"        => "DOB",
                        "type"         => "date",
                        "nameAttr"     => "dob",
                        "id"           => "dob",
                        "classList"    => "required-field",
                        "is_required"  => true,
                        "error_msg"    => "Please enter your date of birth",
                        "inline_style" => "",
                        "min"          => "2020-01-01",
                        "max"          => date('Y-m-d')
                    ],
                    [
                        "label"        => "Age",
                        "type"         => "number",
                        "nameAttr"     => "age",
                        "id"           => "age",
                        "classList"    => "required-field",
                        "is_required"  => true,
                        "error_msg"    => "Please enter your age",
                        "inline_style" => "width: 100px;",
                        "min"          => 0,
                        "max"          => 100
                    ],
                    [
                        "label"        => "Gender",
                        "type"         => "radio",
                        "nameAttr"     => "gender",
                        "is_required"  => true,
                        "classList"    => "required-field",
                        "error_msg"    => "Please select your gender",
                        "inline_style" => "",
                        "options"      => [
                            [
                                "label"   => "M",
                                "value"   => 1,
                                "checked" => true,
                                "id"      => "optMale",
                            ],
                            [
                                "label"   => "F",
                                "value"   => 2,
                                "checked" => false,
                                "id"      => "optFemale",
                            ]
                        ]
                    ]
                ],
                [
                    [
                        "label"        => "Profession",
                        "type"         => "select",
                        "nameAttr"     => "profession",
                        "id"           => "profession",
                        "classList"    => "required-field",
                        "is_required"  => true,
                        "error_msg"    => "Please select your profession",
                        "inline_style" => "",
                        "options"      => [
                            ""  => "-- Select one --",
                            "1" => "Student",
                            "2" => "Service Holder",
                            "3" => "Business",
                            "4" => "Others",
                        ]
                    ],
                    []
                ],
            ],
            'contact_information' => [
                [
                    [
                        "label"        => "Mobile",
                        "type"         => "text",
                        "nameAttr"     => "mobile",
                        "placeHolder"  => "Enter your mobile number",
                        "id"           => "mobile",
                        "classList"    => "required-field",
                        "is_required"  => true,
                        "error_msg"    => "Please enter your mobile number",
                        "inline_style" => ""
                    ],
                    [
                        "label"        => "Emergency Contact",
                        "type"         => "text",
                        "nameAttr"     => "emergency_mobile",
                        "placeHolder"  => "Enter emergency contact",
                        "id"           => "emergency_mobile",
                        "classList"    => "",
                        "is_required"  => false,
                        "error_msg"    => "",
                        "inline_style" => ""
                    ]
                ],
                [
                    [
                        "label"        => "Email",
                        "type"         => "email",
                        "nameAttr"     => "email",
                        "placeHolder"  => "Enter your email",
                        "id"           => "email",
                        "classList"    => "required-field",
                        "is_required"  => true,
                        "error_msg"    => "Please enter your email",
                        "inline_style" => ""
                    ],
                    [
                        "label"        => "Confirm Email",
                        "type"         => "email",
                        "nameAttr"     => "confirm_email",
                        "placeHolder"  => "Enter your email again",
                        "id"           => "confirm_email",
                        "classList"    => "",
                        "is_required"  => true,
                        "error_msg"    => "Please enter your confirm email",
                        "inline_style" => ""
                    ]
                ],
                [
                    [
                        "label"        => "Address",
                        "type"         => "textarea",
                        "nameAttr"     => "address",
                        "placeHolder"  => "Enter your address",
                        "id"           => "address",
                        "classList"    => "required-field",
                        "is_required"  => false,
                        "error_msg"    => "",
                        "inline_style" => ""
                    ],
                    []
                ],
            ]

        ];

        $columnClass = [
            1 => "row-cols-1 row-cols-sm-1",
            2 => "row-cols-1 row-cols-sm-2",
            3 => "row-cols-1 row-cols-sm-3",
        ];

        return view('public.event_purchase', [
            'event'       => $this->eventService->getEventBySlug($event_slug),
            'event_slug'  => $event_slug,
            'form_fields' => $form_fields,
            'columnClass' => $columnClass
        ]);
    }

    public function eventPurchaseStore(Request $request, $event_slug)
    {
        dd($event_slug, $request->all());
    }
}
