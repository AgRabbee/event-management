<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderStoreDataValidationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'selected_category'                => 'required|string|max:255',
            'ticket_count.*'                   => 'required|integer|min:1',
            'customer_info.name'               => 'required|string|max:255',
            'customer_info.nid_bcert_passport' => 'required|string|max:255',
            'customer_info.dob'                => 'required|date|before:today',
            'customer_info.age'                => 'required|integer|min:0|max:100',
            'customer_info.gender'             => 'required|in:1,2',
            'contact_info.mobile'              => 'required|string|max:20',
            'contact_info.emergency_contact'   => 'nullable|string|max:255',
            'contact_info.email'               => 'required|email',
            'contact_info.confirm_email'       => 'required|same:contact_info.email',
            'contact_info.address'             => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'selected_category.required' => 'The category is required.',
            'selected_category.string'   => 'The category must be a valid string.',
            'selected_category.max'      => 'The category must not exceed 255 characters.',

            'ticket_count.*.required' => 'Please select the number of tickets of a category.',
            'ticket_count.*.integer'  => 'The number of tickets must be a valid integer.',
            'ticket_count.*.min'      => 'You must select at least one ticket.',

            'customer_info.name.required' => 'The name is required.',
            'customer_info.name.string'   => 'The name must be a valid string.',
            'customer_info.name.max'      => 'The name must not exceed 255 characters.',

            'customer_info.nid_bcert_passport.required' => 'This information is required.',
            'customer_info.nid_bcert_passport.string'   => 'This information must be a valid string.',
            'customer_info.nid_bcert_passport.max'      => 'This information must not exceed 255 characters.',

            'customer_info.dob.required' => 'The date of birth is required.',
            'customer_info.dob.date'     => 'The date of birth must be a valid date.',
            'customer_info.dob.before'   => 'The date of birth must be a date before today.',

            'customer_info.age.required' => 'The age is required.',
            'customer_info.age.integer'  => 'The age must be a valid integer.',
            'customer_info.age.min'      => 'The age must be at least 0.',
            'customer_info.age.max'      => 'The age must not exceed 100.',

            'customer_info.gender.required' => 'The gender is required.',
            'customer_info.gender.in'       => 'The gender must be either 1 (male) or 2 (female).',

            'contact_info.mobile.required' => 'The mobile number is required.',
            'contact_info.mobile.string'   => 'The mobile number must be a valid string.',
            'contact_info.mobile.max'      => 'The mobile number must not exceed 20 characters.',

            'contact_info.emergency_contact.string' => 'The emergency contact must be a valid string.',
            'contact_info.emergency_contact.max'    => 'The emergency contact must not exceed 255 characters.',

            'contact_info.email.required'         => 'The email is required.',
            'contact_info.email.email'            => 'The email must be a valid email address.',
            'contact_info.confirm_email.required' => 'The confirm email is required.',
            'contact_info.confirm_email.same'     => 'The confirm email must match the email address.',
            'contact_info.address.string'         => 'The address must be a valid string.',
            'contact_info.address.max'            => 'The address must not exceed 255 characters.',
        ];
    }

}
